<?php
$message = $_SESSION["message"];
$backlink = $_SESSION["backlink"];
?>

<div class="container-fluid" style="min-height: 400px;margin: 0 auto" >
    <div class="widget-box" style="width: 40%;border-bottom: solid 1px #CDCDCD;text-align: center;">
        <div class="widget-title">
            <p style="line-height: 35px;font-size: 18px;color: red">Error</p>
        </div>
        <br/>
        <p style="padding: 10px;font-size: 14px;color: green">
            <?php echo $message ?>
        </p>
        <div class="modal-footer " > 
            <center>
                <table border="0">
                    <tr>
                        <td><a href="<?php echo $backlink ?>" id="btnSubmitFullForm" class="btn btn-info">BACK</a></td>
                    </tr>
                </table>
            </center>
        </div>
    </div>
</div>
<?php
$_SESSION["message"] = "";
$_SESSION["backlink"] = "";
