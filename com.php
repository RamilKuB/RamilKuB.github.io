<?php include 'condb.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="sweetalert2/sweetalert2.js"></script>
    <link rel="stylesheet" href="new/style.css">

</head>
<body>
    <img src="img/aaaa.gif" width="100%px" height="140px" alt="">

<div class="container">  
<?php include 'menu.php';?> 
<?php include 'menu2.php';?>       


<br><br> 
  <div class="row">
    <?php
$sql ="select * from product where type_id='001'";
$result = mysqli_query($conn,$sql);
   while($row=mysqli_fetch_array($result)){
    $amount1=$row['amount'];
    ?>
<br>
    <div class="col-sm-3">
      <div class="text-center"> 
      <img src="img/<?=$row['image']?>" width="200px" height="180px"> <br>
      ID: <?=$row['pro_id']?> <br>
      <h5 class="text-success"> <?=$row['pro_name']?> </h5> <br>
      ราคา <b class="text-danger" > <?=$row['price']?> บาท</b> <br>
<?php
  if($amount1 <= 0){ ?>
    <a class="btn btn-outline-danger mt-3 disabled" href="#"> สินค้าหมด</a>

<?php }else{?>
  <a class="btn btn-outline-primary mt-3" href="sh_product_detail.php?id=<?=$row['pro_id']?>"> รายละเอียด</a>

  <?php } ?>
     
      
      </div>
    </div>
    <?php
    }    
    mysqli_close($conn);
    ?>

  </div>
</div>



</body>
</html>
<script>Swal.fire({
  title: "สวัสดีครับ",
  text: "ยินดีต้อนรับเข้าสู่เว็บไซต์ครับ",
  imageUrl: "img/ga1.jpg",
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: "Custom image"
});</script>
