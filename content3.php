<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script>
document.getElementById("slide").style.display='none';
document.title='Đăng Nhập';
document.getElementById("content").style.height='520px';
var username="<?php
	$sql="select * from account";
	$acc=pdo_query($sql);
	foreach($acc as $tk){
	extract($tk);
	echo $username.'/'; }
	?>";
var tk=username.split('/');
var password="<?php
	$sql="select * from account";
	$acc=pdo_query($sql);
	foreach($acc as $tk){
	extract($tk);
	echo $password.'/'; }
	?>";
var pass=password.split('/');
function ktTK(){
var taikhoan=document.getElementById("username").value;
for(var i=0;i<tk.length-1;i++)
	{
		if(tk[i]==taikhoan) return true; 
	}
return false;
}
function ktMK(){
var matkhau=document.getElementById("inputPassword").value;
for(var i=0;i<pass.length-1;i++)
	{
		if(pass[i]==matkhau) return true; 
	}
return false;
}
function ktDN(){
var check1=ktTK();
var check2=ktMK();
if(check1==true&&check2==true) { 
	var taikhoan=document.getElementById("username").value;
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("test").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "userlogin.php?tk=" + taikhoan, true);
    xmlhttp.send();
	setTimeout(chuyen,200);}
else { alert("Sai Tên Tài Khoản Hoặc Mật Khẩu!");
}
}
function chuyen(){
location.replace("index.php");
}
</script>
<?php 
if(isset($_SESSION['DKTC'])) {echo '<script>document.getElementById("thongbao").innerHTML="<b>Đăng Ký Tài Khoản Thành Công!</b>";
						document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['DKTC']);}
?>
<div style="width:100%; height:400px">
    <div style="width:60%; height:400px; float:left">
    <h4 style="font-feature-settings: 'kern'; margin-top:30px;background-color:#E8E8E8; width:93%; font-size:23px; height:40px; line-height:40px; padding-left:20px"><b>KHÁCH HÀNG ĐĂNG NHẬP</b></h4>
    <p style="font-size:14px; margin:0px; margin-left:10px; margin-top:25px">Khách hàng đã đăng ký</p>
    <p style="font-size:14px; margin:0px;margin-left:10px; margin-top:15px">Nếu bạn có một tài khoản, hãy đăng nhập bằng địa chỉ tài khoản của bạn.</p>
     <div class="input-group mb-3" style="width:77%; margin-left:10px; margin-top:30px">
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="username" placeholder="Nhập tài khoản"   />
    </div>
    <div class="col-sm-10" style="width:77%; margin-left:10px; margin-top:35px">
      <input type="password" class="form-control" id="inputPassword" name="txtpass" placeholder="Mật khẩu">
    </div>
    <div style="background-color:#000000; height:40; font-size:18px; font-feature-settings: 'kern'; cursor:pointer; width:150px; color:#FFFFFF; line-height:40px; text-align:center; margin-left:10px; margin-top:40px" onclick="ktDN()"><b>ĐĂNG NHẬP</b></div>
    </div>
    <div style="width:40%; height:400px; float:right; background:#E8E8E8; margin-top:30px">
    <p style="font-size:14px; margin:0px; margin-left:20px; margin-top:62px">Khách hàng mới</p>
    <p style="font-size:14px; margin:0px; margin-left:20px; margin-top:15px">Tạo một tài khoản có nhiều lợi ích: kiểm tra nhanh hơn, giữ nhiều hơn một địa chỉ, theo dõi các đơn đặt hàng và nhiều hơn nữa.</p>
    <a href="index.php?dangki"><div style="background-color:#000000; height:40; font-size:18px; font-feature-settings: 'kern'; cursor:pointer; width:180px; color:#FFFFFF; line-height:40px; text-align:center; margin-left:20px; margin-top:35px"><b>TẠO TÀI KHOẢN</b></div></a>
    </div>	
</div>
<div id="test"></div>
</body>
</html>
