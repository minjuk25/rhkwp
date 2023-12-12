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
div{width:350px;height:28px;margin:30px;padding:5px;font-size:1.2em;}
input{font-size:1.1em}
</style>
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
echo "<center>";
$id=$_GET['id'];
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"bab");
//mysqli_query('set names euckr');
$sqlrec="select * from member where id='$id'";
$info=mysqli_query($connect,$sqlrec);
if(!$info)
    die("쿼리오류!!");
$data=mysqli_fetch_array($info);
?>

<button type="button" class="btn" onclick="location.href='4_masterlogout.php'"style="float: right;">
LOGOUT
</button>
<br>
<form>
<h2> <?=$data['id']?>회원 상세정보</h2>
<div>이름<input type="text" value="<?=$data['irum']?>"></div>
<div>아이디<input type="text" value="<?=$data['id']?>"></div>
<div>별명<input type="text" value="<?=$data['nicname']?>"></div>
<div>이메일<input type="text" value="<?=$data['email']?>"></div>
<div>비밀번호<input type="text" value="<?=$data['pwd']?>"></div>
<!--<div>가입일자<input type="text" value="<?=$data['regdate']?>"></div>-->
</form>
<p><a href="javascript:history.back()">회원현황으로 이동</a>
</body>
</html>