<?php 
include 'condb.php';
$ids=$_GET['id'];

$sql1="SELECT * FROM order_detail WHERE orderID='$ids' ";
$hand=mysqli_query($conn,$sql1);
while($row1=mysqli_fetch_array($hand)){
$proid=$row1['pro_id'];
$num=$row1['orderQty'];
//เพิ่มสต็อกสินค้า
$sql2="UPDATE product set amount=amount + $num WHERE pro_id'$proid' ";
$resuit+mysqli_query($conn,$sql2);
}

//ปรับสถานะใบสั่งฃื้อ
$sql="UPDATE tb_order SET order_status = 0 WHERE orderID='$ids' ";
$resuit+mysqli_query($conn,$sql);
if($resuit){

    echo "<script>window.location='report_order.php'; </script> ";
}else{
    echo "<script>alert('ไม่สามารถลบข้อมูลได้'); </script> ";
}

mysqli_close($conn);

?>