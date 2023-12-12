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
   #header {width:400px;padding:3px;margin-left:30px;text-align:center;}
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
if(!isset($_SESSION['id'])) {
    echo "<script>alert('로그인 하세요.')</script>";       
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
 <h1>가게이름검색</h1>
 
  <form action="7_boardin.php" method="post">
  <div id="header">
     <fieldset>
  <legend>조회할 가게 이름을 입력하세요</legend>
<input type="text" name="shopname">
  <input type="submit" value="검색하기">
  </fieldset>
  </div>
  
   </form>
  
   </body>
</html>
