<?PHP
set_time_limit(0);
include("../config.php");
include("conn.php");
	
	if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
		$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
	}else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}

	if($ip != "203.146.127.112")
	{
		echo "EXIT FOR IP ".$ip."";
		exit;
	}

if(isset($_GET['vip'])){
	

		$result = $conn->query("SELECT * FROM tmpay WHERE truemoney = '".$_GET['password']."'");
		$truemoney = $result->fetch_assoc();
		
		if($_GET['status'] == '1'){
			$status = '1';
		}
		
		if($_GET['status'] == '3'){
			$status = '2';
		}

		if($_GET['status'] == '4'){
			$status = '2';
		}

		if($_GET['status'] == '5'){
			$status = '2';
		}
		
		
		
		$conn->query("UPDATE tmpay SET amount = '".$_GET['real_amount']."' WHERE truemoney = '".$_GET['password']."'");
		$conn->query("UPDATE tmpay SET stats = '".$status."' WHERE truemoney = '".$_GET['password']."'");
		
		
		if ($_GET['status'] != "1")
		{
			die('SUCCEED|TOPPED_UP_THB_'.$_GET['real_amount'].'');
			exit;
		}
		
		if($_GET['real_amount'] == '50.00'){
			$exitvip = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$CONFIG['daytopup50'],date("Y")));
		}
		
		if($_GET['real_amount'] == '90.00'){
			$exitvip = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$CONFIG['daytopup90'],date("Y")));
		}
		
		if($_GET['real_amount'] == '150.00'){
			$exitvip = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$CONFIG['daytopup150'],date("Y")));
		}
		
		if($_GET['real_amount'] == '300.00'){
			$exitvip = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$CONFIG['daytopup300'],date("Y")));
		}
		
		if($_GET['real_amount'] == '500.00'){
			$exitvip = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$CONFIG['daytopup500'],date("Y")));
		}
		
		if($_GET['real_amount'] == '1000.00'){
			$exitvip = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$CONFIG['daytopup1000'],date("Y")));
		}
		
		
		
		$conn->query("UPDATE member SET maxlike = '".$CONFIG['vipmaxlike']."' WHERE fbid = '".$truemoney['fbid']."'");
		$conn->query("UPDATE member SET vip = 'YES' WHERE fbid = '".$truemoney['fbid']."'");
		$conn->query("UPDATE member SET exitvip = '".$exitvip."' WHERE fbid = '".$truemoney['fbid']."'");
		
		die('SUCCEED|TOPPED_UP_THB_'.$_GET['real_amount'].'');
		exit;
	
}



	
?>