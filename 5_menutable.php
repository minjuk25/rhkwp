<html>
 <head>
<style>
td {background:#94aaee;font-size:1.2em}
</style>
 </head>
<body>
<?php
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"bab");
//mysqli_query('set names euckr');
$sqlrec="select * from menu";
//$sqlrec = "select * from menu where shopname like '%shopname%'";
$info=mysqli_query($connect,$sqlrec);
echo "<table>";
while($i=mysqli_fetch_array($info))
{
	echo "<tr>";
	echo "<td>가게이름: $i[shopname] </td> ";
	echo "<td>메뉴: $i[menu] </td>";
	echo "<td>가격: $i[price] </td>";
	//echo "<td>단가: $i[price] </td>";
	echo "</tr>";
}
echo "</table>";
mysqli_close($connect);
?>
</body>
</html>