<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];

$r=$_GET['r'];
mysql_query("DELETE FROM issue WHERE id='$r'");
header("location:issue.php");
?>