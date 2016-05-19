<h1>Bài 7: Lịch</h1>
<?php 
header('Content-Type: text/html; charset=utf-8');
function display(){
	$monthDays = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	$thisday= date("w");
	$thisMonth=date("n");
	$thisMonthName = date("M");
	$thisDate= date("d");
	$thisYear=date("Y");
	echo "<table border= 1 >";
	echo '<tr><td colspan="7"><center><strong>'.$thisMonthName.' '.$thisYear.'</strong></center></td></tr>';
	echo "<tr><td>Su</td><td>M</td><td>Tu</td><td>W</td><td>Th</td><td>F</td><td>Sa</td></tr>";
	$notDate=$thisDate;
	while ($notDate > 7) {
		$notDate-=7;
	}	
	$notDate = $thisday - $notDate + 1;
	if ($notDate < 0) {
		$notDate+=7;
	}
	echo '<tr>';
	for ($s = 0; $s < $notDate; $s++) { 
		echo "<td>&nbsp</td>"; 
	}
	$date=1;
	while ($date <= $monthDays[$thisMonth - 1])
	{
		for ($i = $notDate;$i<7;$i++)
		{
			if ($date <= $monthDays[$thisMonth]){
				if($date == $thisDate){
					echo '<td style = "color:red;"><b>' . $date . '</b></td>';	
				}else{
					echo '<td>' . $date . '</td>';
				}	
			} 	
			else{
				echo "&nbsp";	
			} 
			$date++;
		}
		echo "</tr>";
		$notDate=0;
	}
	echo '</table>';
}	
display();
?>