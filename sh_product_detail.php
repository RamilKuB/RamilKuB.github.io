<?php include 'condb.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<img src="img/aaaa.gif" width="100%px" height="140px" alt="">

<div class="container">
    <div class="row">
    <?php
$ids=$_GET['id'];
$sql ="SELECT * FROM product, type WHERE product.type_id= type.type_id and  product.pro_id='$ids' " ; 
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
    ?>
    <div class="col-md-4">
        <img src="img/<?=$row['image']?>" width="350px" class="mt-2 p-2 my-2 border" />
    </div>
    <div class="col-md-6">
        ID: <?=$row['pro_id']?> <br>
      <h5 class="text-success"> <?=$row['pro_name']?> </h5> 
      ประเภทสินค้า : <?=$row['type_name']?><br>
      รายละเอียด : <?=$row['detail']?><br>

      ราคา <b class="text-danger" ><?=$row['price']?> บาท</b> <br>
      <a class="btn btn-outline-primary mt-3" href="order.php?id=<?=$row['pro_id']?>"> Add to cart</a>

    </div>
    
    </div>
</div>
<?php
mysqli_close($conn);
?>
</body>
</html>