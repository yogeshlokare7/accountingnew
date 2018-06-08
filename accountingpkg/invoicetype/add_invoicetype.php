<style>
    input,textarea,select,date{ width: 90%; }
    .control-label{ margin-left: 10px; }
    tr,td{ vertical-align: middle; font-size: 12px;padding: 0px;margin: 0px;}

    table tr td{
        padding: 5px;
    }

</style>
<form action="" name="" method="post" autocomplete="off">
    <input type="hidden" name="" id="" value="">  
    <div class="container-fluid" style="" >
        <div class="widget-box" style="width: 80%;border-bottom: solid 1px #CDCDCD;">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a  data-toggle="tab" href="#tab1">CREATE INVOICE TYPE</a></li>
                </ul>
            </div>
            <br/>
            <table style="width: 100%">
                <tr>
                    <td>
                        <fieldset  class="well the-fieldset">
                            <table>
                             
                                <tr>
                                    <td style="width: 10%"><label class="control-label">Invoice Type&nbsp;:&nbsp</label></td>
                                    <td><input type="text" name="" id="" value="" ></td>
                                    <td ><label  class="control-label"  class="control-label">Description&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;" name=""></textarea></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
                <tr>

                </tr>
            </table>
            <div class="modal-footer " > 
                <center>
                    <table>
                        <tr>
                            <td><a id="save" class="btn btn-info" onclick=" ">SUBMIT </a></td>
                            <td><a href="index.php?pagename=manage_costcode" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a></td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>
    </div>
    <input type="hidden" name="whattodo" id="whattodo">
</form>
