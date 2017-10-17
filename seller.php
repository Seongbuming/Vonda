<?php
require("functions/template.php");

$page = $_GET["page"];
if (strlen($page) === 0)
    $page = "index";

$template = new Template();
$template->loadView("pages/seller/$page");
?>
