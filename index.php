<?php
require("functions/template.php");

$page = $_GET["page"];

$template = new Template();
switch ($page) {
    case "cscenter":
        $template->loadView("pages/client/cscenter");
        break;
    case "cart":
        $template->loadView("pages/client/cart");
        break;
    default:
        $template->loadView("pages/client/home");
}
?>
