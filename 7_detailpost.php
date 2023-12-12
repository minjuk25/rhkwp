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
#a1{margin: 5px;padding:10px;
	   color:#73be6c;}
#b1{margin: 5px;padding:10px;
	   color:#73be6c;}
textarea{margin-left:10px;}
div a{color:#000000;}
p{
    text-align:center;}
p a{
    text-align:center;
    text-decoration:none;
    color: black;
}
p a:hover{color:#73be6c;}
#main{
    width:600px;
    border-radius:5px;
    border:thin solid #000000;
    margin: 0 auto;
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
$shopname = $_GET['shopname'];
$connect = mysqli_connect("localhost", "root", "");
mysqli_select_db($connect, "bab");
//mysql_query('set names euckr');
$selrec = "select * from board where shopname='$shopname'";
$info = mysqli_query($connect, $selrec);
if (!$info) {
    die("조회결과 없습니다.");
}

$data = mysqli_fetch_array($info);
?>
<p><a href="javascript:history.back()">목록으로 이동</a></p>
<section id="main">
<form>
<div id='a1'>작성자 <a><?=$data['nicname']?></a></div>
<div id='a1'>글제목 <a><?=$data['shopname']?></a></div>
<div id='b1'>글내용</div>
<textarea cols=74 rows=15><?=$data['content']?></textarea>
</form>
<?php
$uprec = "update board set hits=hits+1 where no=$data[no]";
$info2 = mysqli_query($connect, $uprec);
mysqli_close($connect);
?></section>
</body></html>