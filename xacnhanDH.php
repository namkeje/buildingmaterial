<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$id = $_REQUEST["id"];
session_start();
$d=date('d/m/Y');
$t=explode('/',$d);
$t[0]+=3;
$d=implode('/',$t);
$stt='đã xác nhận';
include 'pdo.php';
$sql="update order_ticket set status='".$stt."',date_ship='".$d."' where id_order=".$id;	
pdo_execute($sql);
$_SESSION['thongbaoad']=3;
?>
</body>
</html>
