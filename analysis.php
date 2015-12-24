<?php
$link_ID = mysql_connect('localhost','root','kid37630');
mysql_select_db('grade');
mysql_query('SET CHARACTER SET UTF8;');
$number = mysql_query('SELECT * FROM studentgrade');
$numberofstudents = mysql_num_rows($number);

$totalscore = mysql_query("SELECT * ,(chinese +english +math+physics+chemistry) AS total,(chinese +english +math+physics+chemistry)/ 5 AS totalAVG FROM studentgrade ORDER BY total DESC");
$totalAVG = mysql_query("SELECT SUM(chinese)/".$numberofstudents." AS chineseAVG, 
					SUM(english)/".$numberofstudents." AS englishAVG,
					SUM(math)/".$numberofstudents." AS mathAVG,
					SUM(physics)/".$numberofstudents." AS physicsAVG,
					SUM(chemistry)/".$numberofstudents." AS chemistryAVG
					 FROM studentgrade");

mysql_close($link_ID);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>成績統計</title>
	<style type="text/css">
	body{
		width:1000px;
		margin:0 auto;
		font-family:微軟正黑體;
		text-align: center;
	}
	table{
		border:2px solid black;

	}
	td{
		border:1px solid gray;
		padding:5px;
	}
	</style>
</head>
<body>
<table align="center">
<tr><td>姓名</td><td>學號</td><td>E-mail</td><td>國文</td><td>英文</td><td>數學</td><td>物理</td><td>化學</td><td>總分</td><td>平均</td><td>名次</td></tr>
<?php
function pass($arg){
	if ($arg < 60){
		return '<font color="red">'.$arg.'</font>';
	}else{
		return $arg;
	}
}
$classtotalAVG = 0;
$classAVG = 0;
$j = 1;
while ($each = mysql_fetch_row($totalscore)){
	echo '<tr>';
	$classtotalAVG += $each[8];
	$classAVG += $each[9];
	for($i=0;$i < 10;$i++){
		if (is_numeric($each[$i]) && $i != 1){
		echo '<td>'.pass(round($each[$i],2)).'</td>';
	}else{
		echo '<td>'.$each[$i].'</td>';	}
	}
	echo '<td>'.$j.'</td>';
	echo '</tr>';
	$j++;
}
/*
while ($each = mysql_fetch_array($totalscore)){
	echo '<tr><td>'.$each['Name'].'</td>';
	echo '<td>'.$each['ID'].'</td>';
	echo '<td>'.$each['Email'].'</td>';
	echo '<td>'.$each['chinese'].'</td>';
	echo '<td>'.$each['english'].'</td>';
	echo '<td>'.$each['math'].'</td>';
	echo '<td>'.$each['physics'].'</td>';
	echo '<td>'.$each['chemistry'].'</td>';
	echo '<td>'.$each['total'].'</td>';
}
/*
$total = mysql_fetch_array($totalAVG);
echo $total['chineseAVG'];
mysql_close($link_ID);
*/


?>
<tr><td colspan="3">各科平均</td>

<?php

while($eachAVG = mysql_fetch_row($totalAVG)){
	for ($i=0;$i<5;$i++){
		echo '<td>'.pass(round($eachAVG[$i],2)).'</td>';
	}
}
$avgtotal = $classtotalAVG/$numberofstudents;
$avgtotalclass = $classAVG/$numberofstudents;
echo '<td>'.pass(round($avgtotal,2)).'</td>';
echo '<td>'.pass(round($avgtotalclass,2)).'</td>';
	

?>


</tr>	
</table>
</body>
</html>
