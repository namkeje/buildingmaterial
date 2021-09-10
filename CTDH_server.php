<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$id = $_REQUEST["id"];
$ID = $_REQUEST["id"];
include "pdo.php";
$sql="select * from detail_order_ticket where id_order=".$id;
$order=pdo_query($sql);
echo '<div style="width:90%; margin:auto; height:500px; margin-top:20px; overflow-y:scroll">';
foreach($order as $ct)
{
	extract($ct);
	$sql="select id, name, image from product where id=".$id_product;
	$sp=pdo_query_one($sql);
	extract($sp);
		echo '<div style="width:100%; height:140px; border-top:dashed 2px #fff;border-bottom:dashed 2px #fff; margin-top:15px">
        	<div style="width:23%; height:60%; float:left; background:#FFF; margin-top:25px; margin-left:10px">
            	<img src="photo/'.$image.'" style="width:100%; height:100%"  />
            </div>
            <div style="width:33%; height:80%; float:left; border-left:solid 1px #fff; margin-top:12px; margin-left:10px">
            	<div class="CTPNH"><b>ID Sản Phẩm</b></div>
                <div class="CTPNH">'.$id.'</div>
                <div class="CTPNH" style="margin-top:10px"><b>Tên Sản Phẩm</b></div>
                <div class="CTPNH">'.$name.'</div>
                <div class="CTPNH" style="margin-top:10px"><b>Giá Sản Phẩm</b></div>
                <div class="CTPNH">'.$price.' VND</div>
            </div>
            <div style="width:33%; height:80%; float:left; border-left:solid 1px #fff; margin-top:12px; margin-left:10px">
                <div class="CTPNH" style="margin-top:10px"><b>Số Lượng</b></div>
                <div class="CTPNH">'.$amount.'</div>
                <div class="CTPNH" style="margin-top:10px"><b>Tổng Tiền</b></div>
                <div class="CTPNH">'.$total.' VND</div>
            </div>  
        </div>';
}
$sql="select * from order_ticket where id_order=".$ID;
$notee=pdo_query_one($sql);
extract($notee);
echo '</div>
		<div style="color:#fff; margin-top:10px; margin-left:20px; font-size:22px"><b>Ghi Chú</b></div>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="background:#FFF; width:90%; margin:auto; height:180px; margin-top:10px">'.$note.'</textarea>
	  <button type="button" class="btn btn-light" style="margin-left:20px; margin-top:20px; width:100px; font-size:22px" onclick="note('.$ID.')">Gửi</button>';	
?>
</body>
</html>
