
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <br>

    <div class="container ">
    <div class="row ">
    <div class="col">
      
      </div>
    <div class="col-md-6  bg-light text-dark">
    

        
      

                <div class="alert alert-success h4 text-center"   role="alert">
                สมัครสมาชิก
                </div>
                
            <form method="POST" action="insert_register.php">
        
            ชื่อ <input type="text" name="fristname" class="form-control" required><br>
            นามสกุล <input type="text" name="lastname" class="form-control" required><br>
            เบอร์โทรศัพท์ <input type="number" name="phone" class="form-control" required><br>
            Username <input type="text" name="username" maxlength="10" class="form-control" required><br>
            Password <input type="password" name="password"  maxlength="10" class="form-control" required><br>
            <div class="text-center"><br>
            <input type="submit" name="submit" value="บันทึก" class=" alert alert-success">
            <input type="reset" name="cancel" value="ยกเลิก" class=" alert alert-danger"> <br>
            <a href="login.php"> สมัครสมาชิกแล้วคลิกที่นี่ </a>


            </div>
    
  

    </form>
    </div>
    <div class="col">
      
      </div>
    </div>
    </div>
    </div>
  
</body>
</html>