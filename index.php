<?php

require_once("./view/header.php");

if (!isset($_GET["page"])) {
    $_GET["page"] = "home";
}

switch ($_GET["page"]) {
    case "home":
        require_once("./view/home.php");
        break;

    case "about":
        require_once("./view/about.php");
        break;

    case "contact":
        require_once("./view/contact.php");
        break;

    case "log-in":
        require_once("./view/log-in.php");
        break;

    case "sign-up":
        require_once("./view/sign-up.php");
        break;
}

require_once("./view/footer.php");
