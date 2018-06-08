<?php
error_reporting(E_ALL);
session_start();
ob_start();
include './MysqlConnection.php';
include './ApplicationUtil.php';
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title ?></title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="assets/images/fevicon.jpg" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/maruti-style.css" />
        <link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/uniform.css" />
        <link rel="stylesheet" href="css/loder.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="js/jquery.mask.js"></script> 
        <script src="js/customjs.js"></script> 
        <link href="assets/css/custom.css" rel="stylesheet">
    </head>
    <body style="background-color: #565656;">
        <table style="width: 100%;height: 100%;background-color: white;" border='0'>
            <tr style="height: 25%">
                <td>
                    <div >
                        <div style="float: left;width: 48%; height: 80px">
                            <img src="assets/images/logo.jpg" style="width: 180px;height: 50px;margin: 0 auto;margin: 20px;margin-left: 0px;">
                        </div>
                        <div style="float: left">
                            <div id="overlay1" style="margin: 0 auto;">
                                <img src="css/3.gif" alt="Loading" style="margin-top: 10px;" />
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr >
                <td style="padding: 0px;margin: 0px;"><div id="sidebar" style="margin-top: 70px;clear: both;"><?php include './leftmenu.php'; ?></div></td>
            </tr>
            <tr  style="height: auto">
                <td>
                    <img src="img/ajaxloading.gif" id="img" style="display:none" />
                    <!-- this is model dialog --->
                    <div id="myAlert" class="modal hide" style="width: 400px;top: 30%;left: 50%;">
                        <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">×</button>
                            <h3>Action Alert !!!</h3>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this Item ???</p>
                        </div>
                        <div class="modal-footer"> 
                            <a id="deleteThis" data-dismiss="modal" class="btn btn-primary">Confirm</a> 
                            <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
                        </div>
                    </div>
                    <hr/>
                    <div id="divLoading"></div>
                    <div id="content"><?php include '' . $include . ".php"; ?></div>
                </td>
            </tr>
            <tr style="background-color: #565656">
                <td style="padding: 0px;margin: 0px;">
                    <div id="footer" >
                        <?php include './footer.php'; ?>
                    </div>
                </td>
            </tr>
        </table>
    </body>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery.uniform.js"></script> 
    <script src="js/footerjs.js"></script> 
</body>
</html>
