<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="jquery.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="Style.css"  />
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css"  />

</head>

<body>

<?php
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


function xuliDate($str){
	$from='19/03/2021';
	$to='20/09/2021';
	$dayfrom=explode('/',$from);
	$dayto=explode('/',$to);
	$ddfrom=intval($dayfrom[0]);
	$mmfrom=intval($dayfrom[1]);
	$yyfrom=intval($dayfrom[2]);
	$ddto=intval($dayto[0]);
	$mmto=intval($dayto[1]);
	$yyto=intval($dayto[2]);
	$day=explode('/',$str);
	if(intval($day[2])>$yyfrom&&intval($day[2])<$yyto) return 1;
	if(intval($day[2])<$yyfrom||intval($day[2])>$yyto) return 0;
	
	if(intval($day[2])==$yyfrom) {
		if(intval($day[1])<$mmfrom) return 0;
		if(intval($day[1])==$mmfrom) {
			if(intval($day[0])<$ddfrom) return 0;
		}
	}
	
	if(intval($day[2])==$yyto) {
		if(intval($day[1])>$mmto) return 0;
		if(intval($day[1])==$mmto) {
			if(intval($day[0])>$ddto) return 0;
		}
	}
	return 1;	
}
$day='1/3/2021';
echo xuliDate($day);

?>


<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
