
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
 h1{
    text-align: center;}
 #main{
    width:600px;
    border-radius:5px;
    border:thin solid #000000;
    margin: 0 auto;
}
  label{margin: 5px;padding:10px;
	   color:#73be6c;}
  input{padding:7px;margin-left:10px;}
  textarea{margin-left:10px;}
  select{padding:5px;margin-left:10px;}
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
?>
<button type="button" class="btn" onclick="location.href='7_logout.php'"style="float: right;">
            LOGOUT
        </button>
        <br>
 <h1>식당 후기</h1>
 <form action="7_write.php" method="post">
 <section id="main">
 <br>
 <label>이름</label><input type="hidden" name="name" value="<?=$nicname?>"><?=$nicname?><p>

 <select name="shopname" class="txtbox">
    <option selected> </option>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "bab");
    
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $query = "SELECT shopname FROM shop";
    $stmt = mysqli_prepare($connect, $query);
    
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($connect));
    }
    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    while ($row = mysqli_fetch_array($result)) {
        $nation = $row['shopname'];
    ?>
        <option value="<?= $nation ?>"><?= $nation ?></option>
    <?php
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
    ?>
</select>
<br>
 <label>후기</label><textarea rows=10 cols=74 required name="content"></textarea>
 <input type="submit" value="등록하기"></section>
 </form>
 
 </body>
</html>