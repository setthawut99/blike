<?PHP
include("../config.php");
include("conn.php");
error_reporting(0);
session_start();


function curl($URL){
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $URL); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);  
		return $output;
}

if($_POST['token'] == ""){
	exit(json_encode(array('error' => true, 'msg' => 'ช่อง Token ต้องไม่ว่างเปล่าครับ')));
}


$checktoken = json_decode(curl("https://graph.facebook.com/me?fields=id,name&access_token=".$_POST['token']),TRUE);
if($checktoken['id'] == ""){
	exit(json_encode(array('error' => true, 'msg' => 'Token ผิดพลาดโปรดกดรับ Token แล้วมาใช้งานใหม่ครับ !!')));
}else {
	
	
	$result = $conn->query("SELECT * FROM token WHERE fbid = '".$checktoken['id']."'");
	$checkfbidtoken = $result->fetch_assoc();
	
	if($checkfbidtoken == ""){
		$conn->query("INSERT INTO token (fbid, token, status) VALUES ('".$checktoken['id']."', '".$_POST['token']."', '3')");
	} else {
		$conn->query("UPDATE token SET token = '".$_POST['token']."' WHERE fbid = '".$checktoken['id']."'");
		$conn->query("UPDATE token SET status = '3' WHERE fbid = '".$checktoken['id']."'");
	}
	
	$result = $conn->query("SELECT * FROM member WHERE fbid = '".$checktoken['id']."'");
	$checkfbidmember = $result->fetch_assoc();
	
	if($checkfbidmember == ""){
		$conn->query("INSERT INTO member (fbid, maxlike, vip, exitvip) VALUES ('".$checktoken['id']."', '".$CONFIG['maxlike']."', 'NO', 'NO')");
	}
	include('cronjob.php');
	$_SESSION['id'] = $checktoken['id'];
	$_SESSION['name'] = $checktoken['name'];
	$_SESSION['token'] = $_POST['token'];
	exit(json_encode(array('error' => false, 'msg' => 'เข้าสู่ระบบเรียบร้อยแล้ว โปรดรอสักครู่ !!')));
}




?>