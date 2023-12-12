<?php
include'0_header.php';
$irum=$_POST['irum'];
$id=$_POST['id'];
$nicname=$_POST['nicname'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"bab");
//mysqli_query('set names utf8');
$inrec="insert into member values('$irum','$id','$nicname','$email','$pwd')";
$info=mysqli_query($connect,$inrec);
if(!$info)
    die("회훤가입실패");
echo "회원가입이 완료되었습니다.";
mysqli_close($connect);
?>
<a href="2_login.html">처음으로 이동</a>
</body>
</html>