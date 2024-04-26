<?php 
    ob_start();
    session_start();

    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

    defined("VIEW_FRONT") ? NULL : define("VIEW_FRONT", __DIR__ . DS . "views" . DS . "front");

    defined("DB_HOST") ? null : define("DB_HOST", "localhost");
    defined("DB_USER") ? null : define("DB_USER", "root");
    defined("DB_PASS") ? null : define("DB_PASS", "");
    defined("DB_NAME") ? null : define("DB_NAME", "pleasure");

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    require_once("caller.php");

?>