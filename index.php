<?php
require("functions/template.php");

$page = $_GET["page"];
if (strlen($page) === 0)
    $page = "home";

$template = new Template();
$template->loadView("pages/client/$page");
?>
