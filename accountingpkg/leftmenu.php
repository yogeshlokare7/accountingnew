<a href="index.php?pagename=manage_" class="visible-phone"><i class="icon icon-home"></i> Main Screen</a>
<ul>
    <li class="active"><a href="index.php?pagename=manage_dashboard"><i class="icon icon-home"></i> <span> Main Screen</span></a> </li>
    <li> <a><i class="icon icon-th-large"></i> <span>Masters</span></a> 
        <ul>
            <li><a href="index.php?pagename=manage_costcode&status=active">Cost Code Master</a></li>
            <li><a href="index.php?pagename=manage_invoicetype&status=active">Invoice Type Master</a></li>
            <li><a href="index.php?pagename=manage_project&status=active">Project Master</a></li>
            <li><a href="index.php?pagename=manage_vendorinfo&status=active">Vendor Master</a></li>
            <li><a href="index.php?pagename=manage_taxinformation&status=active">Tax Info Master Master</a></li>
        </ul>
    </li>
    <li> <a ><i class="icon icon-inbox"></i> <span>Payment's</span></a> 
        <ul>
            <li><a href="index.php?pagename=manage_recordinvoice">Record Invoice</a></li>
            <li><a href="index.php?pagename=manage_payinvoice">Pay Invoice</a></li>
        </ul>
    </li>
    <li> <a ><i class="icon icon-inbox"></i> <span>Report</span></a> 
        <ul>
            <li><a href="index.php?pagename=manage_balancereport">Balance Report</a></li>
            <li><a href="index.php?pagename=manage_paidreport">Payment Report</a></li>
        </ul>
    </li>
    <li style="float: right" ><a href="logout.php"><i class="icon  icon-off"></i><span>Log Out</span> </a></li>
    <li style="float: right;text-transform: capitalize" >
        <a href="#"><i class="icon  icon-user"></i><span>Hi <?php echo $_SESSION["user"]["firstName"] ?>&nbsp; <?php echo $_SESSION["user"]["lastName"] ?></span>
    </li>
</ul>