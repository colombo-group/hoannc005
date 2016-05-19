<h1>Bài 4: Vẽ tam giác </h1>
<form action = "" method = "post">
	<input type = "text" name = "number">
	<input type = "submit" name = "draw" value = "Vẽ tam giác">
</form>
<?php 
header('Content-Type: text/html; charset=utf-8');
if(isset($_POST['draw'])){
	$number = $_POST['number'];
	if(is_numeric($number) && (int)$number == floatval($number)){
		for ($i = 1; $i <= $number; $i++){
			for($j = $i; $j > 0; $j--){
				$k =  $j % 10;
				echo $k . ' ';
			}
		echo '<br>';
		}
	}else{
		echo '<label style = "color: red" >Bạn đã nhập vào là ký tự không đúng ! Vui lòng nhập lại ! </label>';
	}
}
?>