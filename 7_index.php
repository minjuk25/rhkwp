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
  div a{
    color:black;
    text-decoration-line: none;
  }
div a:hover{
  color: #73be6c;
  
}
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
session_start();
unset( $_SESSION['masterid'] );
unset( $_SESSION['masterpwd'] );
if(!isset($_SESSION['id'])) {
    echo "<script>location.replace('7_login.php');</script>";            
}

else {
    $id = $_SESSION['id'];
    $nicname = $_SESSION['nicname'];
} 

echo "<center>";
?>
<button type="button" class="btn" onclick="location.href='7_logout.php'"style="float: right;">
LOGOUT
</button>
<br>
    <div>
        <h2>안녕하세요<?php echo " $nicname 님";?></h2><br>
  <a href="7_board.php">후기 전체보기</a><br><br>
  <a href="7_shop.php">식당이름 검색하여 후기보기</a><br>
        
    </div>
</body>