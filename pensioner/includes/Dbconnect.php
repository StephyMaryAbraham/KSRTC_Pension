<?php
session_start();
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