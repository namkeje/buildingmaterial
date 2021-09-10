<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>

<?php
if(!isset($_GET['act'])) {
	include "QLSP-index.php";
}
else {	
	$act=$_GET['act'];
	switch ($act){
		case 'addSP':
			include "addSP.php"; 
			break;
		case 'fixSP':
			if(isset($_GET['ID'])&&($_GET['ID']>0)){
				$sql="select * from product where id=".$_GET['ID'];
				$sp=pdo_query_one($sql);
				extract($sp);
			}
			include "fixSP.php"; 
			break;
		default:
			break;
		
	}
}
?>
</body>
</html>
