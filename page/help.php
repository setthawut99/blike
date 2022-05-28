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
  </style>
  </head>
  <body>
  
	<nav class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
	   <div class="container">
		<a class="navbar-brand"><i class="fa fa-facebook-square" aria-hidden="true"></i> <?php echo $CONFIG['navtitle']; ?></a>
		  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			 <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item"><a class="nav-link" href="/login"><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a></li>
				<li class="nav-item active"><a class="nav-link" href="<?php echo $CONFIG['urlhelp']; ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i> วิธีการใช้งาน</a></li>
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
				<iframe width="100%" height="500" src="https://www.youtube.com/embed/dk-vFqbavR4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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