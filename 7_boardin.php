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
  .st1
  {
    font-size: 32px;
  }
  table{
  width:600px;
  border-collapse: collapse;
  line-height: 1.5;
  margin : 0 auto;
  text-align: center;
    }
td {
  padding: 10px;
  vertical-align: top;
  border: 1px solid #ccc;
}
#data1{height:30px}
a{text-decoration:none;color:#505050}
a:hover{color:#73be6c;}
#ab{color:#73be6c;}
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
  echo "<center>";
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

        <?php
$shopname = $_POST['shopname'];
$connect = mysqli_connect("localhost", "root", "","bab");
echo "<center>";
$sqlrec = "select * from board where shopname like '%$shopname%'";
$info = mysqli_query($connect, $sqlrec);
$cnt = mysqli_num_fields($info);
?>
<div class="st1">
  <br>
  <?php
  echo "검색어: $shopname";
  ?>
  </div>
        <table>
          <tr>
            <td>no</td>
            <td>닉네임</td>
            <td>날짜</td>
            <td>조회수</td>
</tr>

            <?php
while ($i = mysqli_fetch_array($info)) {
	echo "<tr>";
	echo "<td>$i[no] </td> ";
	echo "<td>$i[nicname] </td> ";
	echo "<td>$i[regdate] </td>";
	echo "<td>$i[hits] </td>";
	echo "</tr>";
}
//echo "<tr>";
//	echo "<td>no: $i[no] </td> ";
//	echo "<td>닉네임: $i[nicname] </td> ";
//	echo "<td>가게이름: $i[shopname] </td> ";
//	echo "<td>평가: $i[content] </td>";
//	echo "<td>날짜: $i[regdate] </td>";
//	echo "<td>조회수: $i[hits] </td>";
//	echo "</tr>";

echo "</table>";
mysqli_free_result($info);
mysqli_close($connect);
?>
