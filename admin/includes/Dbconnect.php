<?php
session_start();
// $DB_HOST = '166.62.8.42';
// $DB_USER = 'ksrtcpension';
// $DB_PASS = "Pension@2018";
// $DB_NAME = 'ksrtc_pension';

//https://sg2nlsmysqladm1.secureserver.net/grid55/43/index.php

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = "";
$DB_NAME = 'ksrtc_pension';
try {

$connection = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME,$DB_USER,$DB_PASS);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
date_default_timezone_set('Asia/Kolkata');

} catch (PDOException $ex){

echo $ex->getMessage();

}
?>