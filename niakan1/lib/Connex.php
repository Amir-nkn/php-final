<?php


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$connex = mysqli_connect('localhost', 'root', 'Dolphin98', 'forum_db', 3306);

if(mysqli_connect_error()){
    echo "Fail to connect ".mysqli_connect_error();
    exit();
}

mysqli_set_charset($connex, "utf8");

?>