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
      text-align: center;
    }
    table{
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

  <h1>종류순</h1>
<table>
<tr>
<th>이름</th><th>위치</th><th>종류</th><th>거리</th></tr>
<?PHP 
  $conn = mysqli_connect('localhost', 'root',  '', 'bab');
  if(mysqli_connect_errno()) {
    printf("%s \n", mysqli_connect_error());
    exit;
  }
  echo "<center>";
  $query = "select * from shop order by kind desc"; //desc,asc
  $result = mysqli_query( $conn, $query );
  while( $row = mysqli_fetch_row($result) ) {
    print "<tr><td>" . $row[0] . "</td>" . 
         "<td>" . $row[1] . "</td>" . 
         "<td>" . $row[2] . "</td>" . 
         "<td>" . $row[3] . "</td></tr>";
  }
  print "</table>";
  mysqli_free_result($result);
  mysqli_close($conn);
?>
 </body>
</html>
