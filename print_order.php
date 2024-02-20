<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="sweetalert2/sweetalert2.js"></script>

</head>
<body>
  
</body>
</html>
<?php 
session_start();
include 'condb.php';
$sql="select * from tb_order where orderID= '" . $_SESSION["order_id"] . "'";
$result = mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);
$total_price=$rs['total_price'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสั่งซื้อ</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="container ">
  <div class="row">
    <div class="col-md-10 ">
    <div class="alert alert-success h4 text-center"   role="alert">
    สั่งซื้อเสร็จสมบรูณ์
    </div>
    </div>
    <br>
    <br>
    <div>
    เลขที่การสั่งซื้อ:<?=$rs['orderID']?><br>
    ชื่อ-นามสกุล (ลูกค้า):<?=$rs['cus_name']?><br>
    ที่อยู่การจัดส่ง:<?=$rs['address']?><br>
    เบอร์โทรศัพท์:<?=$rs['telephone']?> <br>
    </div>
 <div class="card mb-4 mt-4">
<div class="card-body">

    <table class="table table-hover">
  <thead>
    <tr>
      <th >รหัสสินค้า</th>
      <th >ชื่อสินค้า</th>
      <th >ราคา</th>
      <th >จำนวน</th>
      <th >ราคารวม</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql="select * from order_detail d,product p where d.pro_id=p.pro_id and d.orderID=  '" . $_SESSION["order_id"] . "'";
$result1 = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result1)){


?>
    <tr>
      <th><?=$row['pro_id']?></th>
      <td><?=$row['pro_name']?> <img src="img/<?=$row['image']?>" width="150px" height="120px"> </td>
      <td><?=$row['orderPrice']?></td>
      <td><?=$row['orderQty']?></td>
      <td><?=$row['Total']?></td>
      
    </tr>
  </tbody>
<?php
}
?>
</table>
<h6 class="text-end">รวมเป็นเงิน <?=number_format($total_price,2)?>บาท</h6>
</div> 
</div>
<div class="text-danger" >
    ***กรุณาโอนเงินภายใน 7 วัน หลังจากทำการสั่งซื้อ โอนเงินผ่านธนาคาร กรุงไทย ชื่อบัญชี นาย มาเร็ว ไปเร็ว
    ประเภทบัญชีออมทรัพท์ เลขที่บัญชี 9999999999***
</div>
<div class="text-end">
<br>
<a href="show_product.php " class="btn btn-primary mt-6  ">Back</a>
<button onclick="window.print()" href="" class="btn btn-success ">Printer</button>

</div>
</body>
</html>
<script>
  Swal.fire({
  title: "สั่งซื้อสินค้าสำเร็จ",
  text: "กรุณาโอนเงินภายใน(7วัน)",
  icon: "success"
});
</script>
