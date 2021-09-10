<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$ID = $_REQUEST["ID"];
$qty = $_REQUEST["qty"];
$flag=true;
include "pdo.php";
session_start();
if(!isset($_SESSION['mycart'])) {$_SESSION['mycart']=[];}
$sql="select * from product where id='".$ID."'";
$sp=pdo_query_one($sql);
extract($sp);

if(count($_SESSION['mycart'])>0){
	foreach($_SESSION['mycart'] as &$sp){
		if($sp[6]==$id) {
			$sp[4]=$sp[4]+$qty;
			$sp[5]=$sp[4]*$price;
			$flag=false;
			break;
		}
	}
}

if($flag==true) {
	$total=$qty * $price;
	$cart=[$name,$price,$image,$qty,$total,$id_category,$id];
	array_unshift($_SESSION['mycart'],$cart);
	}
	$count=count($_SESSION['mycart']);
	echo $count.'<br /><i class="fas fa-shopping-bag"></i>';
?>
</body>
</html>
