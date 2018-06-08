<?php
$title = "ACCOUNTING";
$pagename = filter_input(INPUT_GET, "pagename");
$explode = explode("_", $pagename);
$include = "";
$module = "";
$page = "";
if (count($explode) >= 2) {
    $include = $explode[1] . "/" . $pagename;
    $module = $explode[1];
    $page = $explode[0] . " " . $explode[1];
} else {
    $include = "dashboard/manage_dashboard";
    $module = "Home";
    $page = "Dashboard";
}