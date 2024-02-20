<?php include 'condb.php';
$name = $_POST['fristname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];

$password=hash('sha512',$password );

$sql ="INSERT INTO tb_member(fristname,lastname,telephone,username,password) 
VALUE('$name','$lastname','$phone','$username','$password')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>  alert('บันทึกข้อมูลเรียบร้อย');</script>";
    echo "<script>  window.location='login.php';</script>";
}else{
    echo "<script>  alert('บันทึกข้อมูลไม่ได้');</script>";
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
