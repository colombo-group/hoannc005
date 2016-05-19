<h1> Bài 6: Máy tính điện tử </h1>
<form action = "" method = "post">
	<input type = "text" name = "value1" placeholder="Giá trị 1">
	<input type = "submit" value = "+" name = "add">
	<input type = "submit" value = "-" name = "sub">
	<input type = "submit" value = "x" name = "multi">
	<input type = "submit" value = "/" name = "divi">
	<input type = "submit" value = "^" name = "pow">
	<input type = "text" name = "value2" placeholder="Giá trị 2">
</form>
<?php 
$result = 0;
if(isset($_POST)){
	$value1 = 0;
	$value2 = 0;
	if(isset($_POST['value1'])){
		$value1 = $_POST['value1'];
	}
	if(isset($_POST['value2'])){
		$value2 = $_POST['value2'];
	}
	if(is_numeric($value1) && is_numeric($value2)){
		if(isset($_POST['add'])){
			$result = $value1 + $value2;
		}
		elseif(isset($_POST['sub'])){
			$result = $value1 - $value2;	
		}
		elseif(isset($_POST['multi'])){
			$result = $value1 * $value2;
		}
		elseif(isset($_POST['divi'])){
			$result = $value1 / $value2;
		}
		elseif(isset($_POST['pow'])){
			$result = pow($value1, $value2);
		}
		echo '<b>Kết quả</b>';
		echo '<input type = "text" readonly value = "'.$result.'" placeholder="Kết quả">';
	}else{
		echo '<label style = "color: red">Bạn đã nhập sai ! Vui lòng nhập lại !</label>';
	}
}
?>