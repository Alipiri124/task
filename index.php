

<?php
function numberTowords($num)
{

$ones = array(
 0 =>"sifir",
 1=>"bir",
 2=>"iki",
 3=>"üç",
 4=>"dörd",
 5=>"beş",
 6=>"altı",
 7=>"yeddi",
 8=>"səkkiz",
 9=>"doqquz",
 10=>"on",
 11=>"onbir",
 12=>"oniki",
 13=>"onüç",
 14=>"ondörd",
 15=>"onbeş",
 16=>"onaltı",
 17=>"onyeddi",
 18=>"onsəkkiz",
 19=>"ondoqquz",

);
$tens = array( 
0 => "sifir",
1 => "on",
  2=>"iyirmi",
     3=>"otuz",
     4=>"qırx",
     5=>"əlli",
     6=>"altmış",
     7=>"yetmiş",
     8=>"səksən",
     9=>"doğsan",
); 
$hundreds = array( 
"yüz",
		"min",
		"milyon",	
); 
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr,1); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){
	
while(substr($i,0,1)=="0")
		$i=substr($i,1,5);
if($i < 20){ 

$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
}
} 
if($decnum > 0){
$rettxt .= " and ";
if($decnum < 20){
$rettxt .= $ones[$decnum];
}elseif($decnum < 100){
$rettxt .= $tens[substr($decnum,0,1)];
$rettxt .= " ".$ones[substr($decnum,1,1)];
}
}
return $rettxt;
}
extract($_POST);
if(isset($convert))
{
echo "<p align='center' style='color:blue'>".numberTowords("$num")."</p>";
}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<title>Task</title>
</head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
<body>
<div class="container">
  <div class="row">
     <div class="col-md-5">
		<form method="post">
            <label for="num">Reqemi daxil edin</label>
			<input type="text" name="num" class="form-control" value="<?php if(isset($num)){echo $num;}?>"/>				
			<input type="submit" class="btn btn-primary mt-3" value="Enter" name="convert"/>				
       </form> 
    </div>
  </div>
</div>
</body>
</html>