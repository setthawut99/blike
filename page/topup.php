<?PHP
/// ระบบโดย BASDY.NET

session_start();
if($_SESSION['id'] == ""){
	header('Location: /login');  
	exit;
}
include('../config.php');
include('../op/conn.php');

$result = $conn->query("SELECT * FROM member WHERE fbid = '".$_SESSION['id']."'");
$member = $result->fetch_assoc();
?>
<!doctype html>
<html lang="en">
  <head>
	<title><?php echo $CONFIG['title']; ?></title>
	
    <meta charset="utf-8">
	<?php echo $CONFIG['stats-in-th']; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?php echo $CONFIG['description']; ?>">
	<meta name="keywords" content="<?php echo $CONFIG['keywords']; ?>">
	<meta name="writtenby" content="BASDY.NET">
	<link rel="shortcut icon" href="<?php echo $CONFIG['titleicon']; ?>"/>
	
	
	<?PHP // CSS ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<?PHP // JAVASCRIPT ?>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="<?php echo $CONFIG['url']; ?>/js/basdy.js"></script>
  
  
  <style>
	body {
	  font-family: 'Kanit', sans-serif;
      background-image: url("<?php echo $CONFIG['background']; ?>");
	  background-repeat: no-repeat;
	  background-position: center center;
  	  background-attachment: fixed;
	  -webkit-background-size: 100% 100%, auto;
	}
  </style>
  </head>
  <body>
  
	<nav class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
	   <div class="container">
		<a class="navbar-brand"><i class="fa fa-facebook-square" aria-hidden="true"></i> <?php echo $CONFIG['navtitle']; ?></a>
		  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			 <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item"><a class="nav-link" href="/like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> ไลค์</a></li>
				<li class="nav-item active"><a class="nav-link" href="/topup"><i class="fa fa-credit-card" aria-hidden="true"></i> เติมเงิน</a></li>
				<li class="nav-item"><a class="nav-link" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> ออกจากระบบ</a></li>
			 </ul>
			 <div class="form-inline">
				<i class="fa fa-cube" aria-hidden="true"></i>&nbsp;สถานะของท่าน :  <?php if($member['vip'] == 'NO'){ echo '<p style="color : red" title="สมาชิกธรรมดา จะใด้จำนวนไลค์สูงสุด '.$CONFIG['maxlike'].' ดีเลย์ '.$CONFIG['delay'].' วินาที">&nbsp;ผู้ใช้งานธรรมดา </p>'; } else {  echo '<p style="color : blue" title="สมาชิกธรรมดา จะใด้จำนวนไลค์สูงสุด '.$CONFIG['vipmaxlike'].' ดีเลย์ '.$CONFIG['vipdelay'].' วินาที">&nbsp;ผู้ใช้งานวีไอพี </p>';  } ?>
			 </div>
		  </div>
	   <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
	   </button>
	   </div>
	</nav>
	</br></br></br></br>

	
	
	
      <div class="row">
			
         <div class="col-12 col-md-7 container">
			<div class="ui green segment">
				<h5 style="text-align:center"><i class="fa fa-credit-card" aria-hidden="true"></i> เติมเงิน วีไอพี</h5>
				<hr>
				<?php if($member['vip'] == 'YES'){ ?>
				<div id="exittimevip"></div>
				<?php } ?>
				<div class="alert alert-danger" style="text-align:center">
				  <strong>คำเตือน !</strong> หากมีวันใช้งานอยู่แล้วห้ามเติมเพิ่มเด็ดขาด เพราะอาจไม่ได้รับวันการใช้งาน
				</div>
				
				<div class="col-12 col-md-4 container">
				<div id="timedelay"></div>
				</div>
				
				<center>
				  <img class="ui medium circular image" style="width: 150px;height: 150px;border: 7px solid #FF9900;" src="https://graph.facebook.com/<?php echo $_SESSION['id']; ?>/picture?type=large" title="<?php echo $_SESSION['name'] ?>"></br>
					      <a href="https://www.facebook.com/<?php echo $_SESSION['id']; ?>" target="_blank"><?php echo $_SESSION['name']; ?></a>
						  </br></br>
						  <div class="row">
						
						    <div class="col-12 col-md-6 container">
								<form id="topup" role="form" action="" method="POST">
								  <div class="ui action input fluid">
									  <input type="text" name="truemoney" placeholder="รหัสบัตรเงินสดทรูมันนี้ 14 หลัก" maxlength="14">
									  <button id="buttonlike" type="submit" class="ui inverted orange button" data-loading-text="<i class='fa fa-spinner fa-spin '></i>&nbsp;&nbsp;รอสักครู่"><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;เติมเงิน</button>
									</div>
								</form>
						     </div>
							 <div class="col-12 col-md-10 container">
							 </br>
							 <hr>
							 <span class="col-12 col-md-6 container"><img src="/img/truemoney.png" width="550" height="210"></span></br><br>
								  <table width="606" class="table table-bordered">
									<thead>
									  <tr>
										<th style="text-align:center" width="32%">จำนวนเงิน</th>
										<th style="text-align:center" width="68%">สิ่งที่ใด้รับ</th>
									  </tr>
									</thead>
									<tbody>
									  <tr>
										<td style="text-align:center">50 TrueMoney</td>
										<td style="text-align:center"><p style="color : #EC7806">จำนวนไลค์ สูงสุด <?php echo $CONFIG['vipmaxlike']; ?> ดีเลย์ <?php echo $CONFIG['vipdelay']; ?> วินาที ใด้รับวันการใช้งาน <?php echo $CONFIG['daytopup50']; ?> วัน</p></td>
									  </tr>
									  <tr>
										<td style="text-align:center">90 TrueMoney</td>
										<td style="text-align:center"><p style="color : #EC7806">จำนวนไลค์ สูงสุด <?php echo $CONFIG['vipmaxlike']; ?> ดีเลย์ <?php echo $CONFIG['vipdelay']; ?> วินาที ใด้รับวันการใช้งาน <?php echo $CONFIG['daytopup90']; ?> วัน</p></td>
									  </tr>
									  <tr>
										<td style="text-align:center">150 TrueMoney</td>
										<td style="text-align:center"><p style="color : #EC7806">จำนวนไลค์ สูงสุด <?php echo $CONFIG['vipmaxlike']; ?> ดีเลย์ <?php echo $CONFIG['vipdelay']; ?> วินาที ใด้รับวันการใช้งาน <?php echo $CONFIG['daytopup150']; ?> วัน</p></td>
									  </tr>
									  <tr>
										<td style="text-align:center">300 TrueMoney</td>
										<td style="text-align:center"><p style="color : #EC7806">จำนวนไลค์ สูงสุด <?php echo $CONFIG['vipmaxlike']; ?> ดีเลย์ <?php echo $CONFIG['vipdelay']; ?> วินาที ใด้รับวันการใช้งาน <?php echo $CONFIG['daytopup300']; ?> วัน</p></td>
									  </tr>
									  <tr>
										<td style="text-align:center">500 TrueMoney</td>
										<td style="text-align:center"><p style="color : #EC7806">จำนวนไลค์ สูงสุด <?php echo $CONFIG['vipmaxlike']; ?> ดีเลย์ <?php echo $CONFIG['vipdelay']; ?> วินาที ใด้รับวันการใช้งาน <?php echo $CONFIG['daytopup500']; ?> วัน</p></td>
									  </tr>
									  <tr>
										<td style="text-align:center">1000 TrueMoney</td>
										<td style="text-align:center"><p style="color : #EC7806">จำนวนไลค์ สูงสุด <?php echo $CONFIG['vipmaxlike']; ?> ดีเลย์ <?php echo $CONFIG['vipdelay']; ?> วินาที ใด้รับวันการใช้งาน <?php echo $CONFIG['daytopup1000']; ?> วัน</p></td>
									  </tr>
									</tbody>
							   </table>
								</br>
								<hr>
								
							 </div>
							 
						  </div>
			  </center>
   		   </div>				 	
			</div>
		 </div>
  
  
  
	</br></br>
	<hr>
	<h5><center><?php echo $CONFIG['Footer']; ?></center></h5>
		</br>
	<h6><center><?php echo $CONFIG['blanklink']; ?></center></h6>
	
  </body>
</html>
<?php if($member['vip'] == 'YES'){ ?>
<script>
function countDown(){
    var timeA = new Date();
    var timeB = new Date("<?php echo $member['exitvip']; ?>");
    var timeDifference = timeB.getTime()-timeA.getTime();    
    if(timeDifference>=0){
        timeDifference=timeDifference/1000;
        timeDifference=Math.floor(timeDifference);
        var wan=Math.floor(timeDifference/86400);
        var l_wan=timeDifference%86400;
        var hour=Math.floor(l_wan/3600);
        var l_hour=l_wan%3600;
        var minute=Math.floor(l_hour/60);
        var second=l_hour%60;
        var showPart=document.getElementById('exittimevip');
        showPart.innerHTML="<div class='alert alert-info' style='text-align:center'> วีไอพีของท่านจะหมดอายุในอีก "+wan+" วัน "+hour+" ชั่วโมง "+minute+" นาที "+second+" วินาที</div>"; 
			if(wan==0 && hour==0 && minute==0 && second==0){
                clearInterval(iCountDown);
				showPart.innerHTML=""; 
            }
    }
}
var iCountDown=setInterval("countDown()",1); 
</script>
<?php } ?>