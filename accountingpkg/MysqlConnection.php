<?php

error_reporting(0);
session_start();
ob_start();

class MysqlConnection {

    static function connect() {
        $DB_NAME = "rw";
        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASS = "";
        return mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    }

    static function connectToDiffrent($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) {
        return mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    }

    /**
     * @param input $query
     * @return primary key for the table
     */
    static function executeQuery($query) {
        $connect = MysqlConnection::connect();
        return mysqli_query($connect, $query);
    }
    
    static function executeQueryDifferent($query) {
        $connect = MysqlConnection::connectToDiffrent("localhost","root","","opmsconfig");
        return mysqli_query($connect, $query);
    }

    /**
     * @param data
     * input the data for posted data
     * it automatically generate and insert the values
     * but name of the database colum must equal to name of the element field
     */
    static function getPrimary($tbl = "") {
        $mysqlprimary = MysqlConnection::fetchCustom("show index from $tbl where Key_name = 'PRIMARY'");
        $column_name = $mysqlprimary[0]["Column_name"];
        $primarylist = MysqlConnection::fetchCustom("SELECT $column_name FROM $tbl ORDER BY $column_name DESC LIMIT 0,1");
        return $primarylist[0][$column_name];
    }

    static function insert($tbl = "", $data = array()) {
        $connect = MysqlConnection::connect();
        try {
            //echo $query;
            $str = "";
            $keysset = "";
            $valuesset = "";
            foreach ($data as $key => $values) {
                $keysset .= "`" . $key . "`,";
                $valuesset .= "'" . mysqli_real_escape_string($connect, trim($values)) . "',";
            }
            echo $query = " INSERT INTO $tbl (" . substr($keysset, 0, strlen($keysset) - 1) . ") VALUES (" . substr($valuesset, 0, strlen($valuesset) - 1) . ");";
            MysqlConnection::executeQuery($query);
            return MysqlConnection::getPrimary($tbl);
        } catch (Exception $exc) {
            echo "<span style='color:red'>SQL QUERY ERROR !!! INSERT !!!<span>";
        }
    }

    /**
     * @param string $tbl table name
     * @param string $data array of the table
     * @return string boolean values
     */
    static function edit($tbl = "", $data = array(), $where = "") {
//        unset($data[$pkcolumn]);
        $connect = MysqlConnection::connect();
        try {
            $str = "";
            $update = "";
            foreach ($data as $key => $values) {
                $update .= "`" . $key . "` = " . "'" . mysqli_real_escape_string($connect, trim($values)) . "',";
            }
            $query = " UPDATE $tbl SET " . substr($update, 0, strlen($update) - 1) . " WHERE $where ";
            return MysqlConnection::executeQuery($query);
        } catch (Exception $exc) {
            echo "<span style='color:red'>SQL QUERY ERROR !!! EDIT !!!<span>";
        }
    }

    /**
     *
     * @param String $tbl table name
     * @param int  $id primary key of the table
     */
    static function delete($query) {
        try {
            // echo $query;
            MysqlConnection::executeQuery($query);
            return "";
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
    static function deleteCompany($query) {
        try {
            // echo $query;
            MysqlConnection::executeQueryDifferent($query);
            return "";
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

    /**
     * @param resource $resource
     * @return array
     */
    static function toArrays($resource) {
        $arrayList = array();
        while ($rows = mysqli_fetch_assoc($resource)) {
            array_push($arrayList, $rows);
        }
        return $arrayList;
    }

    /**
     * @param String $tbl
     * @param Array $sql
     * @return Array
     */
    static function fetchAll($tbl, $sql = array()) {
        $query = "SELECT * FROM $tbl ";
        $resource = MysqlConnection::executeQuery($query);
        return MysqlConnection::toArrays($resource);
    }
    
    static function fetchAllCompanies($tbl, $sql = array()) {
        $query = "SELECT * FROM $tbl ";
        $resource = MysqlConnection::executeQueryDifferent($query);
        return MysqlConnection::toArrays($resource);
    }

    static function fetchAllAscending($tbl, $sql = array()) {
        $query = "SELECT * FROM $tbl";
        $resource = MysqlConnection::executeQuery($query);
        return MysqlConnection::toArrays($resource);
    }

    /**
     *
     * @param String $tbla
     * @param String $pkvalue
     * @return type
     */
    static function fetchByPrimary($tbl, $pkvalue, $pkcolumn) {
        $query = "SELECT * FROM $tbl WHERE $pkcolumn = $pkvalue  ";
        $resource = MysqlConnection::executeQuery($query);
        $result = MysqlConnection::toArrays($resource);
        return $result[0];
    }

    /**
     *
     * @param String $tbl table name a
     * @param Array $data data posted from text field
     * @param Array $sql condition such as limit order by
     * @return Aray
     */
    static function fetchByFilter($tbl, $data = array(), $sql = array()) {
        $str = "";
        $srno = 1;
        foreach ($data as $kyes => $values) {
            if (trim($values) != "") {
                $str .= " `$kyes` LIKE '%$values%' AND ";
                $srno++;
            }
        }
        $search = "AND";
        if (( $pos = strrpos($str, $search) ) !== false) {
            $search_length = strlen($search);
            $str = " AND " . substr_replace($str, "", $pos, $search_length);
        }
        $query = "SELECT * FROM   $tbl   WHERE txtIsDelete = '0' " . $str . "" . $sql["order"] . "" . $sql["limit"] . "";
        $resource = MysqlConnection::executeQuery($query);
        return MysqlConnection::toArrays($resource);
    }

    static function fetchCustom($query) {
//        echo $query."<br/><br/>"; 
        $resource = MysqlConnection::executeQuery($query);
        return MysqlConnection::toArrays($resource);
    }
    
    static function fetchCustomCompany($query) {
        echo $query."<br/><br/>"; 
        $resource = MysqlConnection::executeQueryDifferent($query);
        return MysqlConnection::toArrays($resource);
    }

    static function exchangeArray($POST, $unset_array = array()) {
        foreach ($unset_array as $keys) {
            unset($POST[$keys]);
        }
        return $POST;
    }

    static function uploadFile($objfile, $destination) {
        $modifiedName = str_replace(" ", "_", $objfile["name"]);
        $fname = $destination . time() . "_" . $modifiedName;
        move_uploaded_file($objfile["tmp_name"], $fname);
        return empty($objfile["name"]) ? "" : $fname;
    }

    static function readFile($file_name) {
        $handle = fopen($file_name, 'rb') or die("error opening file");
        $contains = fread($handle, filesize($file_name));
        fclose($handle) or die("error closing file handle");
        return $contains;
    }

    static function getAddedBy($userid) {
        $resultset = MysqlConnection::fetchCustom("SELECT `firstName`,`lastName` FROM `user_master` WHERE `user_id` = $userid");
        return $resultset[0]["firstName"] . " " . $resultset[0]["lastName"];
    }

    static function getSalesPersonName($customerid) {
        $resultset = MysqlConnection::fetchCustom("SELECT `sales_person_name` FROM `customer_master` WHERE `id` = $customerid");
        return $resultset[0]["sales_person_name"];
    }

    static function getSupplierCompnayNameDetails($suppId) {
        $resultset = MysqlConnection::fetchCustom("SELECT companyname,supp_phoneNo,supp_email FROM `supplier_master` WHERE supp_id = " . $suppId);
        return $resultset[0];
    }

    static function getSupplierDetails($suppId) {
        $resultset = MysqlConnection::fetchCustom("SELECT * FROM `supplier_master` WHERE supp_id = " . $suppId);
        return $resultset[0];
    }

    static function getCustomerDetails($customerId) {
        $resultset = MysqlConnection::fetchCustom("SELECT * FROM `customer_master` WHERE id = " . $customerId);
        return $resultset[0];
    }

    static function generatePONumber() {
        $ponumber = MysqlConnection::fetchCustom("SELECT id FROM purchase_order ORDER BY id DESC LIMIT 0,1");
        $time = substr(time(), 6, 10);
        return "PO" . $ponumber[0]["id"] . ($time + ($ponumber[0]["id"]));
    }

    static function generateQUOTNumber() {
        $ponumber = MysqlConnection::fetchCustom("SELECT id FROM purchase_order ORDER BY id DESC LIMIT 0,1");
        $time = substr(time(), 6, 10);
        return "QOT" . $ponumber[0]["id"] . ($time + ($ponumber[0]["id"]));
    }

    static function generateSONumber() {
        $sonumber = MysqlConnection::fetchCustom("SELECT id FROM sales_order ORDER BY id DESC LIMIT 0,1");
        $time = substr(time(), 6, 10);
        return "SO" . $sonumber[0]["id"] . ($time + ($sonumber[0]["id"]));
    }

    static function generateWONumber() {
        $sonumber = MysqlConnection::fetchCustom("SELECT ps_id FROM packslip ORDER BY ps_id DESC LIMIT 0,1");
        $time = substr(time(), 6, 10);
        return "WO" . $sonumber[0]["id"] . ($time + ($sonumber[0]["id"]));
    }

    static function getVendorData() {
        return MysqlConnection::fetchCustom("SELECT `supp_id`,`companyname` FROM `supplier_master` ORDER BY `companyname`");
    }

    static function getCustomerData() {
        return MysqlConnection::fetchCustom("SELECT `id`,`cust_companyname` FROM `customer_master` ORDER BY `cust_companyname`");
    }

    static function getUserData() {
        return MysqlConnection::fetchCustom("SELECT `user_id`,`firstName`,`lastName` FROM `user_master` ORDER BY `firstName`");
    }

}
