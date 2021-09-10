<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
if(isset($_REQUEST['tk'])) {
$tk=$_REQUEST['tk'];
include 'pdo.php';
$sql="select * from account where username='".$tk."'";
$acc=pdo_query_one($sql);
extract($acc);
$_SESSION['userlogin']=array($username,$password,$fullname,$phone,$address,$role,$datesignup,$id);
$_SESSION['tb']=1;}
else unset($_SESSION['userlogin']);
?>
</body>
</html>
