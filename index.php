<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BuildingMaterial</title>
<link href="fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link href="Style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
session_start();
?>
	<div>
    	<div class="top">	
        <ul id="log">
            <img src="photo/icon.png" width="20" height="22" />
        	<li>Thông Báo</li>
            <img src="photo/shopping.png" width="20" height="22" />
            <a href="index.php?giohang"><li>Lên Xe</li></a>
            <?php if(isset($_SESSION['userlogin'])&&$_SESSION['userlogin']!="") echo '<li onclick="logout()"><i class="fas fa-sign-out-alt" style="margin-left:-20px"></i>&nbsp;Đăng Xuất</li>';
			else echo '<img src="photo/user.png" width="20" height="22" /><a href="index.php?dangnhap"><li>Đăng Nhập</li></a>';
			?>
        </ul>
        </div>
    	<div class="header">
        <div id="delDH"></div>
            
            <?php
			if(isset($_SESSION['userlogin'])&&$_SESSION['userlogin']!="") { $name=$_SESSION['userlogin'];
			echo '<a href="index.php?profile"><div class="iconDN"><i class="fas fa-user-tag" style="transform: rotate(-90deg); margin-left:7px"></i>&nbsp;&nbsp;'.$name[2].'</div></a>';}
			?>
            
        	<div class="accordion accordion-flush" id="accordionFlushExample" style="position:fixed; z-index:4; right:0px; top:230px">
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="position:absolute; top:0px; right:40px; background:#ddd; ">
                </div> 
			</div>
			
            <div class="alert alert-secondary" role="alert" id="thongbao"><b>Đăng Nhập Thành Công!</b></div>
            <?php
				if(isset($_SESSION['tb'])) {
					if($_SESSION['tb']==1){
						echo '<script>document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==2){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Đặt Hàng Thành Công!</b>";
						document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==4){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Hủy Đơn Hàng Thành Công!</b>";
						document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.fontSize="24px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==5){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Không Thể Hủy Đơn Hàng Đã Được Xác Nhận!</b>";
						document.getElementById("thongbao").style.color="#FF0000";
						document.getElementById("thongbao").style.fontSize="18px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==6){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Cập Nhật Thông Tin Cá Nhân Thành Công</b>";
						document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.fontSize="18px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
				}
			?>
            
        	<a href="index.php"><img src="photo/cucgach.png" width="140" height="140" style="margin-left:8%; margin-top:-10px; float: left" /></a>
            <div id="menu">
            	<ul>
                    <li onmouseover="abc(this);" onmouseout="asd(this);" onclick="content();" style="margin-left:-150px" id="cate1"><b>VẬT LIỆU&nbsp&nbsp</b>
                   	<i class="fas fa-angle-down"></i>
                    </li>
                </ul> 
            </div>
          
            <div style="position:absolute; top:45px; right:50px;">
            	<nav class="navbar navbar-light">
                    <div class="container-fluid">
                       	<div class="d-flex">
                         	<input class="form-control me-2" type="search" placeholder="Tìm..." aria-label="Search" id="search">
                          	<button class="btn btn-outline-success" onclick="searchSP()">Tìm vật liệu</button>
                        </div>
                   	</div>
             	</nav>
            </div>
        </div>
        <div id="sub-menu1" class="sub-menu" onmouseover="zxc(this);" onmouseout="qwe(this);">
        <div style="margin:auto; width:1300px; height:70%">
       <img src="photo/logo06.png" class="photo" id="1" onmouseover="hoverIn1(this);" onmouseout="hoverOut1(this);" onclick="attribute('gach')" />
       <img src="photo/logo07.png" class="photo" id="2" onmouseover="hoverIn1(this);" onmouseout="hoverOut1(this);" onclick="attribute('ximang')" />
       <img src="photo/logo09.png" class="photo" id="3" onmouseover="hoverIn1(this);" onmouseout="hoverOut1(this);" onclick="attribute('cat')" />
       <img src="photo/logo08.png" class="photo" id="4" onmouseover="hoverIn1(this);" onmouseout="hoverOut1(this);" onclick="attribute('da')" />
        </div>
         <div style="margin:auto; width:1300px; height:20%">
        <h3 class="title" style="margin-left:130px" id="title1"onmouseover="hoverIn2(this);"onmouseout="hoverOut2(this);">GẠCH</h3>
        <h3 class="title" style="margin-left:225px" id="title2" onmouseover="hoverIn2(this);" onmouseout="hoverOut2(this);">XI MĂNG</h3>
        <h3 class="title" style="margin-left:220px" id="title3" onmouseover="hoverIn2(this);" onmouseout="hoverOut2(this);">CÁT</h3>
        <h3 class="title" style="margin-left:260px" id="title4" onmouseover="hoverIn2(this);" onmouseout="hoverOut2(this);">ĐÁ</h3>
        </div>
        <p style="margin:auto; width:300px; opacity:0.4; font-family:Tahoma; font-size:18px; color:#FFFFFF; text-align:center">HÃY TỰ XÂY DỰNG MÁI ẤM !</p>
        </div>
        <p style="margin:auto; width:300px; opacity:0.4; font-family:Tahoma; font-size:18px; color:#FFFFFF; text-align:center">Hãy tự mình xây dựng mái ấm!</p>
        </div>         
        </div>
        <div style="width:100%; height:45px; background-color:#E8E8E8; position:relative;">
        	<i class="fas fa-chevron-left" style="position:absolute; left:24%; line-height:45px; cursor:pointer" onclick="change2();"></i>
        	<i class="fas fa-chevron-right" style="position:absolute; right:24%; line-height:45px; cursor:pointer" onclick="change1();"></i>
            <div style="width:480px; overflow:hidden; margin-left: 38%">
                <div id="chuyen">
                    <h5 class="introduce" style="margin-left:0px">UY TÍN - NHANH CHÓNG - CHẤT LƯỢNG</h5>
                    <h5 class="introduce">GIAO TẬN NƠI NỘI THÀNH VỚI HÓA ĐƠN TRÊN 10 TRIỆU</h5>
                    <h5 class="introduce">CUNG CẤP VẬT LIỆU VỚI GIÁ TỐT NHẤT</h5>
                    <h5 class="introduce">MUA 1000KG XI MĂNG TẶNG 200 VIÊN GẠCH 4 LỖ</h5>
                </div>
            </div>
        </div>
         <div style="margin:auto; width:1475px; display:block" id="slide">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="photo/bg01.jpg" class="d-block w-100" width="1475" height="780">
                    </div>
                    <div class="carousel-item">
                      <img src="photo/bg02.jpg" class="d-block w-100" width="1475" height="780">
                    </div>
                    <div class="carousel-item">
                      <img src="photo/bg03.jpg" class="d-block w-100" width="1475" height="780">
                    </div>
                    <div class="carousel-item">
                      <img src="photo/bg04.jpg" class="d-block w-100" width="1475" height="780">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
         <div id="xoaPage">
      
         </div>
    <div id="content">
        <?php
		include 'pdo.php';
		if(isset($_GET['category'])) { 
			if($_GET['category']=="vatlieu") require('content1.php');}
		else if(isset($_GET['product-detail'])) { require('CTSP.php'); }
		else if(isset($_GET['giohang'])) { require('content2.php'); }
		else if(isset($_GET['dangnhap'])) { require('content3.php'); }
		else if(isset($_GET['dangki'])) { require('content6.php'); }
		else if(isset($_GET['DS_order'])) { require('content7.php'); }
		else if(isset($_GET['search'])) { require('content8.php'); }
		else if(isset($_GET['price'])) { require('content9.php'); }
		else if(isset($_GET['profile'])) { require('content10.php'); }
		else if(isset($_GET['saleoff'])) { require('content5.php'); }
		else { require('content.php'); }
		?>
    </div>
    <div class="footer">
    	<div class="footerLayout" style="width:25%">
        <div style="width:280px; height:250px; margin:auto; margin-top:10px">
        	<img src="photo/footer.png" width="280" height="250" />
        </div>
        <div style="width:215px; height:40px; background-color:#f15e2c; border: #f15e2c 1px solid; color: #fff;font-feature-settings: 'kern';font-size: 20px; margin:auto; margin-top:-10px; text-align:center; line-height:40px;cursor:pointer;"><b>TÌM CỬA HÀNG</b></div>
    </div>
    <div class="footerLayout">
        <h5 style="font-feature-settings: 'kern';color:#FFFFFF; font-size:22px; margin-top:50px; cursor:pointer; margin-bottom:25px"><b>SẢN PHẨM</b></h5>
        <p class="footerFont">Gạch</p>
        <p class="footerFont">Xi măng</p>
        <p class="footerFont">Cát</p>
        <p class="footerFont">Đá</p>
    </div>
    <div class="footerLayout">
        <h5 style="font-feature-settings: 'kern';color:#FFFFFF; font-size:22px; margin-top:50px; cursor:pointer; margin-bottom:25px"><b>VỀ CÔNG TY</b></h5>
        <p class="footerFont">Tuyển Dụng</p>
        <p class="footerFont">Liên Hệ Nhượng Quyền</p>
        <p class="footerFont">Đại Lý</p>
    </div>
    <div class="footerLayout">
        <h5 style="font-feature-settings: 'kern';color:#FFFFFF; font-size:22px; margin-top:50px; cursor:pointer; margin-bottom:25px"><b>HỖ TRỢ</b></h5>
        <p class="footerFont">FAQs</p>
        <p class="footerFont">Bảo Mật Thông Tin</p>
        <p class="footerFont">Chính Sách Chung</p>
        <p class="footerFont">Tra Cứu Xe Tải</p>
    </div>
    <div class="footerLayout">
    	<h5 style="font-feature-settings: 'kern';color:#FFFFFF; font-size:22px; margin-top:50px; cursor:pointer; margin-bottom:25px"><b>LIÊN HỆ</b></h5>
        <p class="footerFont">Email Góp Ý</p>
        <p class="footerFont">Hotline</p>
        <p class="footerFont">0862 419 307</p>
    </div>
    <div style="width:800px; margin:auto; height:110px; clear:both">
    	<div style="width:30%; float:left; height:100%">
        	<img src="photo/footer01.png" width="200" height="120" style="margin-top:-30px; margin-left:30px" />
        </div>
        <div style="width:70%; float:right; height:100%; font-family:Tahoma; font-size:17px; color:#FFFFFF; opacity:0.3; text-align:center; line-height:110px">Copyrights © 2018 BuildingMaterial. All rights reserved.</div>
    </div>
    <div style="position:absolute; width:75%; right:0px; height:80px; top:230px;">
    	<div style="width:500px; height:80px; margin:auto">
        	<img src="photo/footer3.png" width="240" height="100" style="margin-left:215px; margin-top:-10px; cursor:pointer"/>
        </div>
    </div>
    </div>
    <div id="test"></div>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
