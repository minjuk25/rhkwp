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
unset( $_SESSION['irum'] );
unset( $_SESSION['id'] );
unset( $_SESSION['nicname'] );
unset( $_SESSION['email'] );
unset( $_SESSION['pwd'] );
if(!isset($_SESSION['masterid'])) {
    echo "<script>location.replace('4_master.html');</script>";            
}

else {
    $id = $_SESSION['masterid'];
} 
echo "<center>";
?>
<!--
<div>
  <ul>
  <li><a href="4_manager.php">회원관리</a></li>
  <li><a href="#">상품입고관리</a></li>
  <li><a href="#">상품재고관리</a></li>
  <li><a href="#">거래처관리</a></li>
  </ul>
</div>-->

<button type="button" class="btn" onclick="location.href='4_masterlogout.php'"style="float: right;">
LOGOUT
</button>
<br>

<h2><?php echo $_SESSION['masterid']?>님 반갑습니다.</h2><br>
<div>
  <a href="4_manager.php">회원관리</a><br>
  <a href="5_in.html">메뉴 등록</a><br>
  <a href="5_del.html">메뉴 삭제</a><br>
  <a href="6_in.html">식당 등록</a><br>
  <a href="6_del.html">식당 삭제</a><br>
</div>