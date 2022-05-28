<?PHP
include("../config.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
	  <?php echo $CONFIG['stats-in-th']; ?>
      <title>Page not found</title>
      <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
   </head>
   <style>
      body {
      font-family: 'Kanit', sans-serif;
      }
   </style>
   <body>
      </br></br></br></br>
      <div class="row">
         <div class="col-12 col-md-5 container">
            <div class="ui red segment">
               <h2 class="card-title">
                  <center>404 Page not found</center>
               </h2>
               <hr>
               <center>
                  <h4> ไม่พบ Page ที่ท่านร้องขอครับ !! </h4>
               </center>
            </div>
			<h5><center><?php echo $CONFIG['Footer']; ?></center></h5>
				</br>
			<h6><center><?php echo $CONFIG['blanklink']; ?></center></h6>
         </div>
      </div>
   </body>
</html>