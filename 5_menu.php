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
    .cen
    {
      /*color: #73be6c;*/
      font-size: 32px;
    
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
$shopname = $_POST['shopname'];
$connect = mysqli_connect("localhost", "root", "","bab");
//mysqli_select_db($connect,"bab");
//mysql_query('set names euckr');
echo "<center>";
$sqlrec = "select * from menu where shopname like '%$shopname%'";
$info = mysqli_query($connect, $sqlrec);
$cnt = mysqli_num_fields($info);
?>
<div class="cen">
  <?php
echo "$shopname";
?>
</div>
<table>
<tr>
<th>메뉴</th><th>가격</th></tr>

<?php
while ($i = mysqli_fetch_array($info)) {
	echo "<tr>";
	echo "<td>$i[menu] </td>";
	echo "<td>$i[price] </td>";
	echo "</tr>";
}
?>
</table>
<?php
//echo "<table border=1>";
//while ($i = mysqli_fetch_array($info)) {
//	echo "<tr>";
//	echo "<td>메뉴: $i[menu] </td>";
//	echo "<td>가격: $i[price] </td>";
//	//echo "<td>단가: $i[price] </td>";
//	echo "</tr>";
//}
echo "</table>";
mysqli_free_result($info);
mysqli_close($connect);
?>
</body>
</html>