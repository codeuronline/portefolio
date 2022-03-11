<?php 

$db_host = "localhost";
$db_name = "backoffice";
$db_user = "root";
$db_pwd = "";
try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pwd);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>