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
$tt=0;
foreach($_SESSION['mycart'] as $sp)
{
	$tt+=$sp[4];
}
$date=date("d/m/Y");
$dateship='chờ xác nhận';
$sql="insert into order_ticket (id_user,date_order,date_ship,total,status,note) values ('$user[7]','$date','$dateship','$tt','$dateship','')";	
pdo_execute($sql);
$sql="select id_order from order_ticket where id_user=".$user[7];
$t=pdo_query($sql);
foreach($t as $temp)
{
	extract($temp);
	$ID=$id_order;
}
foreach($_SESSION['mycart'] as $o){
$sql="insert into detail_order_ticket(id_order,id_product,amount,price,total) values('$ID','$o[6]','$o[3]','$o[1]','$o[4]')";
pdo_execute($sql);
}
$_SESSION['tb']=2;
?>
</body>
</html>
