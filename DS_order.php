<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script>
document.getElementById("slide").style.display="none";
document.getElementById("content").style.height="1300px";
function CT_order(id){
var t=id;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("CTDH").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "CTDH.php?id=" + t , true);
xmlhttp.send();
}
</script>
<div style="width:100%; height:1000px; margin-top:35px">
    <div style="height:100%; width:68%; float:left">
    	<div style="background:#E8E8E8; width:95%; height:47px; font-feature-settings: 'kern'; font-size:22px; line-height:47px; padding-left:20px"><b>Danh Sách Đơn Đặt Hàng</b></div>
        <div class="Cart">
        	<?php
				$user=$_SESSION['userlogin'];
				$sql="select * from order_ticket where id_user=".$user[7];
				$order=pdo_query($sql);
				$dh=array_reverse($order);
				foreach($dh as $o)
				{
				extract($o);
				echo '<div style="width:100%; height:210px; margin-top:30px; border-bottom: dashed 2px;border-top : dashed 2px;"> 
					<div style="float:left; height:100%; width:40%; margin-left:20px">
						<div class="DS_TT2"><b>Tên Khách Hàng</b></div>
						<div class="DS_TT3">'.$user[2].'</div>
						<div class="DS_TT2"><b>Địa Chỉ</b></div>
						<div class="DS_TT3">'.$user[4].'</div>
						<div class="DS_TT2"><b>Số Điện Thoại</b></div>
						<div class="DS_TT3">'.$user[3].'</div>
					</div>
					 <div style="float:left; height:100%; width:23%; margin-left:30px">
						<div class="DS_TT2"><b>Ngày Đặt Hàng</b></div>
						<div class="DS_TT3">'.$date_order.'</div>
						<div class="DS_TT2"><b>Ngày Giao Hàng</b></div>
						<div class="DS_TT3">'.$date_ship.'</div>
						<div class="DS_TT2"><b>Trạng Thái Đơn Hàng</b></div>
						<div class="DS_TT3">'.$status.'</div>
					</div>
					<div style="float:right; height:100%; width:24%">
						<div class="DS_TT2" style="font-size:18px"><b>Tổng Tiền</b></div>
						<div class="DS_TT3" style="font-size:18px"><b>'.$total.' VND</b></div>
						<img src="photo/detail.png" style="width:70px; height:70px; margin-left:5px; float:left; margin-top:40px; cursor:pointer" onclick="CT_order('.$id_order.')" />
						<img src="photo/cancel.png" style="width:70px; height:70px; float:right; margin-right:10px; margin-top:40px; cursor:pointer" onclick="xoaDH('.$id_order.')" />
					</div>
				</div>';
				}
				?>
        </div>
    </div>
    <div style="height:850px; width:32%; float:right; background:#E8E8E8" >
    	<div style="font-size:22px;font-feature-settings: 'kern'; text-align:center; margin-top:15px"><b>CHI TIẾT ĐƠN HÀNG</b></div>
        <div style="margin-left:20px; width:89%; border-top:solid 2px; margin-top:10px"></div>
        <div id="CTDH">
        </div>
    </div>
    <div id="temp"></div>
</div>
</body>
</html>
