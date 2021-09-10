<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Xe Hàng</title>
</head>

<body>
<?php
if(!isset($_SESSION['mycart'])&&isset($_SESSION['userlogin'])) {
echo '<script>
document.getElementById("slide").style.display="none";
document.title="Xe Hàng";
document.getElementById("content").style.height="380px";
</script>
<div style="width:100%; height:380px">
<h3 class="titleCart"><b>XE HÀNG CỦA BẠN</b></h3>
<hr size="3.5px" style="opacity:1; color:#000; background:#000"  />
<p class="alertCart">Bạn đang không có sản phẩm nào trong xe hàng!</p>
<a href="index.php?category=vatlieu"><div class="return"><b>QUAY LẠI MUA HÀNG</b></div></a>
<a href="index.php?DS_order"><div class="return" style="width:380px; background: #ff5f17; margin-top:40px"><b>XEM DANH SÁCH ĐƠN ĐẶT HÀNG</b></div></a>
</div>';
}
else if(!isset($_SESSION['mycart'])) {
echo '<script>
document.getElementById("slide").style.display="none";
document.title="Giỏ Hàng";
document.getElementById("content").style.height="380px";
</script>
<div style="width:100%; height:380px">
<h3 class="titleCart"><b>XE HÀNG CỦA BẠN</b></h3>
<hr size="3.5px" style="opacity:1; color:#000; background:#000"  />
<p class="alertCart">Bạn đang không có sản phẩm nào trong xe hàng!</p>
<a href="index.php?category=vatlieu"><div class="return"><b>QUAY LẠI MUA HÀNG</b></div></a>
</div>';}
else if(isset($_SESSION['mycart']) && count($_SESSION['mycart'])==0) {
echo '<script>
document.getElementById("slide").style.display="none";
document.title="Giỏ Hàng";
document.getElementById("content").style.height="380px";
</script>
<div style="width:100%; height:380px">
<h3 class="titleCart"><b>XE HÀNG CỦA BẠN</b></h3>
<hr size="3.5px" style="opacity:1; color:#000; background:#000"  />
<p class="alertCart">Bạn đang không có sản phẩm nào trong xe hàng!</p>
<a href="index.php?category=vatlieu"><div class="return"><b>QUAY LẠI MUA HÀNG</b></div></a>
<a href="index.php?DS_order"><div class="return" style="width:380px; background: #ff5f17; margin-top:40px"><b>XEM DANH SÁCH ĐƠN ĐẶT HÀNG</b></div></a>
</div>'; }
else {
	include 'CART.php';
}
?>
</body>
</html>
