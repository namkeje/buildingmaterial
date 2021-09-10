<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chi tiết</title>
</head>

<body>
<script>
document.getElementById("slide").style.display='none';
function addMyCart(){
var sl=document.getElementById("soluong").value;
if(sl!="") {
	var id=<?php echo $_GET['product-detail']; ?>;
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("CartIcon").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "addMyCart.php?ID=" + id + "&&qty=" + sl , true);
    xmlhttp.send();
	}	
}
</script>
<?php
if(isset($_GET['product-detail'])) {
$id=$_GET['product-detail'];
$sql="select * from product where id='".$id."'";
$sp=pdo_query_one($sql);
extract($sp);	
}
?>
<div style="width:100%; height:1200px; margin-top:35px">
<ul style="list-style-type:none; height:30px">
    <li class="infor" style="margin-left:-32px"><?php if($id_category==1) echo 'Vật liệu';
	else echo ucwords($id_name); ?></li>
	 <li class="infor" style="height:15px; border-right: solid 3px #ccc"></li>
    <li class="infor"><?php if($id_category==2) echo ucwords($id_name);
		else {$pos=strpos($producer, '-');
			if($pos==false) echo ucwords($producer);
			else { $s=explode('-',$producer); echo ucfirst($s[0]).' '.ucfirst($s[1]); }} ?></li>
    <li class="infor" style="height:15px; border-right: solid 3px #ccc"></li>
    <li class="infor"><b><?php echo ucwords($name); ?></b></li>
</ul>
<div style="border-bottom:solid 3px; margin-top:-13px"></div>
<div style="width:100%; height:2300px; margin-top:30px">
	<div style="float:left; width:54%; height:100%">
    	<div style="width:100%; height:640px; background:#E8E8E8">
        	<img src="photo/<?php echo $image; ?>" style="width:100%; height:100%"  />
        </div>
    </div>
    <div style="float:right; width:46%; height:100%">
    	<h4 style="font-size:28px; text-transform: uppercase;font-feature-settings: 'kern'; margin-left:60px; margin-top:5px"><b><?php echo $name; ?></b></h4>
        <div style="width:490px; height:30px; margin-top:30px; margin-left:60px;">
            <div style="float:left;font-feature-settings: 'kern'">Mã sản phẩm:&nbsp;<b><?php echo $id; ?></b></div>
        </div>
        <div style="color:#f15e2c;font-feature-settings: 'kern';font-size:23px; margin-left:60px; margin-top:30px"><b><?php echo $price; ?> VND</b></div>
        <div style="width:490px; border-top:dashed 2px; opacity:0.5; margin-top:28px; margin-left:60px"></div>
                <div style="margin-left:60px; width:490px; margin-top:30px;font-feature-settings: 'kern'">Giá trên đã bao gồm 10% VAT và giao đến tận công trình. 

        Chúng tôi có đẩy đủ xe tải lớn nhở đảm bảo vận chuyển nhanh chóng cho công trình quý khách. 

        Thanh toán đầy đủ 100% tiền mặt sau khi nhận hàng tại công trình.
</div>
		<div style="width:490px; border-top:dashed 2px; opacity:0.5; margin-top:34px; margin-left:60px"></div>
        
        <div style="width:250px; height:80px; margin-top:30px; margin-left:60px">

            <div style="float:right; width:50%;height:100%; position:relative">
                <div class="" >
                  <div class="" aria-labelledby="">
                      <h5 style="font-feature-settings: 'kern'; font-size:23px"><b>SỐ LƯỢNG</b></h5>
                <div>
                  <input id="soluong"  />
			     </div>
                   </div>
			     </div>
            </div>
        </div>
        <div style="float:left; margin-left:0px; width:40%;height:0%;">

            </div>
        <div style="margin-left:60px; width:492px; height:73px; margin-top:15px">
        	<div style="width:486px; height:100%; background:#000000; float:left; cursor:pointer">
            	<h5 style="font-size:22px;font-feature-settings: 'kern'; color:#FFF; line-height:73px; text-align:center" onclick="alert('Thêm thành công');addMyCart();"><b>THÊM VÀO GIỎ HÀNG</b></h5>
            </div>
        </div>
        <a href="index.php?giohang"><h5 style="margin-left:60px; width:486px; height:73px; margin-top:25px; background:#f15e2c; font-size:22px;font-feature-settings: 'kern'; color:#FFF; text-align:center; line-height:73px"><b>THANH TOÁN</b></h5></a>
        
       <div id="accordionExample" style="margin-left:60px; margin-top:40px;">
       <?php 
	   if($id_category==1) {echo '<div class="accordion-item">
              <div  data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="width:276px; height:33px; cursor:pointer">
              <h6 style="font-size:22px; color:#f15e2c"><b>THÔNG TIN SẢN PHẨM</b><i class="fas fa-angle-up" style="margin-left:8px"></i></h6>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              	<div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:40px"></div>
                  <div style="font-size:16px; margin-top:20px"></div>
                  <div style="font-size:16px">';
				  echo '</div>
                  <div style="font-size:16px">Thương hiệu: ';
				  echo ucwords($design); 
				  echo '</div>
                  <div style="font-size:16px; margin-top:10px">Sản phẩm chất lượng và đúng với hình ảnh.</div>
              </div>
              <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:40px"></div>
          </div>';}
	   ?>
          
  		 <div class="accordion-item">
              <div data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="width:308px; height:33px; cursor:pointer; margin-top:40px">
                <h6 style="font-size:22px; color:#f15e2c;font-feature-settings: 'kern'"><b>QUY ĐỊNH ĐỔI SẢN PHẨM</b><i class="fas fa-angle-up" style="margin-left:8px"></i></h6>
              </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:40px"></div>
                <div style="font-size:16px;font-feature-settings: 'kern';margin-left:50px"><i class="fas fa-shoe-prints"></i>&nbsp;&nbsp;&nbsp;Thời hạn đổi sản phẩm khi mua trực tiếp tại cửa hàng là 07 ngày, kể từ ngày mua.</div>
                <div style="font-size:16px;font-feature-settings: 'kern';margin-left:82px">- Nếu sản phẩm muốn đổi ngang giá trị hoặc có giá trị cao hơn, bạn sẽ cần bù khoảng chênh lệch tại thời điểm đổi (nếu có).</div>
                <div style="font-size:16px;font-feature-settings: 'kern';margin-left:82px">- Nếu bạn mong muốn đổi sản phẩm có giá trị thấp hơn, chúng tôi sẽ không hoàn lại tiền.</div>
                <div style="font-size:16px;font-feature-settings: 'kern';margin-left:50px"><i class="fas fa-shoe-prints"></i>&nbsp;&nbsp;&nbsp;Không hoàn trả bằng tiền mặt dù bất cứ trong trường hợp nào. Mong bạn thông cảm.</div>
            </div>
            <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:40px"></div>
  		</div>
 		 <div class="accordion-item">
              <div data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="width:276px; margin-top:40px; height:33px; cursor:pointer">
                <h6 style="font-size:22px; color:#f15e2c;font-feature-settings: 'kern'"><b>BẢO HÀNH THẾ NÀO?</b><i class="fas fa-angle-up" style="margin-left:8px"></i></h6>
              </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:40px"></div>
                <div style="font-size:16px;font-feature-settings: 'kern'; margin-top:20px">Vui lòng gửi thư đến trung tâm bảo hành BuildingMaterial ngay trong trung tâm TP.HCM trong giờ hành chính:</div>
                <div style="font-size:16px;font-feature-settings: 'kern'; margin-top:20px">Số 4, Tôn Đức Thắng, P. Đa Kao, Q1, TP.HCM</div>
                 <div style="font-size:16px;font-feature-settings: 'kern';">Hotline: 0862 419 307</div>
            </div>
            <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:40px"></div>
 		 </div>
	  </div>


    </div>
</div>
</div>
</body>
</html>
