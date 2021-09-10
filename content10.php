<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script>
document.getElementById("slide").style.display='none';
document.title='Thông Tin Cá Nhân';
document.getElementById("content").style.height='900px';
function checkNameAcc(){
	var ten=[];
	ten=document.getElementById("namead").value;
	var name=document.getElementById("namead").value;
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
	sdt=document.getElementById("phonead").value;
	var phone=document.getElementById("phonead").value;
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
	var add=document.getElementById("addressad").value;
	if(add=="")	{document.getElementById("kt3").innerHTML='<i class="fas fa-exclamation-circle"></i> Địa chỉ không dược bỏ trống';
			return false;	}
	else {document.getElementById("kt3").innerHTML="";
	return true;}
}
function checkPass(){
	var mk=[];
	mk=document.getElementById("passad").value;
	var pass=document.getElementById("passad").value;
	if(pass=="")	{document.getElementById("kt4").innerHTML='<i class="fas fa-exclamation-circle"></i> Mật khẩu không dược bỏ trống';
			return false;	}
	else {document.getElementById("kt4").innerHTML="";}
	if(mk.length<6)	{document.getElementById("kt4").innerHTML='<i class="fas fa-exclamation-circle"></i> Mật khẩu phải từ 6 ký tự trở lên';
			return false;	}
	else {document.getElementById("kt4").innerHTML="";}
	return true;
}
function checkPrePass(){
	var pass=document.getElementById("prepassad").value;
	var mk=document.getElementById("passad").value;
	if(pass=="")	{document.getElementById("kt5").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng xác nhận lại mật khẩu';
			return false;	}
	else {document.getElementById("kt5").innerHTML="";}
	if(pass!=mk)	{document.getElementById("kt5").innerHTML='<i class="fas fa-exclamation-circle"></i> Xác nhận lại mật khẩu không khớp';
			return false;	}
	else {document.getElementById("kt5").innerHTML="";}
	return true;
}
function checkTTAD(){
var check1=checkNameAcc();
var check2=checkPhone();
var check3=checkAddress();
var check4=checkPass();
var check5=checkPrePass();
if(check1==true&&check2==true&&check3==true&&check4==true&&check5==true) return true;
else return false;
}
</script>
<?php
$user=$_SESSION['userlogin'];
$sql="select * from account where id=".$user[7];
$acc=pdo_query_one($sql);
extract($acc);
?>
<h1 style="padding-top:80px; height:80px; margin-left:30px; width:50%; margin:auto; text-align:center"><b>THÔNG TIN TÀI KHOẢN</b></h1>
	<form method="post" action="fixProfileUser.php">
    <div style="width:100%; height:470px; margin-top:90px">
        <div style="width:40%; float:left; height:100%; background:#E8E8E8; margin-left:95px; position:relative">
        	<h5 style="margin-left:40px; margin-top:40px">Họ Tên<i class="fas fa-tag" style="margin-left:40px"></i></h5>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $fullname; ?>" style="width:75%; margin-left:40px; margin-top:20px" name="namead" id="namead">
			<div id="kt1" style="position:absolute; width:77%; height:20px; top:123px; left:40px;color:#FF0000"></div>
            <h5 style="margin-left:40px; margin-top:40px">Số Điện Thoại<i class="fas fa-phone-volume" style="margin-left:40px"></i></h5>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $phone; ?>" style="width:75%; margin-left:40px; margin-top:20px" name="phonead" id="phonead">
			<div id="kt2" style="position:absolute; width:77%; height:20px; top:245px; left:40px;color:#FF0000"></div>
            <h5 style="margin-left:40px; margin-top:40px">Địa Chỉ<i class="fas fa-map-marked-alt" style="margin-left:40px"></i></h5>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $address; ?>" style="width:75%; margin-left:40px; margin-top:20px" name="addressad" id="addressad">
			<div id="kt3" style="position:absolute; width:77%; height:20px; top:367px; left:40px;color:#FF0000"></div>
        </div>
        <div style="width:40%; float:left; height:100%; background:#E8E8E8; margin-left:40px; position:relative">
            <h5 style="margin-left:40px; margin-top:40px">Tên Tài Khoản<i class="fas fa-user-alt" style="margin-left:40px"></i></h5>
      		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $username; ?>" readonly="readonly" style="width:75%; margin-left:40px; margin-top:20px">
             <h5 style="margin-left:40px; margin-top:40px">Mật Khẩu<i class="fas fa-lock" style="margin-left:40px"></i></h5>
            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="width:75%; margin-left:40px; margin-top:20px" name="passad" id="passad">
			<div id="kt4" style="position:absolute; width:77%; height:20px; top:245px; left:40px;color:#FF0000"></div>
            <h5 style="margin-left:40px; margin-top:40px">Nhập Lại Mật Khẩu</h5>
            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="width:75%; margin-left:40px; margin-top:20px" name="prepassad" id="prepassad">
			<div id="kt5" style="position:absolute; width:77%; height:20px; top:367px; left:40px;color:#FF0000"></div>
        </div>
    </div>
	<input type="submit" class="btn btn-danger" style="width:180px; height:60px; margin-left:42%; font-size:24px; margin-top:50px" value="Cập Nhật" onclick="return checkTTAD();"></input>
	</form>';
</body>
</html>
