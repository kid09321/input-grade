<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
include('function.php');
if (isWords($_POST['student']) && isID($_POST['IDnumber']) && isEmail($_POST['email']) && isGrade($_POST['chinese']) && isGrade($_POST['english']) && isGrade($_POST['math']) && isGrade($_POST['physics']) && isGrade($_POST['chemistry'])){
	echo '格式無誤';
	$link_ID = mysql_connect('localhost','root','kid37630');
	mysql_select_db('grade',$link_ID);
	mysql_query('SET CHARACTER SET UTF8;');
	//以上三行為起手式，連接選擇資料庫後設定為UTF8
	mysql_query("INSERT INTO studentgrade (Name,ID,Email,chinese,english,math,physics,chemistry) VALUES ('".$_POST['student']."','".$_POST['IDnumber']."','"
		.$_POST['email']."','".$_POST['chinese']."','".$_POST['english']."','".$_POST['math']."','".$_POST['physics']."','".$_POST['chemistry']."');",$link_ID);

	mysql_close($link_ID);
	echo '資料新增完成!!! ';
}else{
	echo '輸入失敗';
}


?>
</body>
</html>
