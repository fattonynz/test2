<?php

include 'vendor/autoload.php';
use phpseclib3\Net\SFTP;

$input = $_GET['farm_id'];



if(filter_var($input, FILTER_VALIDATE_IP)) {

$farm_ip=$input;











}
else {

$id_parts= str_split($input);




$farm_ip="10.8";
$number="farm_";

$length=count($id_parts);

if($length==2){
	$farm_ip="10.8.0.".$id_parts[0].$id_parts[1];
	$number="farm_".$id_parts[0].$id_parts[1];
}
else{
	if($id_parts[1]==0){
		$id_parts[1]=null;
	}
	$farm_ip="10.8.".$id_parts[0].".".$id_parts[1].$id_parts[2];
	$number="farm_".$id_parts[0].$id_parts[1].$id_parts[2];
	
}



}


$username1="radian";
$username2="dts";
$password="rad14n";

echo "Connecting to : $farm_ip";
$connect = new SFTP($farm_ip);




$k=(int)$input;
if($k>353){
	$username1="dts";
	$log_path1=$log_path2;
}
if ($connect->login($username1, $password)) {


echo "Logged In : $farm_ip";
$list=$connect->nlist($log_path1);
$hostname=
mkdir($save_path);
for($i=0;$i<count($list);$i++){
	$file_name= $list[$i];
	echo "Downloading :  \t ".$file_name."  \n ";
	$connect->get($log_path1."$file_name", $save_path."/".$file_name);
	
	echo $connect->get($log_path1);
}


} else {
	
echo "Error Logging In";
	

}





?>