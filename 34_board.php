<style>
h1{color:#aacc22;}
table{width:600px;border-bottom:1px dashed #808080}
th{background:#ddaa88;font-size:1.2em;padding:3px;}
#data1{height:30px}
a{text-decoration:none;color:#505050}
a:hover{color:#ddaa88}
#ab{color:#ee9988}
</style>
<body>
<h1>woodpia 자유게시판</h1>
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
    echo "<td> <a href='34_detailpost.php?shopname=$rowinfo[shopname]'> $rowinfo[shopname] </a></td>";
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
   echo "<a href='34_board.php?page=$prvblock'>▶이전</a>";
}
for($i=$fpage;$i<=$lpage;$i++)
{
	if($i==$page)
		echo "<b id='ab'>[$i]</b>";
	else
		echo "<a href='34_board.php?page=$i'>[$i]</a>";
}
if($cblock<$totblock)
{
	$nxtblock=($cblock+1)*$block_page;
	echo "<a href='34_board.php?page=$nxtblock'>▶다음</a>";
}
?>

