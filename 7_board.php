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
<h1>후기</h1>
<button type="button" class="btn" onclick="location.href='7_writein.php'">
            글쓰기
        </button>
<table><tr>
  <th>NO</th><th>제목</th><th>작성자</th><th>작성일</th><th>조회</th>
  </tr>
<?php
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"bab");
//mysqli_query('set names euckr');
//$page=1;
//������ ���� �ڵ�����۾�
if(empty($_GET['page'])){$page=1;}
else
{$page=$_GET['page'];}
$line_page=5;
$block_page=3;
$s1="select * from board";
$result=mysqli_query($connect,$s1);
$totrow=mysqli_num_rows($result);
$totpage=ceil($totrow/$line_page);
$totblock=ceil($totpage/$block_page);
$cblock=ceil($page/$block_page);
$frow=($page-1)*$line_page;
$selrec="select * from board order by no desc limit $frow,$line_page";
$info=mysqli_query($connect,$selrec);
while($rowinfo=mysqli_fetch_array($info))
{
	echo "<tr>";
	echo "<td> $rowinfo[no] </td>";
    echo "<td> <a href='7_detailpost.php?shopname=$rowinfo[shopname]'> $rowinfo[shopname] </a></td>";
	echo "<td> $rowinfo[nicname] </td>";
	echo "<td> $rowinfo[regdate] </td>";
	echo "<td> $rowinfo[hits] </td>";
	echo "</tr>";}
mysqli_close($connect);
?>
</table></body>
<?php
//������ȸ ������ ��� ������ ��ũ �۾� �ڵ� �߰�
$fpage=(($cblock-1)*$block_page)+1;
$lpage=min($totpage,$cblock*$block_page);
if($cblock>1)
{
   $prvblock=($cblock-1)*$block_page;
   echo "<a href='7_board.php?page=$prvblock'>▶이전</a>";
}
for($i=$fpage;$i<=$lpage;$i++)
{
	if($i==$page)
		echo "<b id='ab'>[$i]</b>";
	else
		echo "<a href='7_board.php?page=$i'>[$i]</a>";
}
if($cblock<$totblock)
{
	$nxtblock=($cblock+1)*$block_page;
	echo "<a href='7_board.php?page=$nxtblock'>▶다음</a>";
}
?>
