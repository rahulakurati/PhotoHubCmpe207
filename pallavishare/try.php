<?php

$con = mysql_connect("mysql","nikvrm","0hitlerverma"); 
if (!$con) 
  { 
  die('Could not connect: ' . mysql_error()); 
  } 
 
mysql_select_db("cmpe207", $con);







$url = "https://p9.secure.hostingprod.com/@tagshutter.com/ssl/somefile.php";


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
$string = "http://tagshutter.com/iPics/upload/";

	//echo $arr[$c];
			for($i=1;$i<=$num;$i++){
		 
$img[$c-1]=$string.$arr[$c].".jpg";
$img1[$c-1]=$arr[$c].".jpg";
//echo $img[$c-1];
$c++;
			}

foreach($img1 as $m){

mysql_query("INSERT INTO pallavi VALUES('', '$m')");

}





foreach($img as $i){
save_pallaviimage($i); 
}

//Alternative Image Saving Using cURL seeing as allow_url_fopen is disabled - bummer
function save_pallaviimage($img,$fullpath='basename'){
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

header('Location: crossdomain.php');

?>