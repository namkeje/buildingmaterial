<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>	
<script>
document.getElementById("qlsp").style.background="#E8E8E8";
</script>
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
}
?>
<h1 style="font-feature-settings: 'kern'; margin-top:30px; margin-left:30px"><b>CÀI ĐẶT SẢN PHẨM</b></h1>
<p style="width:35%; font-feature-settings: 'kern'; font-size:22px; text-align:center; margin:auto; margin-top:50px">CHỈNH SỬA THÔNG TIN SẢN PHẨM<i class="fas fa-tools" style="margin-left:10px"></i></p>
<div style="width:100%; height:700px;  margin-top:20px">
<div style="width:45%; float:left; height:100%; background:#fff; margin-left:40px; position:relative">
	<form method="post" action="xulifixSP.php" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $id; ?>"  name="id" />
     <h5 style="margin-left:40px; margin-top:30px">ID Sản Phẩm</h5>
     <div class="input-group mb-3" style="width:75%; margin-left:40px">
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $id; ?>" name="fixId" id="fixId">
    </div>
    <div id="error3" style="position:absolute; width:80%; left:40px; top:100px; height:25px; color:#FF0000"></div>
	<h5 style="margin-left:40px; margin-top:30px">Tên Sản Phẩm<i class="fas fa-tag" style="margin-left:40px"></i></h5>
    <div class="input-group mb-3" style="width:75%; margin-left:40px">
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $name; ?>" name="fixname" id="fixname">
    </div>
    <div id="error2" style="position:absolute; width:80%; left:40px; top:200px; height:25px; color:#FF0000"></div>
    <h5 style="margin-left:40px; margin-top:30px">Giá Sản Phẩm<i class="fas fa-coins" style="margin-left:40px"></i></h5>
    <div class="input-group mb-3" style="width:75%; margin-left:40px">
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $price; ?>" name="fixprice" id="fixprice">
    </div>
    <div id="error4" style="position:absolute; width:80%; left:40px; top:300px; height:25px; color:#FF0000"></div>
    <h5 style="margin-left:40px; margin-top:30px">Ảnh Sản Phẩm<i class="far fa-images" style="margin-left:30px"></i></h5>
    <div style="width:75%; margin-left:40px">
  	  <input class="form-control form-control-lg" id="formFileLg" type="file" name="fiximage" onchange="ImagesFileAsURLFix(this.id)" onclick="closeImgFix()">
	</div>
     <div id="upload2" style="width:240px; height:220px; margin:auto; margin-top:30px; background:#E8E8E8">
     	<?php echo '<img src="photo/'.$image.'" style="width:240px; height:220px" />'; ?>
    </div>
</div>
<div style="width:45%; float:left; height:100%; background:#fff; margin-left:40px">
   <h5 style="margin-left:40px; margin-top:30px">Loại Danh Mục<i class="fas fa-list-ul" style="margin-left:30px"></i></h5>
    <select class="form-select" aria-label="Default select example" style="width:75%; margin-left:40px" name="fixcategory">
      <?php
	  $t=array("vatlieu");
	  for($i=0;$i<count($t);$i++){
	  	if($t[$i]==$id_category) echo '<option selected>'.$t[$i].'</option>';
		else echo '<option>'.$t[$i].'</option>';
	  }
	  ?>
    </select>
    <h5 style="margin-left:40px; margin-top:30px">Thương Hiệu<i class="fas fa-remove-format" style="margin-left:30px"></i></h5>
    <select class="form-select" aria-label="Default select example" style="width:75%; margin-left:40px" name="fixdesign">
      <?php
	  $t=array("hatien","hoaphat","vico");
	  for($i=0;$i<count($t);$i++){
	  	$s=preg_split("/\(/",$t[$i]);
		$a=$s[0];
	  	if($a==$design) echo '<option selected>'.$t[$i].'</option>';
		else echo '<option>'.$t[$i].'</option>';
	  }
	  ?>
    </select>
     <h5 style="margin-left:40px; margin-top:30px">Vật Liệu<i class="far fa-registered" style="margin-left:30px"></i></h5>
    <select class="form-select" aria-label="Default select example" style="width:75%; margin-left:40px" name="fixproducer">
       <?php
	  $t=array("gach","ximang","cat","da");
	  for($i=0;$i<count($t);$i++){
	  	if($t[$i]==$producer) echo '<option selected>'.$t[$i].'</option>';
		else echo '<option>'.$t[$i].'</option>';
	  }
	  ?>
    </select>
    <h5 style="margin-left:40px; margin-top:30px">Loại Gạch</h5>
    <select class="form-select" aria-label="Default select example" style="width:75%; margin-left:40px" name="fixstatus">
    	 <?php
	  $t=array("none","men","ngoi","nung","khongnung");
	  for($i=0;$i<count($t);$i++){
	  	if($t[$i]==$status) echo '<option selected>'.$t[$i].'</option>';
		else echo '<option>'.$t[$i].'</option>';
	  }
	  ?>
    </select>
   
</div>	
</div>
<div style="width:65%; height:60px; margin:auto; margin-top:50px; position:relative">
<input type="submit" class="btn btn-outline-success" style="float:left; height:100%; width:25%; font-size:22px; border:solid 3px" value="Cập Nhật" onclick="return checkFixTTSP();"></input>
<button type="reset" class="btn btn-outline-warning" style="float:right; height:100%; width:25%; font-size:22px; border:solid 3px">Đặt Lại</button>
</form>
<a href="server.php?category=qlsp"><div class="back"><i class="fas fa-undo-alt"></i>Trở Lại</div></a>
</div>
</body>
</html>
