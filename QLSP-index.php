<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>!!Sửa Sản Phẩm Thất Bại - Tên File Ảnh Bị Trùng!!</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="#FF0000";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==2){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>!!Sửa Sản Phẩm Thất Bại - File Ảnh Không Phù Hợp!!</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="#FF0000";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Sửa Sản Phẩm Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
}
?>
<script>
document.getElementById("qlsp").style.background="#E8E8E8";
function searchSPadmin(){
	var s=document.getElementById("searchAD").value;
	if(s!="") {
	var searchSP= s.trim();
 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("listSPadmin").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "searchSPadmin.php?s=" +searchSP , true);
    xmlhttp.send();
	}
}
function slspSearch(){
	var s=document.getElementById("searchAD").value;
	if(s!="") {
	var searchSP= s.trim();
 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("KQsearch2").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "slspSearch.php?s=" +searchSP , true);
    xmlhttp.send();
	}
}
</script>
<h1 style="font-feature-settings: 'kern'; width:50%; margin:auto; margin-top:30px; text-align:center"><b>QUẢN LÍ SẢN PHẨM</b></h1>
<div style="width:100%; height:90px">
<div style="float:left; margin-top:40px; margin-left:75px; width:40%">

    <div class="d-flex" style="margin-left:10px">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchAD">
      <button class="btn btn-outline-success" type="submit" style="width:120px" onclick="slspSearch();searchSPadmin();"><i class="fab fa-searchengin fa-2x"></i></button>
    </div>
    
</div>
<a href="server.php?category=qlsp&&act=addSP"><button type="button" class="btn btn-outline-primary" style="float:right;width:150px; height:60px; margin-right:100px; margin-top:30px; font-size:30px"><b><i class="fas fa-plus-circle"></i>&nbspThêm</b></button></a>
</div>
<h4 id="KQsearch2"></h4>
<h4 style="width:40%; margin:auto; text-align:center; margin-top:40px;">DANH SÁCH SẢN PHẨM</h4>
<div style="width:85%; margin:auto; margin-top:30px; background:#2c3034; color:#fff;border: 1px solid rgba(0,0,0,0.15); height:60px">
	<h4 style="width:8%; float:left; margin-left:20px; margin-top:13px">MÃ</h4>
    <h4 style="width:11%; float:left; margin-top:13px">ẢNH</h4>
    <h4 style="width:30%; float:left; margin-left:8px; margin-top:13px">TÊN</h4>
    <h4 style="width:18%; float:left; margin-left:-16px; margin-top:13px">GIÁ</h4>
    <h4 style="width:12%; float:left; margin-left:-20px; margin-top:13px">LOẠI</h4>
    <h4 style="width:10%; float:left; margin-left:30px; margin-top:13px">SỬA</h4>
    <h4 style="width:10%; float:right; margin-left:-35px; margin-top:13px">XÓA</h4>
</div>
<div id="listSPadmin">
	<?php
	$s1='<div style="width:100%; height:130px; background-color: #d1e7dd;">';
	$s2='<div style="width:100%; height:130px; background-color: #bcd0c7;">';
	$s='';
	$sql="select * from product order by name";
	$product=pdo_query($sql);
	for($i=0;$i<count($product);$i++){
		  extract($product[$i]);
		  if($i%2==0) {echo $s1;}
		  else {echo $s2;}
		  echo '<div style="width:8%;padding-left:15px" class="listItem"><b>'.$id.'</b></div>
        <div style="width:11%; background:#fff" class="listItem">
		<img src="photo/'.$image.'" style="width:100%; height:100%" />		
        </div>
        <div style="width:30%; padding-left:30px;" class="listItem"><b>'.$name.'</b></div>
        <div style="width:18%;padding-left:20px;" class="listItem"><b>'.$price.'</b></div>
        <div style="width:12%;padding-left:20px;" class="listItem"><b>'.$producer.'</b></div>
        <div style="width:10%" class="listItem">
        	<a href="server.php?category=qlsp&&act=fixSP&&ID='.$id.'"><img src="photo/fix.png" class="fix"  /></a>
        </div>
        <div style="width:11%" class="listItem">
        	<img src="photo/del.png" class="fix" style="margin-left:40px" onclick="xoaSP('.$id.')" />
        </div>
    </div>';
	}
	?>
</div>
<div id="temp"></div>
</body>
</html>
