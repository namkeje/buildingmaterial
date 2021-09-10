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
				if(isset($_FILES['fiximage']['name'])&&$_FILES['fiximage']['name']!="") {
				$file_path= $folder_path.$_FILES['fiximage']['name'];
				$flag=true;
				if(file_exists($file_path)) {
				$_SESSION['thongbaoad']=1;
				echo '<script>window.history.back();</script>';	
				$flag=false;
				}
				$ex = array('jpg','png','jpeg');
				$file_type= strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
				if(!in_array($file_type,$ex)) {
					$_SESSION['thongbaoad']=2;
					echo '<script>window.history.back();</script>';
					$flag=false;
				}
				if($flag){
				move_uploaded_file($_FILES['fiximage']['tmp_name'],$file_path);
				$idi=$_POST['id'];
				$idfix=$_POST['fixId'];
				$namesp=$_POST['fixname'];
				$price=$_POST['fixprice'];
				$img=$_FILES['fiximage']['name'];
				$stt=$_POST['fixstatus'];
				$producer=$_POST['fixproducer'];
				$t=$_POST['fixdesign'];
				$s=preg_split("/\(/",$t);
				$design=$s[0];
				$category=$_POST['fixcategory'];
				$sql="select * from category order by name";
				$category2=pdo_query($sql);
				foreach($category2 as $dm){
					extract($dm);
					if($name==$category) { $id_category=$id;
						break;}
					}	
				$sql="update product set id='".$idfix."',name='".$namesp."',price='".$price."',image='".$img."',status='".$stt."',producer='".$producer."',design='".$design."',id_category='".$id_category."' where id=".$idi;	
				pdo_execute($sql);		
				$_SESSION['thongbaoad']=3;	
				echo '<script>location.replace("server.php?category=qlsp");</script>';
				}
				}
				else {
				$idi=$_POST['id'];
				$idfix=$_POST['fixId'];
				$namesp=$_POST['fixname'];
				$price=$_POST['fixprice'];
				$img=$_FILES['fiximage']['name'];
				$stt=$_POST['fixstatus'];
				$producer=$_POST['fixproducer'];
				$t=$_POST['fixdesign'];
				$s=preg_split("/\(/",$t);
				$design=$s[0];
				$category=$_POST['fixcategory'];
				$sql="select * from category order by name";
				$category2=pdo_query($sql);
				foreach($category2 as $dm){
					extract($dm);
					if($name==$category) { $id_category=$id;
						break;}
					}	
				$sql="update product set id='".$idfix."',name='".$namesp."',price='".$price."',image='".$img."',status='".$stt."',producer='".$producer."',design='".$design."',id_category='".$id_category."' where id=".$idi;	
				pdo_execute($sql);
				$_SESSION['thongbaoad']=3;	
				echo '<script>location.replace("server.php?category=qlsp");</script>';	
				}
?>
</body>
</html>
