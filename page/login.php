<?PHP
/// ระบบโดย BASDY.NET
error_reporting(0);
include('../config.php');
include('../op/conn.php');
session_start();
if($_SESSION['id'] != ""){
	session_destroy();
}
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
  .style1 {color: #000000}
  </style>
  </head>
  <body>
  
	<nav class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
	   <div class="container">
		<a class="navbar-brand"><i class="fa fa-facebook-square" aria-hidden="true"></i> <?php echo $CONFIG['navtitle']; ?></a>
		  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			 <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active"><a class="nav-link" href="/login"><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo $CONFIG['urlhelp']; ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i> วิธีการใช้งาน</a></li>
				<li class="nav-item"><a class="nav-link" href="/blog"><i class="fa fa-commenting" aria-hidden="true"></i> เว็บบล็อก</a></li>
			 </ul>
		  </div>
	   <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
	   </button>
	   </div>
	</nav>
	</br></br></br></br>

	
	
	<div class="container">
      <div class="row">
	  
         <div class="col-12 col-md-11 container">
			<div class="ui raised segment">
			  <h5><marquee> <i class="fa fa-bullhorn"></i> <?php echo $CONFIG['allmsg']; ?> </marquee></h5>
			</div>
			</br>
		 </div>
			
         <div class="col-12 col-md-11 container">
			<div class="ui green segment">
				<h5 style="text-align:center"><i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบปั๊มไลค์</h5>
				<hr>

				 <p style="text-align:center"> 1. กดปุ่ม รับ Token และ"ทำขั้นตอน" </br> 2. ก็อป Token ที่ได้ วางในช่องด้านล่าง </br> 3. กดปุ่ม เข้าสู่ระบบ เพื่อเข้า ใช้งานได้ทันที  </p>
			
					<center>
					<a href="https://linkdi.me/hay5s" target="_blank" class="btn btn-danger btn-md"><i
                                    class="fa fa-youtube-play" aria-hidden="true"></i> วิธีการใช้งาน</a>
                            <!-- <button type="button" class="btn btn-info btn-md" onclick="window.open('GetToken', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="fa fa-facebook" aria-hidden="true"></i> รับ TOKEN เข้าใช้งาน</button> -->
                            <button type="button" class="btn btn-warning btn-md"
                                onclick="window.open('https://www.ball-service.tk/GetToken/', '_blank', 'location=yes,height=700,width=520,scrollbars=yes,status=yes');"><i
                                    class="fa fa-facebook-square" aria-hidden="true"></i> รับ Token แบบ Secret Key
                                2022</button>
					</center>
					</br>
					
					  <div class="row">
					
					    <div class="col-12 col-md-10 container">
							
							<form id="login_like" role="form" action="" method="POST">
							<div class="ui action input fluid">
							  <input type="text" name="token" style="border: 1px #0000FF solid"  id="tokenoutput" placeholder="ตัวอย่าง : EAAAAUsX7TsBAP6JUedN4NbBYJyBCIZANN0sADcbve4EZA . . . ." >
							  <button type="submit" class="ui inverted green button" data-loading-text="<i class='fa fa-spinner fa-spin '></i>&nbsp;&nbsp;รอสักครู่"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;เข้าสู่ระบบ</button>
							</div>
							</form>
					
						 </div>
					  </div>
					  </br>
					  <p style="text-align:center"> ก่อนที่จะปั๊มไลค์คุณต้องเปิดผู้ติดตาม และตั้งโพสต์ที่จะปั๊มไลค์ให้เป็นสาธารณะ <a style="color:red" href="https://www.facebook.com/settings?tab=followers" target="_blank">คลิ๊กที่นี่</a> </br><span style="color:red">โปรดอ่าน!! </span> เว็บนี้เป็นเพียงระบบแลกเปลี่ยนไลค์ซึ่งกันและกัน ไม่ได้มีสแปมหรืออันตรายใดๆ ทั้งสิ้น</p>
		
			</div>
		 </div>
		 
         <div class="col-12 col-md-5 container">
		 </br>
			<div class="ui blue segment"><span style="text-align:center"><i class="fa fa-book" aria-hidden="true"></i> เกี่ยวกับเรา </span>
			  <hr>
			  <span style="text-align:center">เว็บไซต์ MAY-LIKE.COM เป็นเพียงสื่อกลางในการแลกไลค์ เท่านั้น ! ไม่มีส่วนเกี่ยวข้องกับทาง FaceBook ดังนั้น เว็บไซต์ของเรา จะไม่ทำให้ Accounts FaceBook ของท่านเสียหาย หรือ มีสแปมไวรัสแต่อย่างใด ทางเว็บเราได้ Block ไม่ให้ทำการ LIKE ที่เข้าค่าย อนาจาร หรือ เนื้อหาความรุนแรง เพื่อให้ Accounts ของท่านดูปลอดภัยและไม่อยู่ในสถานะที่เสี่ยงในการโดน FaceBook Block เพื่อไม่ให้ใช้งาน ดังนั้น เว็บ MAY-LIKE.COM ของเรา ปลอดภัย! ต่อสมาชิกเว็บแน่นอน ทางทีมงาน เปิดให้บริการฟรี และไม่มีค่าใช้จ่ายแต่อย่างใด หากพบปัญหาการใช้งาน กรุณาติดต่อ แอดมิน ที่หน้าเว็บไซต์ ขอบคุณครับ</span></div>
		 </div>
         <div class="col-12 col-md-5 container">
		 </br>
			<div class="ui blue segment"><span style="text-align:center"><i class="fa fa-bullhorn" aria-hidden="true"></i> คำถามที่พบบ่อย ถาม-ตอบ </span>
			  <hr>
			  <span style="text-align:center;color:#FF0000"><span class="style1">ถาม : ทำไมใช้แล้วไลค์ไม่ขึ้น ?</span><br>
              <span class="style1">ตอบ : ท่านต้องเปิดติดตาม หรือ สาธรณะทั้งหมดก่อน ไปที่</span> > <a href="https://web.facebook.com/settings?tab=followers" >คลิ๊กที่นี้</a> < <br>
              <span class="style1">ถาม : ปั้มไลค์เพจได้มั้ย ? <br>
ตอบ : ไม่สามารถไลค์เพจได้ แต่สามารถปั้มไลค์ สถานะอื่นๆในเพจได้</span><br>
<span class="style1">ถาม : สมาชิกธรรมดา จะใด้จำนวนไลค์สูงสุดเท่าไร</span><br>
<span class="style1">ตอบ : ได้จำนวนทั้งหมด</span> <?php echo $CONFIG['maxlike']; ?> ไลค์ ดีเลย์ <?php echo $CONFIG['delay']; ?> วินาที<br>
<span class="style1">ถาม : VIP จะใด้จำนวนไลค์สูงสุดเท่าไร</span><br>
<span class="style1">ตอบ : VIP จะได้ไลค์สูงสุด</span> <?php echo $CONFIG['vipmaxlike']; ?> ไลค์ ดีเลย์ <?php echo $CONFIG['vipdelay']; ?> วินาที </span><br>
</br>
</div>
		 </div>
		 
		 <?php if($CONFIG['history'] == "1"){ ?>
<?php

function secs_to_h($secs)
{
        $units = array(    
				"ปี"    =>   12*30*24*3600,
				"เดือน"    =>   30*24*3600,
                "วัน"    =>   24*3600,
                "ชั่วโมง"   =>      3600,
                "นาที" =>        60,
                //"วินาที" =>         1,
        );

        if ( $secs == 0 ) return "0 วินาที";

        $s = "";

        foreach ( $units as $name => $divisor ) {
                if ( $quot = intval($secs / $divisor) ) {
                        $s .= "$quot $name";
                        $s .= (abs($quot) > 1 ? "" : "") . " ";
                        $secs -= $quot * $divisor;
                }
        }

        return substr($s, 0, -1);
}

?>
         <div class="col-12 col-md-5 container">
			</br>
			<div class="ui blue segment">
			<h5 style="text-align:center"><i class="fa fa-history" aria-hidden="true"></i> ใช้งาน 10 รายการ ล่าสุด</h5>
			<hr>

<?php

$history = $conn->query("SELECT * FROM history ORDER BY history.id DESC LIMIT 10");
if ($history->num_rows > 0) {
	while($history_row = $history->fetch_assoc()) {
		
		$secs = (strtotime($history_row['time']))-(strtotime(now));
?>		
				<div class="ui comments">
				  <div class="comment">
					<a class="avatar">
					  <img src="<?php echo $CONFIG['url']; ?>/img/history.png">
					</a>
					<div class="content">
					  <a class="author"><?php echo $_CONFIG['namehistory']; ?></a>
					  <div class="metadata">
						<div class="date"><?php if(secs_to_h($secs) != "") { echo "เมื่อ ".str_replace("-","",secs_to_h($secs))." ที่ผ่านมา"; } else { echo 'เมื่อสักครู่'; } ?></div>
					  </div>
					  <div class="text">
						แลกไลค์ได้ทั้งหมด <?php echo $history_row['likes']; ?> ไลค์
					  </div>
					</div>
				  </div>
				</div>
				<hr>
<?php }} ?>
			</div>
		 </div>
		 
		 
         <div class="col-12 col-md-5 container">
			</br>
			<div class="ui blue segment">
			<h5 style="text-align:center"><i class="fa fa-star" aria-hidden="true"></i> ไลค์สูงสุด</h5>
			<hr>

<?php

$history = $conn->query("SELECT * FROM history ORDER BY ABS(likes) DESC LIMIT 10");
if ($history->num_rows > 0) {
	while($history_row = $history->fetch_assoc()) {
		
		$secs = (strtotime($history_row['time']))-(strtotime(now));
?>		
				<div class="ui comments">
				  <div class="comment">
					<a class="avatar">
					  <img src="<?php echo $CONFIG['url']; ?>/img/history.png">
					</a>
					<div class="content">
					  <a class="author"><?php echo $_CONFIG['namehistory']; ?></a>
					  <div class="metadata">
						<div class="date"><?php if(secs_to_h($secs) != "") { echo "เมื่อ ".str_replace("-","",secs_to_h($secs))." ที่ผ่านมา"; } else { echo 'เมื่อสักครู่'; } ?></div>
					  </div>
					  <div class="text">
						แลกไลค์ได้ทั้งหมด <?php echo $history_row['likes']; ?> ไลค์
					  </div>
					</div>
				  </div>
				</div>
				<hr>
<?php }} ?>
			</div>
		 </div>
		 
		 <?php } ?>
      </div>
	</div>
  
  
  
  
  
  
	</br></br>
	<hr>
	<h5><center><?php echo $CONFIG['Footer']; ?></center></h5>
		</br>
	<h6><center><?php echo $CONFIG['blanklink']; ?></center></h6>
	
  </body>
</html>
<script type="text/javascript">
function login(){
var email= $('#email').val();
var password= $('#password').val();
var tokentype= $('#tokentype').val();

$.post("/token",
    {
        email: email,
        password: password,
		tokentype: tokentype,
    },
    function(data, status){
    	document.getElementById('re').innerHTML=data;
    });
}
</script>
<div class="modal fade" id="GETTOKEN" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">รับ Token</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
      <div class="modal-body">
         <div class="ibox-content">
         <span style="color:red;">
            <b>
               <center>ไม่มีการเก็บรหัสผ่านใด ๆ ของคุณไว้ คุณเชื่อมต่อกับ Facebook โดยตรงเพื่อสร้าง Token การเข้าถึง </br> มั่นใจได้ว่าบัญชีของคุณปลอดภัย! 100%</center>
            </b>
         </span>
            </br>
            <label for="email">Email</label>
			<div class="ui input fluid">
               <input type="text" name="email" id="email">
            </div>
            </br>
            <label for="email">รหัสผ่าน Facebook : หรือ [ <a href="https://m.facebook.com/new_sec_settings/app_passwords/" target="_blank">คลิ๊กสร้างรหัสสำหรับปั๊มไลค์</a> ]</label>
            </br>
            <div class="ui input fluid">
               <input type="password" name="password" id="password">
            </div>
            <input type="hidden" name="tokentype" id="tokentype" name="android" value="android" >
            </div>
      </div>
      <div class="modal-footer">
		<button class="ui inverted green button fluid" onClick="login()" type="submit"><i class="fa fa-sign-in"></i> รับ Token</button>
      </div>
	  <div id="re"></div>
    </div>
  </div>
</div>
<?php include('../op/cronjob.php'); ?>