<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$from=$_REQUEST['from'];
$to=$_REQUEST['to'];
include 'pdo.php';
function xuliDate($from,$to,$str){
	$dayfrom=explode('-',$from);
	$dayto=explode('-',$to);
	$ddfrom=intval($dayfrom[2]);
	$mmfrom=intval($dayfrom[1]);
	$yyfrom=intval($dayfrom[0]);
	$ddto=intval($dayto[2]);
	$mmto=intval($dayto[1]);
	$yyto=intval($dayto[0]);
	$day=explode('/',$str);
	if(intval($day[2])>$yyfrom&&intval($day[2])<$yyto) return 1;
	if(intval($day[2])<$yyfrom||intval($day[2])>$yyto) return 0;
	
	if(intval($day[2])==$yyfrom) {
		if(intval($day[1])<$mmfrom) return 0;
		if(intval($day[1])==$mmfrom) {
			if(intval($day[0])<$ddfrom) return 0;
		}
	}
	
	if(intval($day[2])==$yyto) {
		if(intval($day[1])>$mmto) return 0;
		if(intval($day[1])==$mmto) {
			if(intval($day[0])>$ddto) return 0;
		}
	}
	return 1;	
}
$sql="select * from order_ticket";
	$order=pdo_query($sql);
	$dh=array_reverse($order);
	foreach($dh as $t)
	{
	extract($t);
	
	$sql="select fullname,address,phone from account where id=".$id_user;
	$acc=pdo_query_one($sql);
	extract($acc);
	if(xuliDate($from,$to,$date_order)==1) {
	$sql="select * from detail_order_ticket where id_order=".$id_order;
	$slsp=pdo_query($sql);
	echo '<div style="width:100%; height:280px; margin-top:30px; border-bottom: solid 3px;border-top : solid 3px;"> 
        <div style="float:left; height:100%; width:40%; margin-left:20px">
        	<div class="DS_TT" style="color:#808080"><b>ID Đơn Hàng</b></div>
            <div class="DS_TT1">'.$id_order.'</div>
            <div class="DS_TT" style="color:#808080"><b>Tên Khách Hàng</b></div>
            <div class="DS_TT1">'.$fullname.'</div>
            <div class="DS_TT" style="color:#808080"><b>Địa Chỉ</b></div>
            <div class="DS_TT1">'.$address.'</div>
			<div class="DS_TT" style="color:#808080"><b>Số Điện Thoại</b></div>
            <div class="DS_TT1">'.$phone.'</div>
        </div>
         <div style="float:left; height:100%; width:30%; margin-left:20px">
         	<div class="DS_TT" style="color:#808080"><b>Ngày Đặt Hàng</b></div>
            <div class="DS_TT1">'.$date_order.'</div>
            <div class="DS_TT" style="color:#808080"><b>Ngày Giao Hàng</b></div>
            <div class="DS_TT1">'.$date_ship.'</div>
			<div class="DS_TT" style="color:#808080"><b>Trạng Thái Đơn Hàng</b></div>
            <div class="DS_TT1">'.$status.'</div>
            <div class="DS_TT" style="font-size:18px"><b>Tổng Tiền</b></div>
            <div class="DS_TT1" style="font-size:18px; color:#ff5f17"><b>'.$total.' VND<b></div>
        </div>
        <div style="float:right; height:100%; width:20%">
        	<button type="button" class="btn btn-info" style="margin-top:55px; height:60px" onclick="CTDH('.$id_order.')"><b>Xem Chi Tiết</b></button>';
			if($status=='chờ xác nhận') echo '<button type="button" class="btn btn-warning" style="margin-top:30px; height:60px; width:120px" onclick="xacnhanDH('.$id_order.')"><b>Xác Nhận</b></button>';
			else echo '<img src="photo/checked.png" style="margin-top:25px; height:100px; width:100px; margin-left:10px" />';
        echo '</div>
    </div>';}
	}

?>
</body>
</html>
