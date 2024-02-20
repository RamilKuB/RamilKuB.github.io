<?php
session_start();
include 'condb.php';



include 'condb.php';
if(!isset($_SESSION["cus_userid"]))
{
    $show=header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</head>
<body>
<img src="img/aaaa.gif" width="100%px" height="140px" alt="">

<?php include 'menu.php';?>  
<br><br>
    <div class="container">
        <form id="form1" method="POST" action="insert_cart.php">
        <div class="row">
            <div class="col-md-10">
<div class="alert alert-primary" role="alert">
    การสั่งซื้อสินค้า
</div>
                <table class="table table-hover"> 
                    <tr>
                        <th>ลำดับที่</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>ราคารวม</th>
                        <th>เพิ่ม - ลด</th>
                        <th>ลบ</th>
                    </tr>
                    
<?php
$Total = 0;
$sumPrice = 0;
$m = 1;
$sumTotal=0;

if(isset($_SESSION["intLine"])){    //เช็คไม่เป็นเป็นค่าว่างมั๊ย ถ้าว่างให้ทำงานใน {}

for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++) {
    if(($_SESSION["strProductID"][$i]) != "" ){
        $sql1="select * from product where pro_id = '" . $_SESSION["strProductID"][$i] ."' " ;
        $result = mysqli_query($conn, $sql1);
        $row_pro = mysqli_fetch_array($result);

        $_SESSION["price"] = $row_pro['price'];
        $Total = $_SESSION["strQty"][$i];
        $sum = $Total * $row_pro['price'];
        $sumPrice = $sumPrice + $sum;
        $_SESSION["sum_price"] = $sumPrice;
        $sumTotal=$sumTotal+$Total;

    
?>                   
            <tr>
                <td><?=$m?></td>
                <td>
                    <img src="img/<?=$row_pro['image']?>" width="80px"height="100px" class="border" alt="">
                    <?=$row_pro['pro_name']?>
                </td>
                <td><?=$row_pro['price']?></td>
                <td><?=$_SESSION["strQty"][$i]?></td>
                <td><?=$sum?></td>
                <td>
                    <a href="order.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-primary">+</a>
                    <?php if($_SESSION["strQty"][$i] > 1){  ?>
                    <a href="order_del.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-primary">-</a>
                    <?php }  ?>
                </td>
                <td><a href="pro_delete.php?Line=<?=$i?>"><img src="img/delete.png" width="30px"  alt=""></a></td>
            </tr>
<?php
$m=$m+1;
}
}
} //end if
?>
<tr>
    <td class="text-end" colspan="4">รวมเป็นเงิน</td>
    <td><?=$sumPrice?></td>
    <td>บาท</td>
</tr>

</table>
<p class="text-end">จำนวนรวมสินค้าที่สั่งซื้อ<?=$sumTotal?>ชิ้น</p>
<div style="text-align:right">
<a href="show_product.php"><button type="button" class="btn btn-outline-success">เลือกสินค้า</button></a>
<button type="submit" class="btn btn-outline-info">ยืนยันการสั่งซื้อ</button>
</div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="alert alert-success" h4 role="alert">
        ข้อมูลสำหรับจัดส่งสินค้า
        </div>
        ชื่อ-นามสกุล:
        <textarea class="form-control mt-2" required  name="cus_name" rows="1"><?=$_SESSION["cus_fristnames"]?> <?=$_SESSION["cus_lastname"]?></textarea>
        <br>
        ที่อยู่จัดส่งสินค้า:
        <textarea class="form-control mt-2" required placeholder="ที่อยู่ ..." name="cus_add" rows="3"></textarea>
        <br>
        เบอร์โทรศัพท์:
        <input type="number" name="cus_tel" class="form-control mt-2" required placeholder="เบอร์โทรศัพท์ ...">
        <br>
        
    </div>
</div>


</form>
</div>

</body>
</html>