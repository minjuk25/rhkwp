<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>BAB</title>
  <link rel="stylesheet" href="./css/mystyle.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hahmlet&display=swap" rel="stylesheet">
<style>
</style>
</head>
<?php
   session_start();
   $connect=mysqli_connect("localhost","root","");
   mysqli_select_db($connect,"bab"); //db 연결
      
      //login.php에서 입력받은 id, password
      $id = $_POST['id'];
      $pwd = $_POST['pw'];
      
      $q = "SELECT * FROM manager WHERE id = '$id' AND pwd = '$pwd'";
      $result = mysqli_query($connect, $q);
      $row = mysqli_fetch_array($result);
      
      //결과가 존재하면 세션 생성
      if ($row != null) {
         $_SESSION['masterid'] = $row['id'];
         $_SESSION['masterpwd'] = $row['pwd'];
         echo "<script>location.replace('4_adminmain.php');</script>";
         exit;
      }
      
      //결과가 존재하지 않으면 로그인 실패
      if($row == null){
         echo "<script>alert('아이디나 비밀번호가 존재하지않습니다.')</script>";
         echo "<script>location.replace('4_master.html');</script>";
         exit;
      }
      ?>
