<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$folder_path='photo/';
$file_path= $folder_path.$_FILES['upload_file']['name'];
$flag=true;
if(file_exists($file_path)) {
echo 'trung ten file';
$flag=false;
}
$ex = array('jpg','png','jpeg');
$file_type= strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
if(!in_array($file_type,$ex)) {
	echo 'file ko phu hop';
	$flag=false;
}
if($flag){
	move_uploaded_file($_FILES['upload_file']['tmp_name'],$file_path);
}
?>
</body>
</html>
