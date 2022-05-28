<?PHP
set_time_limit(0);
include("../config.php");
include("conn.php");

$sql = "SELECT * FROM member WHERE exitvip < '".date("Y-m-d H:i:s")."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
		$conn->query("UPDATE member SET maxlike = '".$CONFIG['maxlike']."' WHERE fbid = '".$row['fbid']."'");
		$conn->query("UPDATE member SET vip = 'NO' WHERE fbid = '".$row['fbid']."'");
		$conn->query("UPDATE member SET exitvip = 'NO' WHERE fbid = '".$row['fbid']."'");
		
    }
}
?>