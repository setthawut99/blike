<?PHP
set_time_limit(0);
include("../config.php");
include("conn.php");
session_start();
if($_SESSION['id'] == ""){
	header('Location: /login');  
	exit;
}

function curl($URL){
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $URL); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);  
		return $output;
}


function antisql($msg) {
   $msg = preg_replace('/[^0-9_]/', '', $msg);
   $msg = urlencode($msg);
   return $msg;
}


	if($_POST['methodlike'] == 'LIKE'){
		$_METHODLIKE = 'LIKE';
	}elseif($_METHODLIKE == ''){
		$_METHODLIKE = 'Null';
	}



	if($_POST['idpost'] == ""){
		exit(json_encode(array('error' => true, 'msg' => 'ท่านยังไม่ใด้ใส่ไอดีโพสครับ')));
	}


	$CheckLikePage = curl('https://graph.facebook.com/'.$_POST['idpost'].'/tagged/?access_token='.$_SESSION['token'].'&limit=1');

	$CheckLikePage = json_decode($CheckLikePage);

	if($CheckLikePage->data != ""){
		exit(json_encode(array('error' => true, 'msg' => 'ไม่สามารถไลค์เพจใด้ครับผม')));
	}



$bigArray = array();
$myurl = array();
$deltoken = array();
$restoken = array();


	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	$starttime = $mtime;


	$result = $conn->query("SELECT * FROM member WHERE fbid = '".$_SESSION['id']."'");
	$checkfbidmember = $result->fetch_assoc();

	$result = $conn->query("SELECT * FROM history WHERE fbid = '".$_SESSION['id']."' ORDER BY history.id DESC LIMIT 1");
	$timeck = $result->fetch_assoc();
	
	if($timeck['timedelay'] > date("Y-m-d H:i:s")){
		exit(json_encode(array('error' => true, 'msg' => 'ท่านจะไลค์ใด้อีกในเวลา '.$timeck['timedelay'].' ครับ !!')));
	}
	
	
	$sql = "SELECT * FROM token WHERE status != '0' ORDER BY RAND() LIMIT ".$checkfbidmember['maxlike']."";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			
				if($_POST['methodlike'] == "LIKE"){
					$bigArray = "https://graph.facebook.com/".$_POST['idpost']."/likes?method=post&access_token=".$row['token']."";
				}
				
				array_push($myurl,$bigArray);
		}
	}
	
	$myurl = array_unique($myurl);
	require("RollingCurl.php");
	$rc = new RollingCurl("request_callback");
	$rc->window_size = 200;
	
	foreach ($myurl as $url) {
		$request = new RollingCurlRequest($url);
		$rc->add($request);
		flush();
	}
	$rc->execute();
	function request_callback($response, $info) {
	global $xlike;
	global $deltoken;
	global $restoken;
	
	
		if($_POST['methodlike'] == "LIKE"){
			if($response == "true"){
				$xlike++;	
				
				$_TOKENRES = str_replace("https://graph.facebook.com/".$_POST['idpost']."/likes?method=post&access_token=", "", $info['url']);
				array_push($restoken,$_TOKENRES);		
			}else{
				
				$_TOKENDEL = str_replace("https://graph.facebook.com/".$_POST['idpost']."/likes?method=post&access_token=", "", $info['url']);

				array_push($deltoken,$_TOKENDEL);
			}
		}
		
		flush();
	}
	
	for ($x = 0; $x <= count($restoken); $x++) {
		$conn->query("UPDATE token SET status = '3' WHERE token = '".$restoken[$x]."'");
	}
	
	if($xlike == ""){
		$xlike = 0;
	}
	
	if($xlike != '0' and $xlike != '1'){
		for ($x = 0; $x <= count($deltoken); $x++) {
			$conn->query("UPDATE token SET status = status-'1' WHERE token = '".$deltoken[$x]."'");
		}
	}
	


	if($checkfbidmember['vip'] == 'NO'){
		$exprice = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s")+$CONFIG['delay'],date("m"),date("d"),date("Y")));
	}
	
	if($checkfbidmember['vip'] == 'YES'){
		$exprice = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s")+$CONFIG['vipdelay'],date("m"),date("d"),date("Y")));
	}
	
	$conn->query("INSERT INTO history (fbid, time, timedelay, likes, METHODLIKE, postid) VALUES ('".$_SESSION['id']."', '".date("Y-m-d H:i:s")."', '".$exprice."', '".$xlike."', '".$_METHODLIKE."', '".antisql($_POST['idpost'])."')");
	
	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	$endtime = $mtime;
	$totaltime = ($endtime - $starttime);
	
	exit(json_encode(array('error' => false, 'msg' => 'ไลค์สำเร็จ '.$xlike.' ไลค์ ใช้เวลา '.$totaltime.' วินาที !!')));

?>