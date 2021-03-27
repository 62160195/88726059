<?php
include('serverr.php');
$errors = array();
session_start();
$id = $_POST['id'];
if(isset($_POST['save'])){
    
    $date = date('Y-m-d');
    $article = mysqli_real_escape_string($conn,$_POST['article']);
    $detail = mysqli_real_escape_string($conn,$_POST['detail']);


if (empty($article)) {
    array_push($errors,"กรุณากรอกข้อมูลให้ครบถ้วน");
    $_SESSION['Error'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
}
if (empty($detail)) {
    array_push($errors,"กรุณากรอกข้อมูลให้ครบถ้วน");
    $_SESSION['Error'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
}
if(count($errors)>> 1){
    $_SESSION['Error'] = "กรุณากรอกข้อมูลใหม่อีกครั้ง";
}
if(count($errors)==0){
   
    $sql ="UPDATE mynote SET  article= '$article' , detail='$detail'WHERE mynote.id = '$id'";
    mysqli_query($conn,$sql);
    header('location: index.php');

}else{
    header('location: main.php');
}

}else{
    $sql = "DELETE FROM mynote WHERE mynote.id = '$id' ";
    mysqli_query($conn,$sql);
    header('location: index.php');
}

?>



