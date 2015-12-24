<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>hw5-input</title>
</head>
<body>
<form method="POST" action="check_db.php">
	學生姓名：<input type="text" name="student" size="20" maxlength="25" /><br />
	學生學號：<input type="text" name="IDnumber" size="20" maxlength="25" /><br />
	email：<input type="text" name="email" size="20" maxlength="25" /><br />
	國文成績：<input type="text" name="chinese" size="20" maxlength="25" /><br />
	英文成績：<input type="text" name="english" size="20" maxlength="25" /><br />
	數學成績：<input type="text" name="math" size="20" maxlength="25" /><br />
	物理成績：<input type="text" name="physics" size="20" maxlength="25" /><br />
	化學成績：<input type="text" name="chemistry" size="20" maxlength="25" /><br />
	<input type="submit" name="send" value="送出成績" /><br />
</form>
<a href="http://127.0.0.1:8080/analyze.php">查詢成績</a>
</body>
</html>
