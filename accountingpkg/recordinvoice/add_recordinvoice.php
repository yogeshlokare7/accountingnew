<style>
    input,textarea,select,date{ width: 90%; }
    .control-label{ margin-left: 10px; }
    tr,td{ vertical-align: middle; font-size: 12px;padding: 5px;margin: 5px;}
</style>
<form method="post" autocomplete="off">
    <div class="container-fluid" style="" >
        <div class="widget-box" style="width: 100%;border-bottom: solid 1px #CDCDCD;">
            <div class="widget-title">
                <ul class="nav nav-tabs"><li class="active"><a data-toggle="tab" href="#tab1">CREATE PACKING SLIP</a></li></ul>
            </div>
            <br/>
            <table style="width: 100%">
                <tr>
                    <td>
                        <fieldset  class="well the-fieldset">
                            <table>
                                <tr >
                                    <td style="width: 10%"><label>CUSTOMER&nbsp;DETAILS&nbsp;:</label></td>
                                    <td>
                                        <input  type="text" placeholder="Customer Name" onfocusout="searchCustomer()" required="" id="companyname" value="<?php echo $packslip[""] ?>" style="width: 70%"/>
<!--                                        <i class="icon-search" onclick="showVendor()"></i>-->
                                        <div id="error" style="color: red"></div>
                                    </td>
                                    <td style="font-weight: bold; " ><label c>SO&nbsp;NO&nbsp;:&nbsp</label></td>
                                    <td><input type="text" name="so_no" id="so_no" readonly="" value="<?php echo $packslip["so_no"] ?>" ></td>
                                    <td style="font-weight: bold; " ><label >PO&nbsp;NO&nbsp;:&nbsp</label></td>
                                    <td><input type="text" name="po_no" id="po_no"  ></td>
                                </tr>

                                <tr >
                                    <td ><label >SQUARE&nbsp;:&nbsp</label></td>
                                    <td>
                                        <select name="square" id="square" value="<?php echo $packslip["square"] ?>" style="height: 25px;width: 78%" required="">
                                            <option value=""></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </td>
                                    <td ><label >PACK&nbsp;DATE&nbsp;:&nbsp</label></td>
                                    <td><input type="text" name="rec_date" readonly="" value="<?php echo date("Y-m-d") ?>" ></td>
                                    <td ><label c>REQUIRED&nbsp;DATE&nbsp;:&nbsp</label></td>
                                    <td><input type="text" name="req_date" id="datepicker" value="<?php echo $packslip["req_date"] ?>" ></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="width: 25%;float: left">
                            <table class="table-bordered" id="profiletable" style="width: 100%;border-collapse: collapse;background-color: white" border="1">
                                <tr style="font-weight: bold;">
                                    <th style="width: 40%;text-align: left">&nbsp;&nbsp;<b>Select Profile</b></th>
                                    <th>
                                        <select id="addprofile" name="addprofile" style="height: 25px;margin-top: 5px;">
                                            <option value="">&nbsp;&nbsp;</option>
                                            <?php
                                            $mysqlresultset = MysqlConnection::fetchCustom("SELECT DISTINCT(profile_name) as profile_name FROM `profile_master`");

                                            foreach ($mysqlresultset as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value["profile_name"] ?>">&nbsp;<?php echo $value["profile_name"] ?></option>
                                                <?php
                                            }
                                            ?>
<!--                                            <option value="0" ><< ADD NEW >></option>-->
                                        </select>
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div style="width: 73%;float: right">
                            <table class="table-bordered" style="width: 100%;border-collapse: collapse" border="1">
                                <tr style="border-bottom: solid 1px  #CDCDCD;background-color: rgb(250,250,250)">
                                    <td style="width: 25px;">#</td>
                                    <td style="width: 100px;">Pcs</td>
                                    <td style="width: 350px;">Type</td>
                                    <td style="width: 80px;">(W) MM</td>
                                    <td style="width: 80px;">(H) MM</td>
                                    <td style="width: 80px;">(W) INCH</td>
                                    <td style="width: 80px;">(H) INCH</td>
                                    <td>SQ-FT</td>
                                </tr>
                            </table>
                            <div style="overflow: auto;height: 232px;border-bottom: solid 1px  #CDCDCD;">
                                <table class="table-bordered" style="width: 100%;border-collapse: collapse" border="1">
                                    <?php for ($index = 1; $index <= 50; $index++) { ?>
                                        <tr id="<?php echo $index ?>" style="border-bottom: solid 1px  #CDCDCD;background-color: white">
                                            <td style="width: 25px">
                                                <a class="icon  icon-remove" onclick="clearValue('<?php echo $index ?>')"></a>
                                            </td>
                                            <td style="width: 100px"><input type="text" name="pcs[]" id="pc<?php echo $index ?>"      style="padding: 0px;margin: 0px;width: 100%"></td>
                                            <td style="width: 350px;"><input type="text" name="type[]"  id="type<?php echo $index ?>"      style="padding: 0px;margin: 0px;width: 100%"></td>
                                            <td style="width: 80px;"><input type="text" name="mm_w[]"   id="txtMMW<?php echo $index ?>"  onfocus="shiftFocus('mmInchW<?php echo $index ?>')"    style="padding: 0px;margin: 0px;width: 100%"></td>
                                            <td style="width: 80px;"><input type="text"  name="mm_h[]"  id="txtMMH<?php echo $index ?>"  onfocus="shiftFocus('mmInchH<?php echo $index ?>')"    style="padding: 0px;margin: 0px;width: 100%"></td>
                                            <td style="width: 80px;"><input type="text"  name="fract_w[]"  id="mmInchW<?php echo $index ?>"  onfocusout="calculate('<?php echo $index ?>','mmInchW<?php echo $index ?>','txtMMW<?php echo $index ?>')"     style="padding: 0px;margin: 0px;width: 100%"></td>
                                            <td style="width: 80px;"><input type="text"  name="fract_h[]"  id="mmInchH<?php echo $index ?>"  onfocusout="calculate('<?php echo $index ?>','mmInchH<?php echo $index ?>','txtMMH<?php echo $index ?>')"    style="padding: 0px;margin: 0px;width: 100%"></td>
                                            <td ><input type="text" id="sqFt<?php echo $index ?>"  name="sqFeet[]"  style="padding: 0px;margin: 0px;width: 100%"></div></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>

                    </td>
                </tr>
            </table>
            <hr/>
        </div>
    </div>
    <div class="modal-footer "> 
        <center>
            <table border="0">
                <tr>
                    <td> <a id="save" class="btn btn-info" onclick="createPackingSlip('print')">SUBMIT AND PRINT</a> </td>
                    <td> <a id="save" class="btn btn-info" onclick="createPackingSlip('email')">SUBMIT AND EMAIL</a> </td>
                    <td><a href="index.php?pagename=manage_packingslip" id="btnSubmitFullForm" class="btn btn-info">&nbsp;CANCEL&nbsp;</a></td>
                </tr>
            </table>
        </center>
    </div>
    <input type="hidden" name="whattodo" id="whattodo"/>
</form>