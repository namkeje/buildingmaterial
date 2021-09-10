<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script>
document.getElementById("slide").style.display='none';
document.title='Search - Price';
</script>
<?php
$price=$_GET['price'];
$p=explode('-',$price);
if($p[0]!='<'&&$p[1]=='>') {
	$from=$p[0];
	$to='';
	$sql="select * from product where price>=".$from." AND id_category=1";
	$sp=pdo_query($sql);
	$count=count($sp);
	$t1=$count/12;
	$t2=intval($count/12);
	if($t1==$t2) $sotrang= $t1;
	else $sotrang= $t2+1;
}
if($p[0]=='<'&&$p[1]!='>') {
	$from='';
	$to=$p[1];
	$sql="select * from product where price<=".$to." AND id_category=1";
	$sp=pdo_query($sql);
	$count=count($sp);
	$t1=$count/12;
	$t2=intval($count/12);
	if($t1==$t2) $sotrang= $t1;
	else $sotrang= $t2+1;
}
if($p[0]!='<'&&$p[1]!='>') {
	$from=$p[0];
	$to=$p[1];
	$sql="select * from product where price>=".$from." AND price<=".$to." AND id_category=1";
	$sp=pdo_query($sql);
	$count=count($sp);
	$t1=$count/12;
	$t2=intval($count/12);
	if($t1==$t2) $sotrang= $t1;
	else $sotrang= $t2+1;
}
?>
<script>
var sotrang=<?php echo $sotrang; ?>;
function pagination(str) {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
	var a="<?php if($from!='') echo $from;
				else echo ''; ?>";
	var b="<?php if($to!='') echo $to; 
				else echo ''; ?>";
	var t=str.split('-');
	var p=t[1];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("loadSP").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "filterPrice.php?q=" + p + "&&pricefrom=" +a + "&&priceto=" +b , true);
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
<div style="width:68%; margin:auto;  margin-top:30px; height:80px">
	<h3 style="font-size:30px; float:left; width:100px; margin-top:20px">Giá từ</h3>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="pricefrom" value="<?php echo $from; ?>" style="width:200px;border: #a5a5a5 1px solid;margin-top:20px; float:left">
    <h3 style="font-size:30px; float:left; width:120px; margin-top:20px; margin-left:50px">Giá đến</h3>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="priceto" value="<?php echo $to; ?>" style="width:200px;border: #a5a5a5 1px solid;margin-top:20px; float:left">
    <button type="button" class="btn btn-success" style="margin-top:18px; margin-left:50px; width:90px; font-size:20px" onclick="locgia()"><b>Lọc</b></button>
</div>
<div style="width:100%; border-bottom:solid 2px; margin-top:50px"></div>
 <div style="width:100%; height:2150px; margin-bottom:80px; margin-top:35px" id="loadSP">
    </div>
    <script>
	if(localStorage.getItem("page")==null) {pagination("page-1");}
	else { var page=localStorage.getItem("page");
	pagination("page-"+page);}
	</script>
    
    <div style="width:25%; margin-left:43%; height:40px; position:relative" id="loadpage">
	
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


</body>
</html>
