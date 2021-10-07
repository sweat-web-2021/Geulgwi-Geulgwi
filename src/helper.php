<?php
    function view($page) {
        require VIEW."/header.php";
        require VIEW."/$page.php";
        exit;
    }

    function go($msg, $url) {
        echo "<script>";
        echo "alert('$msg');";
        echo "location.href = '{$url}';";
        echo "</script>";
        exit;
    }