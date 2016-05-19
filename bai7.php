<h1>Bài 7: Lịch</h1>
<?php 
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
/*
function display(){
		var thisday=todayDate.getDay();
		var thisMonth=todayDate.getMonth();
		var thisDate=todayDate.getDate();
		var thisYear=todayDate.getFullYear();
		var notDate=thisDate;
		var first_date = new Date(thisYear, thisMonth, 1);
		var first_day = first_date.getDay();
		var now = new Date();
		var nowDate = now.getDate();
		var nowMounth = now.getMonth();
		var nowYear = now.getFullYear();
		var html = "";
		title = monthnames[thisMonth] + ' ' + thisYear;
		document.getElementById('title').innerHTML = title;
		html += "<table>";
		html += '<tr><td><b>Su</b></td><td><b>M</b></td><td><b>Tu</b></td><td><b>W</b></td><td><b>Th</b></td><td><b>F</b></td><td><b>Sa</b></td></tr>';
		html += "<tr>";
		for (s = 0; s < first_day; s++) { 
			html +="<td>&nbsp</td>"; 
		}
		date=1;
		while (date <= monthDays[thisMonth])
		{
			for (i = first_day;i<7;i++)
			{
				if (date <= monthDays[thisMonth]){
					if(nowDate == date && nowMounth == thisMonth && nowYear == thisYear){
						html +='<td id = "nowDate"><b>' + date + '</b></td>';	
					}else{
						html +='<td class = "date">' + date + '</td>';
					}	
				} 	
				else{
					html +="&nbsp";	
				} 
				date++;
			}
			html +="</tr>";
			first_day=0;
		}
		html +="</table></p>";
		document.getElementById('show').innerHTML = html;
	}
*/

?>