<?php
function isWords($name){
	settype($name,'integer');
	if ($name == 0){
		echo 'ok';
		return true;
	}else{
		echo 'no';
		return false;
	}
	
}
function isID($ID){
	if (is_numeric($ID) && strlen($ID)==8){
		return true;
	}else{
		return false;
	}
}
function isEmail($email){
	$pattern = '/^[^@]+@[a-zA-Z\._-]+\.[a-zA-Z]+$/';
	if (preg_match($pattern,$email))
	{
		return true;
	}else{
		return false;
	}

}
function isGrade($grade){
	if (strlen($grade) > 3 || strlen($grade) < 1){
		return false;
	}else{
		return true;
	}
}
function write($name,$ID,$email,$chinese,$english,$math,$physics,$chemistry){
	$file = "grade.txt";
	$fileopen = fopen($file,"a+");
	$content = $name.','.$ID.','.$email.','.$chinese.','.$english.','.$math.','.$physics.','.$chemistry."\r\n";
	if ($fileopen == false){
		echo '開檔失敗<br />';
	}else{
		echo '開檔成功<br />';
	}
	$filewrite = fwrite($fileopen,$content);
	if ($filewrite){
		echo '寫入成功<br />';	
	}else{
		echo '寫入失敗<br />';
	}
	$fileclose = fclose($fileopen);
	if ($fileclose){
		echo '關檔成功<br />';
	}else{
		echo '關檔失敗<br />';
	}
}
?>
