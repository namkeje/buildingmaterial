<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script>
document.getElementById("slide").style.display="none";
document.title="Xe Hàng";
document.getElementById("content").style.height="1300px";
function selectSoLuongCart(a){
var t=a.split('-');
var id=t[1];
var sl=t[2];
document.getElementById(id+"-dropdownMenuButton4").innerHTML='<h6 style="position:absolute; left:10px; top:5px"><b>'+sl+'</b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:2px"></i>';
for(var i=1;i<=12;i++)
{
	document.getElementById("slCart-"+id+"-"+i).style.background='';	
}
document.getElementById("slCart-"+id+"-"+sl).style.background='#E8E8E8';
var price=document.getElementById("priceSP-"+id).value;
var total=price*sl;
document.getElementById("priceTT-"+id).innerHTML='<b>'+total+' VND</b>';
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tt1").innerHTML = this.responseText;
		document.getElementById("tt2").innerHTML = this.responseText;
		document.getElementById("tt3").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "fixMyCart.php?id=" + id + "&&sl=" + sl, true);
    xmlhttp.send();
}
function delCart(a){
var b=a;
var t=a.split('-');
var id=t[1];
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("temp").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "fixMyCart.php?id=" + id , true);
    xmlhttp.send();
setTimeout(resetpage,100);
}
function resetpage(){
location.reload();
}
function delAllCart(){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("temp").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "fixMyCart.php?all", true);
    xmlhttp.send();
location.reload();
}
function loadSLSP(idSP,index){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("HienThiSL-"+index).innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "HienThiSLSP-Cart.php?id=" + idSP + "&&index=" + index, true);
    xmlhttp.send();
}
function xemDS(){
var check="<?php if(isset($_SESSION['userlogin'])) echo 'co';
else echo 'ko'; ?>";
if(check=="ko") location.replace("index.php?dangnhap");
else location.replace("index.php?DS_order");
}
function thanhtoan(){
var check="<?php if(isset($_SESSION['userlogin'])) echo 'co';
else echo 'ko'; ?>";
if(check=="ko") location.replace("index.php?dangnhap");
else {
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("temp").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "thanhtoan.php", true);
    xmlhttp.send();
	setTimeout(delAllCart,300);
}
}
</script>
<div style="width:100%; height:1000px; margin-top:35px">
    <div style="height:100%; width:68%; float:left">
    	<div style="background:#E8E8E8; width:95%; height:47px; font-feature-settings: 'kern'; font-size:22px; line-height:47px; padding-left:20px"><b>XE HÀNG</b></div>
        <div class="Cart">
        <?php
		$j=1;
		foreach($_SESSION['mycart'] as $sp)
		{
			echo '<div class="itemCart">
            	<div style="float:left; width:180px; height:180px; background:#E8E8E8; margin-top:18px; cursor:pointer">
					<img src="photo/'.$sp[2].'" style="width:100%; height:100%" />
                </div>
                <div style="float:left; width:322px; height:180px; margin-top:18px; margin-left:18px">
                	<h5 class="itemCartName"><b>'.$sp[0].'</b></h5>
                    <h6 style="font-size:17px; margin-top:3px; color:#808080; float:left;">Giá:&nbsp;'.$sp[1].' VND</h6>
					<input type="hidden" id="priceSP-'.$j.'" value='.$sp[1].' />
                    <div style="width:100%; height:68px;margin-top:60px ">
                    	<div style="width:50%; float:left; height:100%">
                        	<div style="font-size:16px"><b></b></div>
                            <div class="">';
							  
                          if($sp[6]==1) {
						$sql="select amount from warehouse where id_product='".$sp[6]."'";
						$sl=pdo_query($sql);
						$slsp=array();
						foreach($sl as $c) {
							extract($c);
							array_push($slsp,$amount);
						}
						
							}
			     						
						echo '</div>
                        </div>
                        <div style="width:50%; float:left; height:100%">
                        	<div style="font-size:16px; margin-left:30px"><b>Số lượng</b></div>
                            <div>
                  <button  type="button" id="'.$j.'-dropdownMenuButton4" aria-expanded="false" class="btnSizeCart" style="margin-left:30px"><h6 style="position:absolute; left:10px; top:5px"><b>'.$sp[3].'</b></h6></button>
                  <div style="width:223px; height:165px;border:#a5a5a5 1px solid" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
                       echo '
                   </div>
			     </div>
                        </div>
                    </div>
                </div>
                 <div style="float:right; width:200px; height:180px; margin-top:18px">
                 	<div class="itemCartPrice" id="priceTT-'.$j.'"><b>'.$sp[4].' VND</b></div>
                    <div style="border: #a3a3a3 0px solid; width:125px; height:40px; clear:both; margin-top:90px; margin-left:70px; color:#f15e2c; font-size:21px; text-align:center"></div>
                    <div style="border: #a3a3a3 1px solid; width:125px; height:40px; margin-top:10px; background:#000000; margin-left:70px;color:#ffff; font-size:21px; text-align:center;cursor:pointer" onclick="delCart(this.id)" id="del-'.$j.'"><i class="far fa-trash-alt" style="margin-top:8px"></i></div>
            	</div>
                <div style="width:100%; border-top:dashed 2px; opacity:0.5; position:absolute; top:217px"></div>
            </div> ';
			$j++;
		}
		?>
        	<!--close itemList-->
            
            
 
        </div>
        <div style="width:95%; border-top:solid 3px; margin-top:50px"></div>
        <div style="width:95%; height:40px; margin-top:80px">
        	<div style="float:left" class="btnCart" onclick="delAllCart()"><b>XÓA HẾT</b></div>
            <a href="index.php?category=vatlieu"><div style="float:right" class="btnCart"><b>QUAY LẠI MUA HÀNG</b></div></a>
        </div>
    </div>
    <div style="height:500px; width:32%; float:right; background:#E8E8E8" >
    	<?php
		$tt=0;
		foreach($_SESSION['mycart'] as $sp)
		{
			$tt+=$sp[4];
		}
		?>
    	<div style="font-size:22px;font-feature-settings: 'kern'; margin-left:20px; margin-top:15px"><b>ĐƠN HÀNG</b></div>
        <div style="margin-left:20px; width:89%; border-top:solid 2px; margin-top:10px"></div>
        <h6 style="font-feature-settings: 'kern'; font-size:17px; margin-left:20px; margin-top:33px"><b>NHẬP MÃ KHUYẾN MÃI</b></h6>
        <div class="input-group mb-3" style="width:89%; margin-left:20px; height:40px; margin-top:13px">
          <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="button-addon2" >
          <div style="width:100px; background:#f15e2c; font-size:17px; text-align:center; line-height:40px; color:#FFFFFF; cursor:pointer"><b>ÁP DỤNG</b></div>
        </div>
        <div style="width:89%; border-top:dashed 2px; opacity:0.5; margin-top:23px; margin-left:20px"></div>
        <div style="margin-left:20px; margin-top:33px; width:89%; height:30px">
        	<h6 style="font-feature-settings: 'kern'; font-size:17px; color:#808080; float:left"><b>Đơn hàng</b></h6>
            <?php
            echo '<h6 style="font-size:17px; color:#808080; float:right" id="tt1"><b>'.$tt.' VND</b></h6>';
			?>
        </div>
        <div style="margin-left:20px;width:89%; height:30px">
        	<h6 style="font-feature-settings: 'kern'; font-size:17px; color:#808080; float:left"><b>Giảm</b></h6>
            <h6 style="font-feature-settings: 'kern'; font-size:17px; color:#808080; float:right">0 VND</h6>
        </div>
        <div style="width:89%; border-top:dashed 2px; opacity:0.5; margin-top:23px; margin-left:20px"></div>
        <div style="margin-left:20px; margin-top:30px; width:89%; height:40px">
        	<h6 style="font-feature-settings: 'kern'; font-size:17px;float:left; padding-top:5px"><b>TỔNG TIỀN</b></h6>
            <?php
            echo '<h6 style="font-size:23px;float:right" id="tt2"><b>'.$tt.' VND</b></h6>';
			?>
        </div>
        <div style="background:#f15e2c; width:89%; height:80px; line-height:80px; text-align:center; cursor:pointer; margin-left:20px; margin-top:15px; font-size:23px; color:#FFF;font-feature-settings: 'kern'" onclick="thanhtoan()"><b>THANH TOÁN</b></div>
        <div class="DSdonhang" onclick="xemDS();"><b>XEM DANH SÁCH ĐƠN ĐẶT HÀNG</b></div>
    </div>
    
    <div id="temp"></div>
    
</div>
</body>
</html>
