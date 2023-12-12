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
 <body>
  <ul>
    <li><a class="active" href="1_start.html">HOME</a></li>
    <li class="dropdown">
      <a href="#" class="dropbtn">식당 리스트</a>
      <div class="dropdown-content" >
      <a href="6_listdis.php">가까운순</a>
      <a href="6_listkind.php">종류순</a>
      </div>
    </li>
    <li><a class="active" href="5_menu.html">식당 조회</a></li>
    <li><a class="active" href="7_index.php">후기</a></li>
    <li><a class="active" href="4_adminmain.php">관리자</a></li>
  </ul>

<?php

$shopname=$_POST["shopname"];
$location=$_POST["location"];
$kind=$_POST["kind"];
$distan=$_POST["distan"];
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"bab");
$inrec="insert into shop values('$shopname','$location','$kind','$distan')";
$info=mysqli_query($connect,$inrec);

if(!$info)
   die("등록실패");
else
   echo "등록성공했습니다.";
mysqli_close($connect);
?>
</body>
</html>