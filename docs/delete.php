<?php (isset($_SERVER['HTTP_ACCEPT_ENCODING'])&&substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))?ob_start("ob_gzhandler"):ob_start(); 

date_default_timezone_set("Asia/Kuala_lumpur");
ini_set("error_reporting", 1);
ini_set('display_errors', 1);

require 'vendor/autoload.php';
$db = new MyDB();

$id = $_GET["id"];
$db->pdo->exec("DELETE FROM tasks WHERE id = '$id'");

setcookie("SUCCESS", "Data has been deleted.", time()+2, "/");
header("location:/tasks/");
exit;