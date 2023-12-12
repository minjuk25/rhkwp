<?php
$nicname=$_POST['nicname'];
$id=$_POST['id'];
$pwd=$_POST['pwd'];
//$shopname=$_POST['shopname'];
$shopname=isset($_POST['shopname'])?$_POST['shopname']:false;
$content=$_POST['content'];
$regdate=date('y-m-d');
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"bab");
//mysql_query('set names euckr');
$inrec="insert into board(nicname,id,pwd,shopname,content,regdate,hits)values('$nicname','$id','$pwd','$shopname','$content','$regdate',0)";
$info=mysqli_query($connect,$inrec);
if(!$info)
    die("글 등록실패");
echo "작성하신 글이 등록되었습니다.<br>";
mysqli_close($connect);
?>
<a href="34_board.php">글목록으로</a>