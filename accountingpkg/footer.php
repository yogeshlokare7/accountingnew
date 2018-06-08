<?php
error_reporting(0);
session_start();
ob_start();
?>
<style>
    .footertable{
        vertical-align: top;
        margin-top: 0.5%;
    }
    .ulfooter{
        list-style: none;
        line-height: 25px;
        vertical-align: top;

    }
    .ulfooter li a{
        text-decoration: none;
        color: #D7CFC7;
        font-size: 13px;
        font-family: verdana;

    }
    .spanfooter{
        font-size: 16px;
        text-align: top;
        margin-left: 0.0%;
        font-family: verdana;

    }
    .ulfooter li a hover{
        font-size: 150%;
    }
</style>

<div  style=" width: 100%;background-color: #565656;color: white ">
    <br/>
    <center>
        <table class="footertable" style="width: 60%;text-align: left;margin-top: 10px;"border='0'>
            <tr >
                <td>  
                    <ul class="ulfooter">
                        <li ><span class="spanfooter">Masters</span><br/></li>
                        <li ><a  href="index.php?pagename=manage_customermaster&status=active">Customer Master</a></li>
                        <li ><a href="index.php?pagename=manage_suppliermaster&status=active">Vendor Master</a></li>
                        <li><a href="index.php?pagename=manage_itemmaster&status=active">Item Master</a></li>
                        <li><a href="index.php?pagename=manage_portfoliomaster">Portfolio Master</a></li>
                        <li><a href="#">&nbsp;</a></li>
                    </ul>
                </td>
                <td>  
                    <ul class="ulfooter">
                        <li >
                            <span class="spanfooter">Retail</span><br/>
                        </li>
                        <li >
                            <a href="index.php?pagename=manage_perchaseorder">Purchase Orders</a>
                        </li>
                        <li >
                            <a href="index.php?pagename=manage_salesorder">Sales Orders</a>
                        </li>
                        <li>
                            <a href="index.php?pagename=manage_salesorder&isBackOrder=Y">Back Orders</a>
                        </li>
                        <li><a href="#">&nbsp;</a></li>
                        <li><a href="#">&nbsp;</a></li>
                    </ul>
                </td>
                <td> 
                    <ul class="ulfooter">
                        <li >
                            <span class="spanfooter">Production</span><br/>
                        </li>

                        <li >
                            <a href="index.php?pagename=manage_packingslip">Packing Slip</a>
                        </li>
                        <li >
                            <a href="index.php?pagename=manage_quotation">Quotation</a>
                        </li>
                        <li>
                            <a href="index.php?pagename=manage_workorder">Work Orders</a>
                        </li>
                        <li>
                            <a href="index.php?pagename=manage_packingslip">Layout</a>
                        </li>
                        <li>
                            <a href="index.php?pagename=manage_customermaster&status=active">Invoice</a>
                        </li>
                    </ul>
                </td>
                <td>   
                    <ul class="ulfooter">
                        <li >
                            <span class="spanfooter">System</span><br/>
                        </li>

                        <li >
                            <a href="index.php?pagename=manage_usermanagement">User Management</a>
                        </li>
                        <li >
                            <a href="index.php?pagename=manage_companymaster">Company Information</a>
                        </li>
                        <li>
                            <a href="index.php?pagename=manage_scannerdetail">Scanner Details</a>
                        </li>
                        <li>
                            <a href="index.php?pagename=manage_manageip">Manage IP</a>
                        </li>
                       <li>
                            <a href="index.php?pagename=password_usermanagement">Update Password</a>
                        </li>
                    </ul>
                </td>
                <td>    
                    <ul class="ulfooter">
                        <li >
                            <span class="spanfooter">Report's</span><br/>
                        </li>

                        <li >
                            <a href="index.php?pagename=manage_receivingorder">PO Reports</a>
                        </li>
                        <li >
                            <a href="index.php?pagename=manage_salesorderreceiving">SO Reports</a>
                        </li>
                        <li >
                            <a href="#">&nbsp;</a>
                        </li>
                        <li><a href="#">&nbsp;</a></li>
                        <li><a href="#">&nbsp;</a></li>
                    </ul>
                </td>
                
            </tr>
        </table>
    </center>
</div>

<!--</footer>-->