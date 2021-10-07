<?php
    function classLoader($c) {
        require SRC."/$c.php";
    }

    spl_autoload_register("classLoader");