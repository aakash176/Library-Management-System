<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysql_query("SELECT * FROM students WHERE sid='$sid'");
$b=mysql_fetch_array($a);
$name=$b['name'];
$date=date('d/m/Y');
$bn=$_POST['name'];
if($bn!=NULL)
{
	$p=mysql_query("SELECT * FROM books WHERE id='$bn'");
	$q=mysql_fetch_array($p);
	$bk=$q['name'];
	$ba=$q['author'];
	$sql=mysql_query("INSERT INTO issue(sid,name,author,date) VALUES('$sid','$bk','$ba','$date')");
	if($sql)
	{
		$msg="Successfully Issued";
	}
	else
	{
		$msg="Error Please Try Later";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head">Library Management System</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">Bangalore Technological Institute</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Issue Book</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Book : </td><td><select name="name" class="fields" required >
<option value="" disabled="disabled" selected="selected"> - - Select Book - - </option>
<?php
$x=mysql_query("SELECT * FROM books");
while($y=mysql_fetch_array($x))
{
	?>
<option value="<?php echo $y['id'];?>"><?php echo $y['name']." ".$y['author'];?></option>
<?php
}
?>
</select></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="ISSUE" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="home.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>