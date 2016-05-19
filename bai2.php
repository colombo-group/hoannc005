<?php 
header('Content-Type: text/html; charset=utf-8');
$count = 0;
echo '<h1> Bài 2: Vẽ đồ thị</h1>'
	.'<form method = "post" action ="">'
	.'Số trường dữ liệu cần nhập: '
	.'<input text = "text" name = "count" placeholder = "Nhập vào số lượng">'
	.'<input type = "submit" value = "Thêm">'
	.'</form>';
if(isset($_POST['count'])){
	$count = $_POST['count'];	
}
if($count > 0){
	if(is_numeric($count) && (int)$count == floatval($count)){
		echo '<form method = "post" action ="">';
		echo '<h2>Nhập vào giá trị các trường </h2>';
		echo '<table><tr><td>Tên</td><td>Giá trị</td></tr>';
		for($i = 0; $i < $count; $i++){
			echo '<tr><td><input text = "text" name = "name[]" placeholder = "Nhập tên"></td>';
			echo '<td><input text = "text" name = "value[]" placeholder = "Nhập giá trị">%</td></tr>';
		}
		echo '</table>';
		echo '<input type = "submit" value = "Vẽ đồ thị"></form>';
	}else{
		echo '<label style = "color: red">Bạn đã nhập sai ! Vui lòng nhập lại !</label>';
	}	
}

if(isset($_POST['name']) && isset($_POST['value'])){
	$names = $_POST['name'];
	$values = $_POST['value'];
	echo '<h2>Hiển thị đồ thị</h2>';
	echo '<table border = "1">';
	for ($i=0; $i < sizeof($names) ; $i++) {
		if(is_numeric($values[$i]) && floatval($values[$i]) <= 100){
			$row = "";
			$row .= 		'<tr>'
				.			'<td>'.$names[$i].'</td>'	
				.			'<td style = "width:150px">'
				.				'<div style = "width:100px">'
				.					'<div style = "border: solid red; width: '. $values[$i] . '%; float:left; float: left; margin-top:5px; margin-right:3px">'
				.					'</div>'
				.				'</div>'
				.				'<label>'.$values[$i].'%</label>'		
				.			'</td>'
				.		'</tr>';
			echo $row;
		}else{
			echo '<label style = "color: red">Bạn đã nhập sai giá trị của tên: <b>'.$names[$i].'</b> ! Vui lòng nhập lại !</label>';
			break;
		} 
		
	}
	echo '</table>';
}
?>
