<?php 
$page_current = isset ( $_GET["page"] ) ? intval ( $_GET["page"] ) : 1;
if($page_current == 0){
	$page_current = 1;
}
if(isset($_POST['submit'])){
	$a = isset ( $_POST["a"] ) ? $_POST["a"] : 0;
	$b = isset ( $_POST["b"] ) ? $_POST["b"] : 0;
	$c = isset ( $_POST["c"] ) ? $_POST["c"] : 0;
	$page_current = 1;
}else{
	$a = isset ( $_GET["a"] ) ? intval ( $_GET["a"] ) : 0;
	$b = isset ( $_GET["b"] ) ? intval ( $_GET["b"] ) : 0;
	$c = isset ( $_GET["c"] ) ? intval ( $_GET["c"] ) : 0;
}
?>
<h1>Thuật toán phân trang</h1>
<form method = "post" action = "">
	Số a<input type = "text" name = "a" value = "<?php echo $a; ?>"><br>
	Số b<input type = "text" name = "b" value = "<?php echo $b; ?>"><br>
	Số c<input type = "text" name = "c" value = "<?php echo $c; ?>"><br>
	<input type = "submit" value = "Hiển thị" name = "submit">
</form>

<?php
function pagination($a, $b, $value_number_limit, $url, $page_current){
	$multiples = array();
	$i = 1;
	while (1) {
		$number = $i * $b;
		if($number < $a){
			$multiples[] = $number;	
		}else {
			break;
		}
		$i++;
	}
	$total_value = sizeof($multiples);
	if($total_value > 0){
		$value_start = ($page_current - 1) * $value_number_limit;
		$value_finish = $page_current * $value_number_limit;
		if($value_finish > $total_value){
			$value_finish = $total_value;
		}
		echo '<h3>Giá trị trên mỗi trang: </h3>';
		for($j = $value_start; $j < $value_finish; $j++ ){
			echo $multiples[$j];
			echo '<br>';
		}
		echo '<hr>';
		
		$number_page = ceil($total_value / $value_number_limit);
		
		if($number_page > 1){
			$list_page = '<table border = "1"><tr>';
			if($page_current > 1){
				$page = $page_current - 1;
				$list_page .= '<td><a href = "'.$url.'?page='.$page.'&a='.$a.'&b='.$b.'&c='.$value_number_limit.'">'.'Prev</a></td>';
			}
			for($i = 1; $i <= $number_page; $i++){
				if($i == $page_current){
					$list_page .= '<td><b style = "color: red">'.$i.'</b></td>';
				}else{
					$list_page .= '<td><a href = "'.$url.'?page='.$i.'&a='.$a.'&b='.$b.'&c='.$value_number_limit.'">'.$i.'</a></td>';
				}
			}
			if($page_current < $number_page){
				$page = $page_current + 1;
				$list_page .= '<td><a href = "'.$url.'?page='.$page.'&a='.$a.'&b='.$b.'&c='.$value_number_limit.'">'.'Next</a></td>';
			}
			$list_page .= "</tr></table>";
			echo $list_page;
		}	
	}
}

if($a != 0 && $b != 0 && $c != 0 && $page_current > 0){
	if(is_numeric($a) && is_numeric($b) && is_numeric($c)){
		if((int)$a == floatval($a) && (int)$b == floatval($b) && (int)$c == floatval($c)){
			if($a < 100000){
				$url = "paginator.php";
				pagination($a, $b, $c, $url, $page_current);		
			}else{
				echo '<b style = "color: red">Giá trị a quá lớn</b>';
			}
		}else{
			echo '<b style = "color: red">Bạn đã nhập sai giá trị! Vui lòng nhập số nguyên !</b>';
		}
	}else {
		echo '<b style = "color: red">Bạn đã nhập sai giá trị! Vui lòng nhập số nguyên !</b>';
	} 
}
?>