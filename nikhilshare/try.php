<?php


$con = mysql_connect("mysql","nikvrm","0hitlerverma"); 
if (!$con) 
  { 
  die('Could not connect: ' . mysql_error()); 
  } 
 
mysql_select_db("cmpe207", $con);








$url = "http://shared.ap24hrs.com/share/getimage.php";


	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);

	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);


	curl_setopt($ch,CURLOPT_FAILONERROR,1);

	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);

	curl_setopt($ch, CURLOPT_POST, 1); 


	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$c_handler = curl_exec($ch);
	
	curl_close($ch);
	//parsin the return string

	//echo $c_handler;
	//echo "<br/>".$c_handler;

	$arr = explode(" ",$c_handler);
	//echo "<br/>".
	 $num = $arr[0];

	//echo $num;
	 //echo "<br/>";
	 $c=1;
$string = "http://shared.ap24hrs.com/nikhil/";

	//echo $arr[$c];
			for($i=1;$i<=$num;$i++){
		 
$img[$c-1]=$string.$arr[$c];
$img1[$c-1]=$arr[$c];
//echo $img[$c-1];
$c++;
}

foreach($img1 as $m){

mysql_query("INSERT INTO rahul VALUES('', '$m')");

}


foreach($img as $i){




save_rahulimage($i); 






}





//Alternative Image Saving Using cURL seeing as allow_url_fopen is disabled - bummer
function save_rahulimage($img,$fullpath='basename'){
if($fullpath=='basename'){
$fullpath = basename($img);
}
$ch = curl_init ($img);
curl_setopt($ch, CURLOPT_HEADER,  	0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
$rawdata=curl_exec($ch);
curl_close ($ch);
if(file_exists($fullpath)){
unlink($fullpath);
}
$fp = fopen($fullpath,'x');
fwrite($fp, $rawdata);







fclose($fp);
}


header('Location: pallavishare/try.php');



?>