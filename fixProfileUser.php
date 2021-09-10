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
$user=$_SESSION['userlogin'];
$name=$_POST['namead'];
$phone=$_POST['phonead'];
$addr=$_POST['addressad'];
$pass=$_POST['passad'];
$sql="update account set fullname='".$name."',phone='".$phone."',address='".$addr."',password='".$pass."' where id=".$user[7];	
pdo_execute($sql);
$_SESSION['userlogin']=array($user[0],$pass,$name,$phone,$addr,$user[5],$user[6],$user[7]);
$_SESSION['tb']=6;
echo '<script>location.replace("index.php?profile");</script>';	
?>
</body>
</html>
