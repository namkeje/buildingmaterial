<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vật liệu</title>
<script src="jquery.js"></script>
</head>

<body>
<script>
document.getElementById("slide").style.display='none';
document.title='Vật liệu';
</script>

<script>
var sotrang=<?php 
if(isset($_GET['category'])) {
	if(isset($_GET['product'])) {
		if(isset($_GET['attribute'])) {
			$pro=$_GET['product'];
			$att=$_GET['attribute'];
			$name_category=$_GET['category'];
			$sql="select * from category where name='".$name_category."'";
			$category=pdo_query_one($sql);
			extract($category);
			$sql="select * from product where id_category=".$id." AND id_name='".$pro."' AND design='".$att."'";
		}
		else {
			$name_category=$_GET['category'];
			$pro=$_GET['product'];
			$sql="select * from category where name='".$name_category."'";
			$category=pdo_query_one($sql);
			extract($category);
			$sql="select * from product where id_category=".$id." AND id_name='".$pro."'";
		}
	}

	else {
		if(isset($_GET['attribute'])) {
			$att=$_GET['attribute'];
			if($att=='gach'||$att=='ximang'||$att=='cat'||$att=='da') {$attribute='producer';}
				else if($att=='ngoi'||$att=='nung'||$att=='khongnung'||$att=='men') {$attribute='status';}
					else if($att=='hoaphat'||$att=='vico'||$att=='hatien') {$attribute='design';}
			$name_category=$_GET['category'];
			$sql="select * from category where name='".$name_category."'";
			$category=pdo_query_one($sql);
			extract($category);
			$sql="select * from product where id_category=".$id." AND ".$attribute."='".$att."'";
		}
		else {
			$name_category=$_GET['category'];
			$sql="select * from category where name='".$name_category."'";
			$category=pdo_query_one($sql);
			extract($category);
			$sql="select * from product where id_category='".$id."'";
		}
	}
}
$product=pdo_query($sql);
$count=count($product);
$t1=$count/12;
$t2=intval($count/12);
if($t1==$t2) echo $t1;
else echo $t2+1;
?>;
function pagination(str) {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
	var t=str.split('-');
	var p=t[1];
	var sp="<?php 
	if(isset($_GET['category'])) {
		echo $_GET['category'];
	}
	 ?>";
	 var att="<?php 
	if(isset($_GET['attribute'])) {
		echo $_GET['attribute'];
	} else echo '';
	 ?>";
	 var pro="<?php 
	if(isset($_GET['product'])) {
		echo $_GET['product'];
	} else echo '';
	 ?>";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("loadSP").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "listSP.php?q=" + p + "&&category=" + sp + "&&product=" + pro + "&&attribute=" + att, true);
    xmlhttp.send();
}
function nextPage(a){
var t=a.split('-');
var index=parseInt(t[1]);
localStorage.setItem("page",index);
var pre=localStorage.getItem("prePage");
var last=localStorage.getItem("lastPage");


if(index>last){
	var a=parseInt(localStorage.getItem("lastPage"));
	localStorage.setItem("prePage",(a+1));
	if(a+4<=sotrang) {localStorage.setItem("lastPage",(a+4)); }
	else {localStorage.setItem("lastPage",sotrang);}
	pre=localStorage.getItem("prePage");
	last=localStorage.getItem("lastPage");
	}
else if(index<localStorage.getItem("prePage")){
	var b=parseInt(localStorage.getItem("prePage"));
	localStorage.setItem("prePage",(b-4)); 
	b=parseInt(localStorage.getItem("prePage"));
	localStorage.setItem("lastPage",(b+3)); 
	pre=localStorage.getItem("prePage");
	last=localStorage.getItem("lastPage");
}		
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("loadpage").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "loadPage.php?p=" + index + "&&sotrang=" + sotrang + "&&pre=" + pre + "&&last=" + last, true);
    xmlhttp.send();
}
function Lastpage(a){
var t=a.split('-');
var page=t[1];
if(page<=sotrang) { var s="page-"+page;
pagination(s);
nextPage(s);
}
}
function Prepage(a){
var t=a.split('-');
var page=t[1];
if(page>=1) { var s="page-"+page;
pagination(s);
nextPage(s);
}
}
</script>
<div class="left">
<div class="container">
  <ul class="acc">
    <li>
      <div class="acc_ctrl" style="width:150px">
        <h3 class="accordion" style="width:150px;margin-top:90px;" onclick="collapse(this);" id="dm1"><b>HÃNG</b><i class="fas fa-angle-up" style="margin-left:8px"></i>
    </h3>
      </div>
      <div class="acc_panel">
          <div class="chitietdanhmuc" onclick="attribute('hatien')" id="firm-ground">Hà Tiên Vicem</div>
          <div class="chitietdanhmuc" onclick="attribute('hoaphat')" id="turf">Hòa Phát</div>
          <div class="chitietdanhmuc" onclick="attribute('vico')" id="indoor">Vicostone</div>
      </div>
      <div style="width:87%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:32px; margin-left:18px"></div>
    </li>
    <li>
      <div class="acc_ctrl" style="width:166px;">
        <h3 class="accordion" style="width:166px;" onclick="collapse(this);" id="dm2"><b>GẠCH</b><i class="fas fa-angle-up" style="margin-left:8px"></i>
</h3>
      </div>
      <div class="acc_panel">
          <div class="chitietdanhmuc" onclick="attribute('ngoi')" id="sale-off">Gạch ngói</div>
          <div class="chitietdanhmuc" onclick="attribute('nung')" id="best-seller">Gạch nung</div>
          <div class="chitietdanhmuc" onclick="attribute('men')" id="new-arrival">Gạch men</div>
          <div class="chitietdanhmuc" onclick="attribute('khongnung')" id="limited-edition">Gạch không nung</div>
      </div>
      <div style="width:87%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:32px; margin-left:18px"></div>
    </li>
    <li>
      <div class="acc_ctrl" style="width:188px;">
       <h3 class="accordion" style="width:188px;" onclick="collapse(this);" id="dm3"><b>VẬT LIỆU</b><i class="fas fa-angle-up" style="margin-left:8px"></i>
</h3>
      </div>
      <div class="acc_panel">
          <div class="chitietdanhmuc" onclick="attribute('gach')" id="adidas">Gạch(Viên)</div>
          <div class="chitietdanhmuc" onclick="attribute('ximang')" id="nike">Xi măng(Bao)</div>
          <div class="chitietdanhmuc" onclick="attribute('cat')" id="puma">Cát(Khối-m3)</div>
          <div class="chitietdanhmuc" onclick="attribute('da')" id="new-balance">Đá(Khối-m3)</div>
      </div>
      <div style="width:87%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:32px; margin-left:18px"></div>
    </li>
     <li>
</h3>

    </li>
  </ul>
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
<div class="locgia"><b>TÌM THEO GIÁ</b></div>
<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="pricefrom" placeholder="Giá Từ"  style="margin-left:30px; margin-top:20px; width:220px">
<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="priceto"  placeholder="Giá Đến"  style="margin-left:30px; margin-top:20px; width:220px">
<button type="button" class="btn btn-warning" style="margin-left:30px; margin-top:20px; width:90px; font-size:22px" onclick="locgia()"><b>Lọc</b></button>
</div>


<?php
if(isset($_GET['attribute'])) {
$att=$_GET['attribute'];
echo '<script>document.getElementById("'.$att.'").style.background="#E8E8E8"</script>';
}
?>
<div class="right">
	<div style="width:100%; height:350px; margin-top:30px;">
    	<img src="photo/content01.jpg" style="width:100%; height:100%; border: 1px solid rgba(0,0,0,0.15);"  />
    </div>
	<div style="width:100%; height:1850px; margin-top:45px; margin-bottom:100px" id="loadSP">
    </div>
    <script>
	if(localStorage.getItem("page")==null) {pagination("page-1");}
	else { var page=localStorage.getItem("page");
	pagination("page-"+page);}
	</script>
    
 
    
 
 	
    <div style="width:40%; margin:auto; height:40px; position:relative;" id="loadpage">
	
    </div>
    
    <script>
	if(localStorage.getItem("prePage")==null&&localStorage.getItem("lastPage")==null) {
	localStorage.setItem("prePage",1);
	localStorage.setItem("lastPage",4);
	nextPage("page-1");
	}
	else {
	var page=localStorage.getItem("page");
	nextPage("page-"+page);
	}
	</script>
    
  
        
</div>
</body>
</html>
