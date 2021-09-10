<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Máy chủ quản trị</title>
<link href="fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link href="Style.css" rel="stylesheet" type="text/css" />
<script src="jquery.js"></script>
</head>

<body>
<div style="width:100%; height:100px; background:#000; position:relative">
<div class="alert alert-primary" role="alert" id="thongbaoad"></div>
<a href="server.php?TrangChu"><h2 style="color:#FFFFFF;width:300px; float:left; font-size:35px; margin-left:30px; margin-top:20px"><b>Quản trị viên</b></h2></a>
<a href="server.php"><button type="button" class="btn btn-light" style="float:right; margin-top:30px; margin-right:50px">Đăng xuất<i class="fas fa-sign-out-alt" style="margin-left:5px"></i></button></a>
<div id="delSP">
	
</div>
</div>

<div style="width:1510px; height:1200px; margin:auto">
<div style="height:100%; width:22%; float:left">
<a><div id="admin">
	<i class="fas fa-user-shield fa-3x" style="position:absolute; top:15px; left:25px"></i>
    <h3 style="position:absolute; font-size:18px; left:100px; top:15px"><?php $nameAdmin=$_SESSION['adminlogin']; echo $nameAdmin[2]; ?></h3>
    <h2 style="position:absolute; font-size:20px; left:130px; top:40px;text-transform: uppercase;"><?php $nameAdmin=$_SESSION['adminlogin']; echo $nameAdmin[5]; ?></h2>
</div></a>
<div class="container">
  <ul class="acc">
	  
	  
		  
		  
    
    <li>
      <div class="acc_ctrl" style="width:275px">
        <h3 class="accordion" style="width:275px; margin-top:70px;" onclick="collapse1(this);" id="qt111"><b>QUẢN TRỊ DANH MỤC</b><i class="fas fa-angle-up" style="margin-left:5px"></i></h3>
      </div>
      <div class="acc_panel">
        <a href="server.php?category=qlsp"><div class="chitietdanhmuc" id="qlsp"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;Sản Phẩm<i class="fab fa-product-hunt" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>
      </div>
      <div style="width:87%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:32px; margin-left:18px"></div>
    </li>

    <li>
      <div class="acc_ctrl" style="width:275px;">
       <h3 class="accordion" style="width:275px" onclick="collapse1(this);" id="qt3"><b>QUẢN TRỊ THÔNG TIN</b><i class="fas fa-angle-up" style="margin-left:5px"></i></h3>
      </div>
      <div class="acc_panel">
      <a href="server.php?category=order"><div class="chitietdanhmuc" id="dsdh"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;Danh Sách Đơn Hàng<i class="far fa-list-alt" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>
      </div>
    </li>
  </ul>
</div>
</div>
<div style="background:#E8E8E8; height:100%; width:78%; float:right" id="adminright">
	
<?php
if(isset($_GET['category'])){
$category=$_GET['category'];
switch ($category){
	case 'qlsp':
	include 'QLSP.php';
	break;
	case 'qldm';
	if(isset($_POST['addDM'])&&($_POST['addDM'])) {
		$tenloai=$_POST['tenloai'];
		$sql="insert into category(name) values('$tenloai')";
		pdo_execute($sql);
		$thongbao="Thành Công!";
	}
	include 'QLDM.php';
	break;
	case 'supplier';
	if(isset($_POST['addSupp'])&&($_POST['addSupp'])) {
		$supp=$_POST['supp'];
		$sql="insert into supplier(name) values('$supp')";
		pdo_execute($sql);
		$thongbao="Thành Công!";
	}
	include 'supplier.php';
	break;
	case 'import';
	if(!isset($_GET['act'])) {
	include "import.php";
	}
	else include 'CT_import.php';
	break;
	case 'DS_import';
	include 'DS_import.php';
	break;
	case 'profile';
	include 'profileServer.php';
	break;
	case 'order';
	include 'DS_order_server.php';
	break;
		
}
}
else {
	
}
?>
</div>
</div>
<script>
$('.acc_ctrl').on('click', function(e) {
  e.preventDefault();
  
  if ($(this).hasClass('active')) {
  $(this).removeClass('active');
    $(this).next()
    .stop()
    .slideDown(300);
  } else {
      
	     $(this).addClass('active');
    $(this).next()
    .stop()
    .slideUp(300);
  }
});

</script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>
