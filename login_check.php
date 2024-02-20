<?php 
include 'condb.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['Error'] ="";
$password=hash('sha512',$password );

$sql ="SELECT * FROM tb_member where username='$username' and password ='$password' ";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

if($row > 0){
    $_SESSION["cus_username"]=$row['name'];
    $_SESSION["cus_password"]=$row['password'];
    $_SESSION["cus_userid"]=$row['id'];
    $_SESSION["cus_fristnames"]=$row['fristname'];
    $_SESSION["cus_lastname"]=$row['lastname'];
    //$show=header("location:indexs.php");
    $_SESSION["Error"] ="";
    echo "<script> window.location='show_product.php';</script> ";
}else{
    $_SESSION["Error"] = "<p>Your username or password is inalid</p>";
    $show=header("location:login.php");
}
echo $show;



?>
