<?PHP
set_time_limit(0);
include("../config.php");
include("conn.php");
session_start();
if($_SESSION['id'] == ""){
	header('Location: /login');
	exit;
}

	if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
		$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
	}else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}

	if($CONFIG['shopid'] == ""){
		exit(json_encode(array('error' => true, 'msg' => 'ปิดระบบเติมเงินโดยผู้ดูแลระบบ')));
	}

	$result = $conn->query("SELECT * FROM tmpay WHERE truemoney = '".$_POST['truemoney']."'");
	$cktrue = $result->num_rows;

	if($cktrue != '0'){
		exit(json_encode(array('error' => true, 'msg' => 'มีบัตรที่ท่านเติมอยู่ในระบบแล้ว')));
	}

	$bantime = date("Y-m-d H:i:s", mktime(date("H")-1,date("i"),date("s"),date("m"),date("d"),date("Y")));

	$result = $conn->query("SELECT * FROM tmpay WHERE ip = '".$ip."' and time > '".$bantime."' and stats != '1'");
	$numban = $result->num_rows;

	if($numban >= '3'){
		exit(json_encode(array('error' => true, 'msg' => 'เติมเงินผิดเยอะเกินไปรอ 1 ชั่วโมงแล้วมาเติมใหม่นะครับ')));
	}

	if(!is_numeric($_POST['truemoney']) or strlen($_POST['truemoney']) != '14'){
		exit(json_encode(array('error' => true, 'msg' => 'รูปแบบรหัสบัตรเงินสดไม่ถูกต้อง')));
	}

	$conn->query("INSERT INTO tmpay (truemoney, fbid, amount, stats, ip, time) VALUES ('".$_POST['truemoney']."', '".$_SESSION['id']."', '0.00', '0', '".$ip."', '".date("Y-m-d H:i:s")."')");


	$url="http://203.146.127.112/tmpay.net/TPG/backend.php?merchant_id=".$CONFIG['shopid']."&password=".$_POST['truemoney']."&resp_url=".$CONFIG['reurl']."";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	$html = curl_exec($ch);
	curl_close($ch);


	for ($x = 0; $x <= 50; $x++) {


		$result = $conn->query("SELECT * FROM tmpay WHERE truemoney = '".$_POST['truemoney']."'");
		$truemoney = $result->fetch_assoc();

		sleep(5);

		if($truemoney['stats'] == '1'){
			exit(json_encode(array('error' => false, 'msg' => 'เติมเงิน VIP สำเร็จจำนวนเงิน '.$truemoney['amount'].' บาท')));
		}

		if($truemoney['stats'] == '2'){
			exit(json_encode(array('error' => true, 'msg' => 'รหัสบัตรเงินสดไม่ถูกต้อง')));
		}

	}

	exit(json_encode(array('error' => false, 'msg' => 'เซิฟเวอร์ tmpay มีปัญหา')));

?>
