<?php
    $hostname   = 'localhost';
    $username   = 'root';
    $password   = '';
    $dbname     = 'db_sembakoonline';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Database Tidak Dapat Terhubung');

?>