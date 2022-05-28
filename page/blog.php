<?PHP
/// ระบบโดย BASDY.NET
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
.style2 {color: #666666}
  .style3 {font-size: 24px}
.style6 {color: #000000}
.style10 {font-size: 9px}
  .style12 {font-size: 9px; color: #66CC66; }
  .style13 {font-size: 18px; }
</style>
  </head>
  <body>
  
	<nav class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
	   <div class="container">
		<a class="navbar-brand"><i class="fa fa-facebook-square" aria-hidden="true"></i> <?php echo $CONFIG['navtitle']; ?></a>
		  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			 <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item"><a class="nav-link" href="/login"><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo $CONFIG['urlhelp']; ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i> วิธีการใช้งาน</a></li>
				<li class="nav-item active"><a class="nav-link" href="/blog"><i class="fa fa-commenting" aria-hidden="true"></i> เว็บบล็อก</a></li>
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
				<h5 style="text-align:center"><i class="fa fa-commenting" aria-hidden="true"></i> เว็บบล็อก</h5>
				<hr>
				<center>
				  <p><strong><span style="color:#ffd966;">﻿
				    </span><span style="color:#FF00FF;">❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤</span><br />
				    <br />
				  </strong><span class="style10">◥◣◥◣◥◣◥◣◥◣◥◣◥◣◥◤◢◤◢◤◢◤◢◤◢◤◢◤</span><br>
				  <strong><span style="color:#0b5394;">ยินดีต้อนรับเข้าสู่ B-LIKE.NET </span></strong><br>
				  <span class="style10">◢◤◢◤◢◤◢◤◢◤◢◤◢◤◢◣◥◣◥◣◥◣◥◣◥◣◥◣</span><br>
		          </p>
				  <p><span style="color:#980000;">เว็บไซต์ :</span> <a href="https://b-like.net/login">https://b-like.net/login</a><br />
			        <span style="color:#980000;">วิธีการใช้งาน :</span> <a href="https://b-like.net/help">https://b-like.net/help</a></strong></p>
				  <p><strong><span class="style12">◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤</span><br />
                  <span class="style13" style="color:#ff7700;">เกี่ยวกับเรา</span><br />
                  <span style="color:#a4c2f4;"><span class="style2">เว็บไซต์ B-LIKE.NET เป็นเพียงสื่อกลางในการแลกไลค์ เท่านั้น ! ไม่มีส่วนเกี่ยวข้องกับทาง FaceBook ดังนั้น เว็บไซต์ของเรา จะไม่ทำให้ Accounts FaceBook ของท่านเสียหาย หรือ มีสแปมไวรัสแต่อย่างใด ทางเว็บเราได้ Block ไม่ให้ทำการ LIKE ที่เข้าค่าย อนาจาร หรือ เนื้อหาความรุนแรง เพื่อให้ Accounts ของท่านดูปลอดภัยและไม่อยู่ในสถานะที่เสี่ยงในการโดน FaceBook Block เพื่อไม่ให้ใช้งาน ดังนั้น เว็บ B-LIKE.NET ของเรา ปลอดภัย! ต่อสมาชิกเว็บแน่นอน ทางทีมงาน เปิดให้บริการฟรี และไม่มีค่าใช้จ่ายแต่อย่างใด หากพบปัญหาการใช้งาน กรุณาติดต่อ แอดมิน ที่หน้าเว็บไซต์ ขอบคุณครับ</span><br />
                              </span></strong></p>
				  <p><strong><span class="style12">◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤</span></strong></p>
				  <p><br />
                    <span style="color:#1155cc;"><strong><span class="style13">ทำไมต้องใช้เว็บไซต์ B-LIKE ?</span><br />
                    </strong></span><span style="color:#3d85c6;"><strong>เว็บไซต์ B-LIKE ของทางเราสามารถปั้มไลค์ใด้เยอะ ครั้งละหนึ่งร้อยไลค์ หรือถ้าเป็น VIP ได้มากถึง ห้าร้อยไลค์กันเลยทีเดียว
				                          </span><br/>
			      </p>
				  <p><strong><span class="style12">◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤</span></strong></p>
				  <p><br />
				    <strong><span class="style13" style="color:#8e7cc3;">ประกาศจากเว็บไซต์</span><br />
			        <span style="color:#b4a7d6;">สมาชิกธรรมดา จะใด้จำนวนไลค์สูงสุด <span style="text-align:center;color:#FF0000"><?php echo $CONFIG['maxlike']; ?> ไลค์ ดีเลย์ <?php echo $CONFIG['delay']; ?> วินาที</span></span><br />
			        <span style="color:#b4a7d6;">สมาชิก VIP จะได้จำนวนไลค์สูงสุด  <span style="text-align:center;color:#FF0000"> <?php echo $CONFIG['vipmaxlike']; ?> ไลค์ ดีเลย์ <?php echo $CONFIG['vipdelay']; ?> วินาที </span></span><br />
			        <span style="color:#b4a7d6;">(&nbsp;อาจมีการเปลี่ยนแปลง )</span></strong><br />
				  </p>
				  <p><strong><span class="style12">◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤</span></strong></p>
				  <p><br />
				    <span style="color:#cc4125;"><strong><span class="style3">คำถามที่พบบ่อย จากผู้ใช้งาน</span><br />
			        </span><span style="color:#dd7e6b;"><span class="style6">ถาม : ทำไมใช้แล้วไลค์ไม่ขึ้น ?</br>
			        ตอบ : ท่านต้องเปิดติดตาม หรือ สาธรณะทั้งหมดก่อน ไปที่ > <a href="https://web.facebook.com/settings?tab=followers" >คลิ๊กที่นี้</a> < </br>
			        ถาม : ช่วยเพิ่มไลค์เพจได้มั้ย ? </br>
			        ตอบ : สามารถเพิ่มไลค์ Post / photo และอื่นๆจากแฟนเพจได้ </br>
			        ถาม : ระบบจะทำงานยังไง ?</br>
			        ตอบ : ระบบของเราเป็นการแลกไลค์ซึ่งกันและกัน ปลอดภัยแน่นอน </br>
			        ถาม : ใช้แล้วจะโดนระงับบัญชีผู้ใช้ไหม ?</br>
			        ตอบ : ไม่โดนแน่นอน เนื่องจากเป็นการแลกไลค์ซึ่งกันและกัน เป็นคนจริงๆ</span><br />
				  </p>
				  <p><strong><span class="style12">◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤</span></strong></p>
				  <p><br />
				    <strong><span class="style3" style="color:#274e13;">วิธีการปั้มไลค์รูปโปรไฟล์</span><br />
			        <span style="color:#ff0000;">กดเข้าไปที่ลิ้ง :&nbsp;<a href="https://www.facebook.com/settings?tab=followers">https://www.facebook.com/settings?tab=followers</a>﻿<br />
			        ใครสามารถกดถูกใจหรือแสดงความคิดเห็นบนรูปประจำตัวของโปรไฟล์สาธารณะและข้อมูลโปรไฟล์อื่นๆ ได้บ้าง<br />
			        </span></strong><span style="color:#ff0000;"><strong>ตรงนี้ปรับเป็นสาธรณะแล้วมาไลค์ใหม่ครับ</strong></span><br />
				  </p>
				  <p><strong><span class="style12">◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤◢ ◣◥ ◤</span></strong></p>
				</center>
			</div>
		  </br>
		 </div>
		 
      </div>
	</div>
  
  
  
  
  
  
	</br>
	<hr>
	<h5><center><?php echo $CONFIG['Footer']; ?></center></h5>
		</br>
	<h6><center><?php echo $CONFIG['blanklink']; ?></center></h6>
	
  </body>
</html>