<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$id=$_REQUEST['id'];
$size=$_REQUEST['size'];
include "pdo.php";
$sql="select amount from warehouse where id_product=".$id;
$sl=pdo_query_one($sql);
extract($sl);
echo '<tr>';
$count=0;
$d=$amount;
for($i=1;$i<=12;$i++)
{
	$count++;
	if($d>0) {echo '<td style="width:52px; height:51.2px" id="sl-'.$i.'" onclick="selectSoLuong(this.id)">'.$i.'</td>';}
	else {echo '<td style="width:52px; height:51.2px; opacity:0.2" id="sl-'.$i.'" >'.$i.'</td>';}
	if($i==12) { echo '</tr>';
		break;}
	if($count==4) { echo '</tr><tr>';
		$count=0;}
	$d--;
}
?>
</body>
</html>
