<style>
#a1{width:350px;border-bottom:1px dashed #cc9900;height:28px;margin:30px;padding:5px;font-size:1.2em}
#b1{margin-left:30px;font-size:1.2em}
textarea{margin-left:30px;color:#ddaa99;font-size:1.1em}
input{color:#ddaa99;font-size:1.1em}
a{text-decoration:none;font-size:1.3em}
a:hover{color:#ddaa88}
</style>
<?php
$title = $_GET['title'];
$connect = mysql_connect("localhost", "root", "qwe123");
mysql_select_db("sample", $connect);
mysql_query('set names euckr');
$selrec = "select * from board where title='$title'";
$info = mysql_query($selrec, $connect);
if (!$info) {
    die("��ȸ��� �����ϴ�.");
}

$data = mysql_fetch_array($info);
?>
<form>
<div id='a1'>�ۼ���<input type="text" value="<?=$data['irum']?>"></div>
<div id='a1'>������<input type="text" value="<?=$data['title']?>"></div>
<div id='b1'>�� ����</div>
<textarea cols=70 rows=15><?=$data['content']?></textarea>
</form>
<?php
$uprec = "update board set hits=hits+1 where no=$data[no]";
$info2 = mysql_query($uprec, $connect);
mysql_close($connect);
?>
<p><a href="javascript:history.back()">������� �̵�</a></p>
</body></html>
