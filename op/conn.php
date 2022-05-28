<?PHP
date_default_timezone_set("Asia/Bangkok");
include("../config.php");
error_reporting(0);
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Connect Fail</title>
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
                  <center>Connect Fail</center>
               </h2>
               <hr>
               <center>
                  <h4> เชื่อมต่อฐานข้อมูลไม่สำเร็จ </h4>
               </center>
            </div>
            <hr>
            <center>
               <h5><?php echo $CONFIG['Footer']; ?></h5>
            </center>
         </div>
      </div>
   </body>
</html>

<?php
exit;
}
$conn->set_charset("utf8")
?>