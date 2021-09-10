<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$q = $_REQUEST["q"];
$s = $_REQUEST["s"];
include "pdo.php";
function vn_to_str ($str){
 
$unicode = array(
 
'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
 
'd'=>'đ',
 
'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
 
'i'=>'í|ì|ỉ|ĩ|ị',
 
'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
 
'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
 
'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
 
'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
 
'D'=>'Đ',
 
'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
 
'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
 
'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
 
'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
 
'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
 
);
 
foreach($unicode as $nonUnicode=>$uni){
 
$str = preg_replace("/($uni)/i", $nonUnicode, $str);
$t=strtolower($str);
}
return $t;
}
class productObj {
	public $id;
	public $name;
	public $image;
	public $status;
    public $price;

    public function __construct( $id, $name, $image, $status, $price ){
        $this->id = $id;
        $this->name = $name;
		$this->image= $image;
		$this->status= $status;
		$this->price= $price;
    }

    public function getId()
    {
        return $this->id;
    }
	public function getName()
    {
        return $this->name;
    }
	public function getImage()
    {
        return $this->image;
    }
	public function getStatus()
    {
        return $this->status;
    }
	public function getPrice()
    {
        return $this->price;
    }
}
$search=array();
$sql="select * from product";
$sp=pdo_query($sql);
foreach($sp as $p){
	extract($p);
	$pos=strpos(vn_to_str($name), vn_to_str($s));
	if($pos!==false) {
		$t=array($id,$name,$price,$image,$status);
		array_push($search,$t);
	}
}

	$count=0;
	$arrayProduct=array();
	echo '<div style="width:100%; margin:auto; height:530px">';
	$numItems = count($search);
	$start=($q-1)*12;
	$end=$start+12;
	if($end>$numItems) {$end=$numItems;}
    	for($i=$start;$i<$end;$i++)
   		{
			$temp=$search[$i];
		  $Obj=new productObj($temp[0],$temp[1],$temp[3],$temp[4],$temp[2]);
		  $arrayProduct[]=$Obj;
		  $count++;
		  if($count==3) {
		  	if($arrayProduct[0]->getStatus()=='none') {$stt1='none';}
			else {$t1=explode('-',$arrayProduct[0]->getStatus());
			$stt1=ucfirst( $t1[0] );}
			if($arrayProduct[1]->getStatus()=='none') {$stt2='none';}
			else {$t2=explode('-',$arrayProduct[1]->getStatus());
			$stt2=ucfirst( $t2[0] );}
			if($arrayProduct[2]->getStatus()=='none') {$stt3='none';}
			else {$t3=explode('-',$arrayProduct[2]->getStatus());
			$stt3=ucfirst( $t3[0] );}
		  	echo '<div class="SPsearch" style="float:left; margin-left:0px" id="img'.$arrayProduct[0]->getId().'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        	<a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><div class="imgSPsearch"> 
            	<img src="photo/'.$arrayProduct[0]->getImage().'" style="width:100%; height:100%"  />
                <i style="position:absolute; right:15px; bottom:10px"></i>
                <div class="hoverSP" id="sp'.$arrayProduct[0]->getId().'">
                	<h5 class="muangay"><b>MUA NGAY</b></h5>
                </div>
            </div></a>
            <p class="status"></p>
            <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:10px"></div>
            <a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><h5 class="nameSP"><b>'.$arrayProduct[0]->getName().'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.$arrayProduct[0]->getPrice().' VND</b></h5>
       		</div>
			
			
			 <div class="SPsearch" style="float:left; margin-left:18px" id="img'.$arrayProduct[1]->getId().'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        <a href="index.php?product-detail='.$arrayProduct[1]->getId().'"><div class="imgSPsearch"> 
           <img src="photo/'.$arrayProduct[1]->getImage().'" style="width:100%; height:100%"  />
           <i style="position:absolute; right:15px; bottom:10px"></i>
           <div class="hoverSP" id="sp'.$arrayProduct[1]->getId().'">
           <h5 class="muangay"><b>MUA NGAY</b></h5>
           </div>    
         </div></a>
            <p class="status"></p>
            <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:10px"></div>
            <a href="index.php?product-detail='.$arrayProduct[1]->getId().'"><h5 class="nameSP"><b>'.$arrayProduct[1]->getName().'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.$arrayProduct[1]->getPrice().' VND</b></h5>
        </div>
		
		
		<div class="SPsearch" style="float:right" id="img'.$arrayProduct[2]->getId().'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        <a href="index.php?product-detail='.$arrayProduct[2]->getId().'"><div class="imgSPsearch"> 
           <img src="photo/'.$arrayProduct[2]->getImage().'" style="width:100%; height:100%"  />
           <i style="position:absolute; right:15px; bottom:10px"></i>
           <div class="hoverSP" id="sp'.$arrayProduct[2]->getId().'">
           <h5 class="muangay"><b>MUA NGAY</b></h5>
            </div>
        </div></a>
            <p class="status"></p>
            <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:10px"></div>
            <a href="index.php?product-detail='.$arrayProduct[2]->getId().'"><h5 class="nameSP"><b>'.$arrayProduct[2]->getName().'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.$arrayProduct[2]->getPrice().' VND</b></h5>
        </div>
		</div>';
			if($i != $numItems) {echo '<div style="width:100%; margin:auto; height:530px">';}
			$count=0;
			$arrayProduct=array();
		  }  
		  if ($i == $numItems-1 && $count==1) {
		   	if($arrayProduct[0]->getStatus()=='none') {$stt1='none';}
			else {$t1=explode('-',$arrayProduct[0]->getStatus());
			$stt1=ucfirst( $t1[0] );}
		  echo '<div class="SPsearch" style="float:left; margin-left:0px" id="img'.$arrayProduct[0]->getId().'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        	<a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><div class="imgSPsearch"> 
            	<img src="photo/'.$arrayProduct[0]->getImage().'" style="width:100%; height:100%"  />
                <i style="position:absolute; right:15px; bottom:10px"></i>
                <div class="hoverSP" id="sp'.$arrayProduct[0]->getId().'">
                	<h5 class="muangay"><b>MUA NGAY</b></h5>
                </div>
            </div></a>
            <p class="status"></p>
            <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:10px"></div>
            <a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><h5 class="nameSP"><b>'.$arrayProduct[0]->getName().'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.$arrayProduct[0]->getPrice().' VND</b></h5>
       		</div></div>';	
		  }
		  if ($i == $numItems-1 && $count==2) {
		 	if($arrayProduct[0]->getStatus()=='none') {$stt1='none';}
			else {$t1=explode('-',$arrayProduct[0]->getStatus());
			$stt1=ucfirst( $t1[0] );}
			if($arrayProduct[1]->getStatus()=='none') {$stt2='none';}
			else {$t2=explode('-',$arrayProduct[1]->getStatus());
			$stt2=ucfirst( $t2[0] );}
		  	echo '<div class="SPsearch" style="float:left; margin-left:0px" id="img'.$arrayProduct[0]->getId().'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        	<a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><div class="imgSPsearch"> 
            	<img src="photo/'.$arrayProduct[0]->getImage().'" style="width:100%; height:100%"  />
                <i style="position:absolute; right:15px; bottom:10px"></i>
                <div class="hoverSP" id="sp'.$arrayProduct[0]->getId().'">
                	<h5 class="muangay"><b>MUA NGAY</b></h5>
                </div>
            </div></a>
            <p class="status"></p>
            <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:10px"></div>
            <a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><h5 class="nameSP"><b>'.$arrayProduct[0]->getName().'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.$arrayProduct[0]->getPrice().' VND</b></h5>
       		</div>
			
			
			 <div class="SPsearch" style="float:left; margin-left:18px" id="img'.$arrayProduct[1]->getId().'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        <a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><div class="imgSPsearch"> 
           <img src="photo/'.$arrayProduct[1]->getImage().'" style="width:100%; height:100%"  />
           <i style="position:absolute; right:15px; bottom:10px"></i>
           <div class="hoverSP" id="sp'.$arrayProduct[1]->getId().'">
           <h5 class="muangay"><b>MUA NGAY</b></h5>
           </div>    
         </div></a>
            <p class="status"></p>
            <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:10px"></div>
            <a href="index.php?product-detail='.$arrayProduct[1]->getId().'"><h5 class="nameSP"><b>'.$arrayProduct[1]->getName().'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.$arrayProduct[1]->getPrice().' VND</b></h5>
        </div></div>';
		  }
	}
?>
</body>
</html>
