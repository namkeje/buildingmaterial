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
$folder_path='photo/';
if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!="") {
	$file_path= $folder_path.$_FILES['image']['name'];
	$flag=true;
	if(file_exists($file_path)) {
	$_SESSION['thongbaoad']=1;
	echo '<script>location.replace("server.php?category=qlsp&&act=addSP");</script>';	
	$flag=false;
	}
	$ex = array('jpg','png','jpeg');
	$file_type= strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
	if(!in_array($file_type,$ex)) {
	$_SESSION['thongbaoad']=2;
	echo '<script>location.replace("server.php?category=qlsp&&act=addSP");</script>';	
	$flag=false;
	}
	if($flag){
	move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
	$namesp=$_POST['namesp'];
	$price=$_POST['price'];
	$img=$_FILES['image']['name'];
	$stt=$_POST['status'];
	$producer=$_POST['producer'];
	$t=$_POST['design'];
	$s=preg_split("/\(/",$t);
	$design=$s[0];
	$category1=$_POST['category'];
	$sql="select * from category order by name";
	$category2=pdo_query($sql);
	foreach($category2 as $dm){
		extract($dm);
		if($name==$category1) { $id_category=$id;
		break;}
	}
	$sql="insert into product(name,price,image,status,producer,design,id_category) values('$namesp','$price','$img','$stt','$producer','$design','$id_category')";	
	pdo_execute($sql);
	$_SESSION['thongbaoad']=3;	
	echo '<script>location.replace("server.php?category=qlsp&&act=addSP");</script>';	
	}	
}
else {
	$namesp=$_POST['namesp'];
	$price=$_POST['price'];
	$img=$_FILES['image']['name'];
	$stt=$_POST['status'];
	$producer=$_POST['producer'];
	$t=$_POST['design'];
	$s=preg_split("/\(/",$t);
	$design=$s[0];
	$category1=$_POST['category'];
	$sql="select * from category order by name";
	$category2=pdo_query($sql);
	foreach($category2 as $dm){
		extract($dm);
		if($name==$category1) { $id_category=$id;
		break;}
	}
	$sql="insert into product(name,price,image,status,producer,design,id_category) values('$namesp','$price','$img','$stt','$producer','$design','$id_category')";	
	pdo_execute($sql);
	$_SESSION['thongbaoad']=3;
	echo '<script>location.replace("server.php?category=qlsp&&act=addSP");</script>';	
}
?>
</body>
</html>
