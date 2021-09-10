<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script>
document.getElementById("dsdh").style.background="#E8E8E8";
function CTDH(id){
var t=id;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("CTPNH2").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "CTDH_server.php?id=" + t , true);
xmlhttp.send();
}
function xacnhanDH(id){
var t=id;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("temp").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "xacnhanDH.php?id=" + t , true);
xmlhttp.send();
setTimeout(loadpage,200);
}
function loadpage(){
location.reload();
}
function note(id){
var note=document.getElementById("exampleFormControlTextarea1").value;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("temp").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "note_order.php?id=" + id + "&&note=" + note , true);
xmlhttp.send();
setTimeout(loadpage,200);
}
function closeTBAD(){
document.getElementById("thongbaoad").style.display="none";
}
function xuliDate(dayFrom,dayTo)
{
	var From=dayFrom.split('-');
	var To=dayTo.split('-');
	var ddFrom=Number(From[2]);
	var mmFrom=Number(From[1]);
	var yyFrom=Number(From[0]);
	var ddTo=Number(To[2]);
	var mmTo=Number(To[1]);
	var yyTo=Number(To[0]);
	
	if(yyFrom>yyTo) return false;
	if(yyFrom==yyTo) {
		if(mmFrom>mmTo) return false
		if(mmFrom==mmTo) {
			if(ddFrom>=ddTo) return false;
		}
	}
	return true;
}
function filterImport(){
var from=document.getElementById("from").value;
var to=document.getElementById("to").value;
if(from==""||to=="") {
	document.getElementById("thongbaoad").innerHTML="<b>Thời Gian Nhập Không Hợp Lệ!</b>";
	document.getElementById("thongbaoad").style.display="block";
	document.getElementById("thongbaoad").style.paddingTop="40px";
	document.getElementById("thongbaoad").style.color="red";
	setTimeout(closeTBAD,3000);
	return false;
}
if(xuliDate(from,to)==false) {
	document.getElementById("thongbaoad").innerHTML="<b>Thời Gian Nhập Không Hợp Lệ!</b>";
	document.getElementById("thongbaoad").style.display="block";
	document.getElementById("thongbaoad").style.paddingTop="40px";
	document.getElementById("thongbaoad").style.color="red";
	setTimeout(closeTBAD,3000);
	return false;
}
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("filterOrder").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "filterOrder.php?from=" + from + "&&to=" + to , true);
xmlhttp.send();
}
</script>
<body>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==3) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xác Nhận Đơn Hàng Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
			else if($_SESSION['thongbaoad']==4) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Ghi Chú Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		}
?>
<h2 style="font-feature-settings: 'kern'; padding-top:30px; height:80px; width:50%; margin:auto; text-align:center"><b>DANH SÁCH ĐƠN HÀNG</b></h2>
<div style="width:100%; height:120px">
    <div class="DS_import">
        <h4 style="font-feature-settings: 'kern'; color:blue;">Hiển Thị Theo Thời Gian<i class="far fa-clock" style="margin-left:20px; color:black"></i></h4>
        <div style="margin-top:13px">
            <div style="float:left"><b>Từ&nbsp;&nbsp;</b></div>
            <input type="date" style="float:left" id="from" />
            <i class="fas fa-random" style="float:left; margin-left:30px; margin-top:6px"></i>
            <div style="float:left; margin-left:30px"><b>Đến&nbsp;&nbsp;</b></div>
            <input type="date" style="float:left" id="to" />
        </div>
    </div>
	<button class="btn btn-light" style="height:80px; width:8%; font-size:22px; border:solid 3px; border-radius:50px; margin-top:30px; margin-left:20px" onclick="filterImport();"><i class="fas fa-filter"></i></button>
</div>
<div id="filterOrder">
	<?php
	$sql="select * from order_ticket";
	$order=pdo_query($sql);
	$dh=array_reverse($order);
	foreach($dh as $t)
	{
	extract($t);
	$sql="select fullname,address,phone from account where id=".$id_user;
	$acc=pdo_query_one($sql);
	extract($acc);
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
    </div>';
	}
    ?>
</div>
<div style="background:#000; margin-left:40px; float:left; width:34%; height:910px; margin-top:30px">
	<div style="color:#FFF; width:80%; margin:auto; text-align:center; font-size:24px; margin-top:15px; border-bottom:#FFF solid 3px; height:50px">Chi Tiết Đơn Hàng
    </div>
    <div id="CTPNH2"> 
        
            
        
    </div>
    <div id="temp"></div>
</div>
</body>
</html>
