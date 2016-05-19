<?php
$result = array();
for ($i = 1; $i <= 10; $i++){
	$text = "";
	for ($j = 1; $j <= 10; $j++) {
		$x = $i * $j;
		$text .= '<table><tr><td style="width:50px">' . $i . " x " . $j . "</td><td> = </td><td>" . $x . "</td></tr></table>";
	}
	$result[] = $text;
}
echo '<h1> Bài 1: Bảng cửu chương </h1><table border="1" style="width: 500px;">';
echo '<tr>' ;
echo '<td>'.$result[0].'</td><td>'.$result[1].'</td><td>'.$result[2].'</td><td>'.$result[3].'</td><td>'.$result[4].'</td>'; 
echo '</tr>';
echo '<tr>';
echo '<td>'.$result[5].'</td><td>'.$result[6].'</td><td>'.$result[7].'</td><td>'.$result[8].'</td><td>'.$result[9].'</td>';
echo '</tr></table>';
?>