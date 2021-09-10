<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_REQUEST['sl'])) {
$id = $_REQUEST["id"];
$sl = $_REQUEST["sl"];
session_start();
$i=1;
foreach($_SESSION['mycart'] as &$sp)
{
	if($i==$id) {$sp[3]=$sl;
	$t=$sl*$sp[1];
	$sp[4]=$t;
	break;}
	$i++;
}
unset($sp);
$tt=0;
foreach($_SESSION['mycart'] as $sp)
{
	$tt+=$sp[4];
}
echo '<b>'.$tt.' VND</b>';
}
else if(isset($_REQUEST['all'])) {
session_start();
$_SESSION['mycart']=[];
}
else {
$id = $_REQUEST["id"];
session_start();
array_splice($_SESSION['mycart'],$id-1,1);
}
?>
</body>
</html>
