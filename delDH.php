<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include 'pdo.php';
session_start();
$id = $_REQUEST["id"];
$sql="select status from order_ticket where id_order=".$id;
$stt=pdo_query_one($sql);
extract($stt);
if($status=='chờ xác nhận'){
$sql="select * from detail_order_ticket where id_order=".$id;
$del=pdo_query($sql);
$d=count($del);
for($i=0;$i<$d;$i++){
$sql="delete from detail_order_ticket where id_order=".$id;
pdo_execute($sql);}
$sql="delete from order_ticket where id_order=".$id;
pdo_execute($sql);
$_SESSION['tb']=4;}
else {
	$_SESSION['tb']=5;
}
?>
</body>
</html>
