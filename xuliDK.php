<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
include 'pdo.php';
$name=$_POST['txtname'];
$phone=$_POST['txtphone'];
$addr=$_POST['txtaddress'];
$username=$_POST['username'];
$pass=$_POST['txtpass'];
$date=date("d/m/Y");
$role='user';
$sql="insert into account(username,password,fullname,phone,address,role,datesignup) values('$username','$pass','$name','$phone','$addr','$role','$date')";	
pdo_execute($sql);
$_SESSION['DKTC']=true;
echo '<script>location.replace("index.php?dangnhap");</script>';	
?>
</body>

</html>
