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
    table{
  border-collapse: collapse;
  line-height: 1.5;
  margin : 20px 10px;
  text-align: center;
    }
td {
  width: 250px;
  padding: 10px;
  vertical-align: top;
  border: 1px solid #ccc;
}
p a{
    color:black;
    text-decoration-line: none;
  }
p a:hover{
  color: #73be6c;
  
}
td a{
    color:black;
    text-decoration-line: none;
  }
td a:hover{
  color: #73be6c;
  
}
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
session_start();
if(!isset($_SESSION['masterid'])) {
    echo "<script>location.replace('4_master.html');</script>";            
}

else {
    $id = $_SESSION['masterid'];
    $pwd = $_SESSION['masterpwd'];
} 
echo "<center>";
?>
  <button type="button" class="btn" onclick="location.href='4_masterlogout.php'"style="float: right;">
LOGOUT
</button>
<br>
<h2>전체 회원 현황</h2>
<table><tr>
<th>아이디</th><th>비밀번호</th><th>자세히</th></tr>
<?php
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"bab");
//mysqli_query('set names euckr');
$sqlrec="select * from member"; //order by regdate desc";
$info=mysqli_query($connect,$sqlrec);
while($rowinfo=mysqli_fetch_array($info))
{
	echo "<tr>";
  echo "<td> $rowinfo[id] </td>";
  echo "<td> $rowinfo[pwd] </td>";
  //echo "<td> $rowinfo[regdate] </td>";
  echo "<td> <a href='4_detail.php?id=$rowinfo[id]'>상세보기</a></td>";
  echo "</tr>";
}
?>

<p><a href="javascript:history.back()">관리창으로 이동</a>
<body>
  </html>