<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script>
document.getElementById("slide").style.display='none';
document.title='Đăng Ký';
document.getElementById("content").style.height='700px';
function checkNameAcc(){
	var ten=[];
	ten=document.getElementById("txtname").value;
	var name=document.getElementById("txtname").value;
	if(name=="")	{document.getElementById("kt1").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên người dùng không dược bỏ trống';
			return false;	}
	else {document.getElementById("kt1").innerHTML="";}
	if(ten.length>20)	{document.getElementById("kt1").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên tài khoản không dược quá 20 kí tự';
			return false;	}
	else {document.getElementById("kt1").innerHTML="";}
	return true;
}
function checkPhone(){
	var sdt=[];
	sdt=document.getElementById("txtphone").value;
	var phone=document.getElementById("txtphone").value;
	if(phone=="")	{document.getElementById("kt2").innerHTML='<i class="fas fa-exclamation-circle"></i> Số điện thoại không dược bỏ trống';
			return false;	}
	else {document.getElementById("kt2").innerHTML="";}
	if(sdt.length!=10)	{document.getElementById("kt2").innerHTML='<i class="fas fa-exclamation-circle"></i> Số điện thoại không hợp lệ';
			return false;	}
	else {document.getElementById("kt2").innerHTML="";}
	for(var i=0;i<sdt.length;i++)
	{
		if(sdt[i].charCodeAt()<48||sdt[i].charCodeAt()>57) 
		{
			document.getElementById("kt2").innerHTML='<i class="fas fa-exclamation-circle"></i> Số điện thoại không hợp lệ';
			return false;
		}
	}
	document.getElementById("kt2").innerHTML="";
	return true;
}
function checkAddress(){
	var add=document.getElementById("txtaddress").value;
	if(add=="")	{document.getElementById("kt3").innerHTML='<i class="fas fa-exclamation-circle"></i> Địa chỉ không dược bỏ trống';
			return false;	}
	else {document.getElementById("kt3").innerHTML="";
	return true;}
}
function checkUsername(){
	var username="<?php
	$sql="select * from account";
	$acc=pdo_query($sql);
	foreach($acc as $tk){
	extract($tk);
	echo $username.'/'; }
	?>";
	var tk=username.split('/');
	var user=[];
	var check=true;
	user=document.getElementById("username").value;
	var name=document.getElementById("username").value;
	if(name=="")	{document.getElementById("kt4").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên tài khoản không dược bỏ trống';
			return false;	}
	else {document.getElementById("kt4").innerHTML="";}
	if(user.length>20)	{document.getElementById("kt4").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên tài khoản không dược quá 20 kí tự';
			return false;	}
	else {document.getElementById("kt4").innerHTML="";}
	for(var i=0;i<tk.length-1;i++)
	{
		if(tk[i]==name) { check=false;
		break; }
	}
	if(check==false)	{document.getElementById("kt4").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên tài khoản đã được sử dụng vui lòng chọn tên khác!';
			return false;	}
	else {document.getElementById("kt4").innerHTML="";}
	return true;
}
function checkPass(){
	var mk=[];
	mk=document.getElementById("txtpass").value;
	var pass=document.getElementById("txtpass").value;
	if(pass=="")	{document.getElementById("kt5").innerHTML='<i class="fas fa-exclamation-circle"></i> Mật khẩu không dược bỏ trống';
			return false;	}
	else {document.getElementById("kt5").innerHTML="";}
	if(mk.length<6)	{document.getElementById("kt5").innerHTML='<i class="fas fa-exclamation-circle"></i> Mật khẩu phải từ 6 ký tự trở lên';
			return false;	}
	else {document.getElementById("kt5").innerHTML="";}
	return true;
}
function checkPrePass(){
	var pass=document.getElementById("txtprepass").value;
	var mk=document.getElementById("txtpass").value;
	if(pass=="")	{document.getElementById("kt6").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng xác nhận lại mật khẩu';
			return false;	}
	else {document.getElementById("kt6").innerHTML="";}
	if(pass!=mk)	{document.getElementById("kt6").innerHTML='<i class="fas fa-exclamation-circle"></i> Xác nhận lại mật khẩu không khớp';
			return false;	}
	else {document.getElementById("kt6").innerHTML="";}
	return true;
}
function checkAcc(){
var check1=checkNameAcc();
var check2=checkPhone();
var check3=checkAddress();
var check4=checkUsername();
var check5=checkPass();
var check6=checkPrePass();
if(check1==true&&check2==true&&check3==true&&check4==true&&check5==true&&check6==true) return true;
else return false;
}
</script>
<div style="width:100%; height:700px;">
	<h4 style="font-feature-settings: 'kern'; margin-top:30px; width:100%; font-size:20px; height:40px; line-height:40px; padding-left:20px; margin-bottom:40px"><b>TẠO MỚI TÀI KHOẢN KHÁCH HÀNG</b></h4>
    <div style="width:100%; height:400px">
        <div style="width:46%; height:340px; float:left; background-color:#E8E8E8; margin-left:30px; position:relative">
            <p style="font-size:18px; margin:0px; margin-left:35px; margin-top:25px">THÔNG TIN CÁ NHÂN</p>
            <hr style="margin:0px; width:85%; margin-left:35px; margin-top:8px; opacity:0.2"  />
            <form method="post" action="xuliDK.php">
            <div class="input-group mb-3" style="width:77%; margin-left:35px; margin-top:30px">
             <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="txtname" id="txtname" placeholder="HỌ TÊN"   />
            </div>
            <div id="kt1" style="position:absolute; width:77%; height:20px; top:130px; left:35px;color:#FF0000"></div>
            <div class="input-group mb-3" style="width:77%; margin-left:35px; margin-top:35px">
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="txtphone" id="txtphone" placeholder="Số điện thoại"   />
            </div>
            <div id="kt2" style="position:absolute; width:77%; height:20px; top:203px; left:35px;color:#FF0000"></div>
            <div class="input-group mb-3" style="width:77%; margin-left:35px; margin-top:35px">
             <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="txtaddress" id="txtaddress" placeholder="Địa chỉ"   />
            </div>
            <div id="kt3" style="position:absolute; width:77%; height:20px; top:276px; left:35px;color:#FF0000"></div>
        </div>
    	<div style="width:46%; height:340px; float:right;  background-color:#E8E8E8; margin-right:30px; position:relative">
            <p style="font-size:18px; margin:0px; margin-left:35px; margin-top:25px">THÔNG TIN ĐĂNG NHẬP</p>
            <hr style="margin:0px; width:85%; margin-left:35px; margin-top:8px; opacity:0.2"  />
             <div class="input-group mb-3" style="width:77%; margin-left:35px; margin-top:30px">
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="username" id="username" placeholder="Tên tài khoản"   />
            </div>
            <div id="kt4" style="position:absolute; width:77%; height:20px; top:130px; left:35px;color:#FF0000"></div>
            <div class="col-sm-10" style="width:77%; margin-left:35px; margin-top:35px">
              <input type="password" class="form-control" name="txtpass" id="txtpass" placeholder="Mật khẩu">
            </div>
            <div id="kt5" style="position:absolute; width:77%; height:20px; top:203px; left:35px;color:#FF0000"></div>
            <div class="col-sm-10" style="width:77%; margin-left:35px; margin-top:35px">
              <input type="password" class="form-control" name="txtprepass" id="txtprepass" placeholder="Xác nhận mật khẩu">
            </div>
            <div id="kt6" style="position:absolute; width:77%; height:20px; top:276px; left:35px;color:#FF0000"></div>
        </div>
    </div>
    <div style="clear:both; background-color:#E8E8E8; width:95%; height:100px; margin:auto; position:relative ">
    	<input type="submit" class="createAcc" name="createAcc" value="TẠO TÀI KHOẢN" onclick="return checkAcc();" />
        </form>
        <a href="index.php?dangnhap"><p class="back1"><i class="fas fa-undo-alt"></i>Trở lại</p></a>
    </div>
</div>
</body>
</html>
