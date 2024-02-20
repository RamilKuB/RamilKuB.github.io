<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<div class="container">
  <br><br><br><br><br><br><br>
  <div class="row ">
    <div class="col">
      
      </div>
    <div class="col-md-5 bg-light text-dark ">

      <h5 class="text-center">Login</h5>
    <form method="POST" action="login_check.php">
    <input type="text" name="username" class="form-control" required placeholder="username" ><br>
    <input type="password" name="password" class="form-control" required placeholder="password" ><br>
    <?php
      if(!isset($_SESSION["Error"]))
      {
        session_destroy();
      }  else{
        echo "<div class='text-danger'> ";
        echo$_SESSION["Error"] ;
        echo "</div>";
      }
      
    ?>
<div class="text-center">
<button type="submit" class="btn btn-success" name="submit">Login</button><br>
   <br><a href="register.php">*ถ้ายังไม่ได้สมัครคลิกที่นี่*</a>

</div>

</form>

</div>   
<div class="col">
     
    </div>

  </div>
  </div>


</body>
</html>