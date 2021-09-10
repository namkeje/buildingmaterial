// JavaScript Document
function abc(a){
var t=a.id;
var id=t.substr(t.length-1);
document.getElementById("sub-menu" + id).style.display='block';
document.getElementById("cate" + id).style.color='#FF8C00';
}
function asd(a){
var t=a.id;
var id=t.substr(t.length-1);
document.getElementById("sub-menu" + id).style.display='none';
document.getElementById("cate" + id).style.color='black';	
}
function zxc(a){
var t=a.id;
var id=t.substr(t.length-1);
document.getElementById(t).style.display='block';
//document.getElementById("arr").style.color='#FF8C00';
document.getElementById("cate" + id).style.color='#FF8C00';
}
function qwe(a){
var t=a.id;
var id=t.substr(t.length-1);
document.getElementById(t).style.display='none';
//document.getElementById("arr").style.color='black';
document.getElementById("cate" + id).style.color='black';	
}
function hoverIn1(a){
var t=a.id;
for(var i=1;i<9;i++)
{
	var s="title"+i;
	if(t==i) { 
		document.getElementById(i).style.opacity=1;
		document.getElementById(s).style.opacity=1;
		break;
		}
}
}
function hoverOut1(a){
var t=a.id;
for(var i=1;i<9;i++)
{
	var s="title"+i;
	if(t==i) { 
		document.getElementById(i).style.opacity=0.4;
		document.getElementById(s).style.opacity=0.4;
		break;
		}
}
}
function hoverIn2(a){
var t=a.id;
for(var i=1;i<9;i++)
{
	var s="title"+i;
	if(t==s) { 
		document.getElementById(i).style.opacity=1;
		document.getElementById(s).style.opacity=1;
		document.getElementById(s).style.color='#FF8C00';
		break;
		}
}
}
function hoverOut2(a){
var t=a.id;
for(var i=1;i<9;i++)
{
	var s="title"+i;
	if(t==s) { 
		document.getElementById(i).style.opacity=0.4;
		document.getElementById(s).style.opacity=0.4;
		document.getElementById(s).style.color='#FFF';
		break;
		}
}
}
var i=1;
function change1(){
if(i==1) {document.getElementById("chuyen").style.marginLeft='-470px';}
if(i==2) {document.getElementById("chuyen").style.marginLeft='-1020px';}
if(i==3) {document.getElementById("chuyen").style.marginLeft='-1520px';}
if(i==4) {document.getElementById("chuyen").style.marginLeft='0px';i=0;}
i++;
}
function change2(){
if(i==1) {document.getElementById("chuyen").style.marginLeft='-1520px';i=5;}
if(i==2) {document.getElementById("chuyen").style.marginLeft='0px';}
if(i==3) {document.getElementById("chuyen").style.marginLeft='-470px';}
if(i==4) {document.getElementById("chuyen").style.marginLeft='-1020px';}
i--;
}
var dm=[{status:'up',name:'KIỂU DÁNG'},
		{status:'up',name:'TRẠNG THÁI'},
		{status:'up',name:'THƯƠNG HIỆU'},
		{status:'up',name:'CHẤT LIỆU'},
		{status:'up',name:'VỚ'},
		{status:'up',name:'TÚI XÁCH'},
		{status:'up',name:'BẢO VỆ'},
		{status:'up',name:'STYLE'},];
function collapse(a){
var t=a.id;
for(var i=0;i<8;i++)
{
	var s="dm"+(i+1);
	if(t==s) {
		if(dm[i].status=='down') {document.getElementById(s).innerHTML='<b>'+dm[i].name+'</b><i class="fas fa-angle-up" style="margin-left:8px"></i>';dm[i].status='up';
					document.getElementById(s).style.color='#f15e2c';}
		else 	{document.getElementById(s).innerHTML='<b>'+dm[i].name+'</b><i class="fas fa-angle-down" style="margin-left:8px"></i>';dm[i].status='down';
				document.getElementById(s).style.color='#000';}
		break;
	}
}		
}
var qt=[{status:'up',name:'QUẢN TRỊ DANH MỤC'},
		{status:'up',name:'QUẢN TRỊ GIAO DIỆN'},
		{status:'up',name:'QUẢN TRỊ THÔNG TIN'},
		{status:'up',name:'QUẢN TRỊ TÀI KHOẢN'}];
function collapse1(a){
var t=a.id;
for(var i=0;i<4;i++)
{
	var s="qt"+(i+1);
	if(t==s) {
		if(qt[i].status=='down')  {document.getElementById(s).innerHTML='<b>'+qt[i].name+'</b><i class="fas fa-angle-up" style="margin-left:5px"></i>';qt[i].status='up';
			document.getElementById(s).style.color='#f15e2c';}
		else {document.getElementById(s).innerHTML='<b>'+qt[i].name+'</b><i class="fas fa-angle-down" style="margin-left:5px"></i>';qt[i].status='down';
			document.getElementById(s).style.color='#000';}
	break;
	}
}
}
function checkPrice(){
	var price=[];
	price=document.getElementById("price").value;
	var t=document.getElementById("price").value;
	if(t=="") {document.getElementById("error").innerHTML='<i class="fas fa-exclamation-circle"></i> Giá sản phẩm không dược bỏ trống';
			return false;	}
	for(var i=0;i<price.length;i++)
	{
		if(price[i].charCodeAt()<48||price[i].charCodeAt()>57) 
		{
			document.getElementById("error").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng nhập số';
			return false;
		}
	}
	document.getElementById("error").innerHTML="";
	return true;
}
function checkName(){
	var name=document.getElementById("namesp").value;
	var t=[];
	t=document.getElementById("namesp").value;
	if(name=="")	{document.getElementById("error1").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên sản phẩm không dược bỏ trống';
			return false;	}
	var t=[];
	t=document.getElementById("namesp").value;
	for(var i=0;i<t.length;i++)
	{
		if(t[i]==' ') {document.getElementById("error1").innerHTML=""; 
			return true;
		}
	}
	document.getElementById("error1").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên sản phẩm không phù hợp';
	return false;
}
function checkTTSP(){
var check1=checkPrice();
var check2=checkName();
if(check1==true&&check2==true) return true;
else return false;
}
function checkFixName(){
	var name=document.getElementById("fixname").value;
	if(name=="")	{document.getElementById("error2").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên sản phẩm không dược bỏ trống';
			return false;	}
	var t=[];
	t=document.getElementById("fixname").value;
	for(var i=0;i<t.length;i++)
	{
		if(t[i]==' ') {document.getElementById("error2").innerHTML=""; 
			return true;
		}
	}
	document.getElementById("error2").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên sản phẩm không phù hợp';
	return false;
}
function checkFixId(){
	var name=document.getElementById("fixId").value;
	if(name=="")	{document.getElementById("error3").innerHTML='<i class="fas fa-exclamation-circle"></i> ID sản phẩm không dược bỏ trống';
			return false;	}
	else {document.getElementById("error3").innerHTML="";
	return true;}
}
function checkFixPrice(){
	var price=[];
	price=document.getElementById("fixprice").value;
	var t=document.getElementById("fixprice").value;
	if(t=="") {document.getElementById("error4").innerHTML='<i class="fas fa-exclamation-circle"></i> Giá sản phẩm không dược bỏ trống';
			return false;	}
	for(var i=0;i<price.length;i++)
	{
		if(price[i].charCodeAt()<48||price[i].charCodeAt()>57) 
		{
			document.getElementById("error4").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng nhập số';
			return false;
		}
	}
	document.getElementById("error4").innerHTML="";
	return true;
}
function checkFixTTSP(){
var check1=checkFixId();
var check2=checkFixName();
var check3=checkFixPrice();
if(check1==true&&check2==true&&check3==true) return true;
else return false;
}
function hoverSP1(a){
var t=a.id;
var c=t.slice(3,t.length);
document.getElementById("sp"+c).style.display='block';
}
function hoverSP2(a){
var t=a.id;
var c=t.slice(3,t.length);
document.getElementById("sp"+c).style.display='none';
}
function selectSize(a,id){
if(a=="freeSize") { var size="freesize";
	document.getElementById("dropdownMenuButton1").innerHTML='<h6 style="position:absolute; left:10px; top:5px"><b>free</b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:5px"></i>';
	document.getElementById("freeSize").style.background='#E8E8E8';
	document.getElementById("size").value="freesize";
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("HienThiSL").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "HienThiSLSP.php?id=" + id + "&&size=" + size, true);
    xmlhttp.send();
	document.getElementById("btnSLnone").style.display='none';
}
else {
var t=a.split('-');
var size=t[1];
document.getElementById("dropdownMenuButton1").innerHTML='<h6 style="position:absolute; left:10px; top:5px"><b>'+size+'</b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:5px"></i>';
document.getElementById("dropdownMenuButton2").innerHTML='<h6 style="position:absolute; left:10px; top:5px"><b></b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:5px"></i>';
document.getElementById("soluong").value="";
document.getElementById("size").value=size;
for(var i=35;i<=46;i++)
{
	document.getElementById("size-"+i).style.background='';	
}
document.getElementById("size-"+size).style.background='#E8E8E8';
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("HienThiSL").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "HienThiSLSP.php?id=" + id + "&&size=" + size, true);
    xmlhttp.send();
document.getElementById("btnSLnone").style.display='none';
}
}
function selectSoLuong(a){
var t=a.split('-');
var sl=t[1];
document.getElementById("dropdownMenuButton2").innerHTML='<h6 style="position:absolute; left:10px; top:5px"><b>'+sl+'</b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:5px"></i>';
document.getElementById("soluong").value=sl;
for(var i=1;i<=12;i++)
{
	document.getElementById("sl-"+i).style.background='';	
}
document.getElementById("sl-"+sl).style.background='#E8E8E8';
}
function content(){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
	localStorage.clear();
}
window.location.assign("index.php?category=vatlieu");
}
function content1(){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
	localStorage.clear();
}
window.location.assign("index.php?category=dungcu");
}
function attribute(a){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
	localStorage.clear();
}
var url="index.php?category=vatlieu&&attribute="+a;
window.location.assign(url);
}
function phukien(a){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
	localStorage.clear();
}
var url="index.php?category=dungcu&&product="+a;
window.location.assign(url);
}
function phukienAtt(a,b){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
	localStorage.clear();
}
var url="index.php?category=dungcu&&product="+a+"&&attribute="+b;
window.location.assign(url);
}
function ImagesFileAsURL(id)
{
	var fileSelected = document.getElementById(id).files;
	if(fileSelected.length>0)
	{
		var fileToLoad = fileSelected[0];
		var fileReader = new FileReader();
		fileReader.onload = function(fileLoaderEvent){
			var srcData = fileLoaderEvent.target.result;
			var newImage = document.createElement('img');
			newImage.src= srcData;
			var s=newImage.outerHTML;
			var str = s.split('"');
			str.pop();
			var t=' width="240" height="220">';
			str.push(t);
			var photo=str[0]+'"'+str[1]+'"'+str[2];
			document.getElementById('upload1').innerHTML= photo;
	}
	fileReader.readAsDataURL(fileToLoad);
}
}
function closeImg(){
document.getElementById('upload1').innerHTML= "";
}
function ImagesFileAsURLFix(id)
{
	var fileSelected = document.getElementById(id).files;
	if(fileSelected.length>0)
	{
		var fileToLoad = fileSelected[0];
		var fileReader = new FileReader();
		fileReader.onload = function(fileLoaderEvent){
			var srcData = fileLoaderEvent.target.result;
			var newImage = document.createElement('img');
			newImage.src= srcData;
			var s=newImage.outerHTML;
			var str = s.split('"');
			str.pop();
			var t=' width="240" height="220">';
			str.push(t);
			var photo=str[0]+'"'+str[1]+'"'+str[2];
			document.getElementById('upload2').innerHTML= photo;
	}
	fileReader.readAsDataURL(fileToLoad);
}
}
function closeImg(){
document.getElementById('upload1').innerHTML= "";
}
function closeImgFix(){
document.getElementById('upload2').innerHTML= "";
}
function xoaSP(id){
document.getElementById('delSP').style.display='block';
var s="";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to delete this product?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="delSP('+id+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delSP').innerHTML=s;	
}
function xoaDH(id){
document.getElementById('delDH').style.display='block';
var s="";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to delete this order?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="confirm_xoaDH('+id+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel_xoaDH()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delDH').innerHTML=s;	
}

function cancel_xoaDH(){
document.getElementById('delDH').style.display='none';
}

function confirm_xoaDH(id){
var t=id;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("temp").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "delDH.php?id=" + t , true);
xmlhttp.send();
setTimeout(loadDS,200);
}

function cancel(){
document.getElementById('delSP').style.display='none';
}

function delSP(id){
var t=id;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("temp").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "delSP.php?id=" + t , true);
xmlhttp.send();
location.reload();
}

function logout(){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("test").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "userlogin.php", true);
    xmlhttp.send();
	location.reload();
}

function loadDS(){
	location.reload();
}
function searchSP(){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
	localStorage.clear();
}
var s1=document.getElementById("search").value;
if(s1!=""){
var s2=s1.trim();
var s3=s2.replace(" ","+");
window.location.assign("index.php?search="+s3);}
}
function closeTB(){
document.getElementById("thongbao").style.display="none";
}
function locgia(){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
localStorage.clear();
}
var t1=[],t2=[];
var a1=document.getElementById("pricefrom").value;
var a2=document.getElementById("priceto").value;
t1=document.getElementById("pricefrom").value;
t2=document.getElementById("priceto").value;
if(a1==""&&a2=="") 
{
	document.getElementById("thongbao").style.color="red";
	document.getElementById("thongbao").style.fontSize="20px";
	document.getElementById("thongbao").innerHTML="<b>Vui lòng nhập Giá từ hoặc Giá đến</b>";
	document.getElementById("thongbao").style.display="block";
	setTimeout(closeTB,3000);
	return 0;
}
if(a1!=""&&a2==""){
	for(var i=0;i<t1.length;i++)
	{
		if(t1[i].charCodeAt()<48||t1[i].charCodeAt()>57) 
		{
			document.getElementById("thongbao").style.color="red";
			document.getElementById("thongbao").innerHTML="<b>Vui lòng nhập số!!</b>";
			document.getElementById("thongbao").style.display="block";
			setTimeout(closeTB,3000);
			return 0;
		}
	}
	window.location.assign("index.php?price="+a1+"->");
}

if(a1==""&&a2!=""){
	for(var i=0;i<t2.length;i++)
	{
		if(t2[i].charCodeAt()<48||t2[i].charCodeAt()>57) 
		{
			document.getElementById("thongbao").style.color="red";
			document.getElementById("thongbao").innerHTML="<b>Vui lòng nhập số!!</b>";
			document.getElementById("thongbao").style.display="block";
			setTimeout(closeTB,3000);
			return 0;
		}
	}
	window.location.assign("index.php?price=<-"+a2);
}
if(a1!=""&&a2!=""){
	for(var i=0;i<t1.length;i++)
	{
		if(t1[i].charCodeAt()<48||t1[i].charCodeAt()>57) 
		{
			document.getElementById("thongbao").style.color="red";
			document.getElementById("thongbao").innerHTML="<b>Vui lòng nhập số!!</b>";
			document.getElementById("thongbao").style.display="block";
			setTimeout(closeTB,3000);
			return 0;
		}
	}
	for(var i=0;i<t2.length;i++)
	{
		if(t2[i].charCodeAt()<48||t2[i].charCodeAt()>57) 
		{
			document.getElementById("thongbao").style.color="red";
			document.getElementById("thongbao").innerHTML="<b>Vui lòng nhập số!!</b>";
			document.getElementById("thongbao").style.display="block";
			setTimeout(closeTB,3000);
			return 0;
		}
	}
	var p1=parseInt(a1);
	var p2=parseInt(a2);
	if(p1<p2){
	window.location.assign("index.php?price="+p1+"-"+p2);}
	else {window.location.assign("index.php?price="+p2+"-"+p1);}
}
}