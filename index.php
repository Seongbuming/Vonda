<?php
require ("vendor/autoload.php");
require("functions/template.php");

// Guzzle Client
$client = new GuzzleHttp\Client();

$page = $_GET["page"];
if (strlen($page) === 0)
    $page = "home";

$template = new Template();
$template->loadView("pages/client/$page");
?>
