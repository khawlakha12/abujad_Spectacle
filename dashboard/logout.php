<?php
    include_once '../include/mysql.php';
    session_start();
    session_destroy();
    header('Location: index.php');

?>