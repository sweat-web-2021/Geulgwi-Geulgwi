<?php
    session_start();
    define("ROOT", dirname(__DIR__));
    define("SRC", ROOT."/src");
    define("VIEW", SRC."/View");

    require SRC."/autoload.php";
    require SRC."/helper.php";
    require SRC."/web.php";