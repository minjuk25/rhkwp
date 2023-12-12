<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>
   <?php
   session_start();
   $connect=mysqli_connect("localhost","root","");
   mysqli_select_db($connect,"bab"); //db 연결
      
      //login.php에서 입력받은 id, password
      $id = $_POST['id'];
      $pwd = $_POST['pw'];
      
      $q = "SELECT * FROM member WHERE id = '$id' AND pwd = '$pwd'";
      $result = mysqli_query($connect, $q);
      $row = mysqli_fetch_array($result);
      
      //결과가 존재하면 세션 생성
      if ($row != null) {
         $_SESSION['irum'] = $row['irum'];
         $_SESSION['id'] = $row['id'];
         $_SESSION['nicname'] = $row['nicname'];
         $_SESSION['email'] = $row['email'];
         $_SESSION['pwd'] = $row['pwd'];
         echo "<script>location.replace('7_index.php');</script>";
         exit;
      }
      
      //결과가 존재하지 않으면 로그인 실패
      if($row == null){
         echo "<script>alert('아이디나 비밀번호가 존재하지않습니다.')</script>";
         echo "<script>location.replace('7_login.php');</script>";
         exit;
      }
      ?>
   </body>