<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_SESSION['adminlogin'])) unset($_SESSION['adminlogin']);
?>  
<div>
    <div style="font-family: 'Open Sans', sans-serif;
width:100%;
height:795px;
background:url('photo/bann1.jpg') no-repeat 0px 0px;
background-size:cover;
-webkit-background-size:cover;
-ms-background-size:cover;
-o-background-size:cover;
-moz-background-size:cover;
background-position:center;
background-attachment:fixed;">

		<h1 class="titleServer">ĐĂNG NHẬP</h1>

  <div class="main-w3layouts-agileinfo">
		<h2 class="ServerForm">Điền đầy đủ thông tin đăng nhập</h2>
        <form action="server.php" method="post">
        <div class="form-sub-w3">
			<input type="text" name="Username" placeholder="Tài khoản" class="form-sub-w3-text" />
			<div class="icon-w3">
				<i class="fa fa-user" aria-hidden="true"></i>
			</div>
		</div>
        <div class="form-sub-w3">
			<input type="password" name="Password" placeholder="Mật khẩu" class="form-sub-w3-text" />
			<div class="icon-w3">
				<i class="fa fa-unlock-alt" aria-hidden="true"></i>
			</div>
		</div>
        <div class="submit-agileits">
			<input type="submit" value="Đăng nhập" class="submit-agileits-submit" name="login">
		</div>
        </form>
        <h3 style="width:90%; text-align:center; color:#FF0000; margin:auto; margin-top:40px; display:none" id="loginError"><i class="fas fa-bug"></i>&nbsp;Sai tên đăng nhập hoặc mật khẩu!&nbsp;<i class="fas fa-bug"></i></h3>
    </div>
</div>
</body>
</html>
