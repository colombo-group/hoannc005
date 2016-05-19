<h1>Bài 5: Vẽ tam giác </h1>
<form action = "" method = "post">
	<input type = "text" name = "number">
	<input type = "submit" name = "draw" value = "Vẽ tam giác">
</form>
<div style = "text-align: center">
<?php 
if(isset($_POST['draw'])){
	$number = $_POST['number'];
	if(is_numeric($number) && (int)$number == floatval($number)){
		for ($i = 1; $i <= $number; $i ++){
		    for($j = $i; $j > $i/2; $j--){
		    	$x = $j % 10;
		        echo $x . '  ';
		    }
		    for($k = ceil($i/2) + 1; $k <= $i; $k++ ){
		    	$y = $k % 10;
		      	echo $y . '  ';
		    }
		  	echo "<br>";
		}
	}else{
		echo '<label style = "color: red" >Bạn đã nhập vào là ký tự không đúng ! Vui lòng nhập lại ! </label>';
	}
}
?>
</div>