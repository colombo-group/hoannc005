<h1>Bài bonus 2</h1>
<form action = "" method = "post">
	Đoạn văn bản: <br>
	<textarea name = "paragraph" rows="10" cols="100"></textarea>
	<br>Ký tự tìm kiếm: <input type = "text" name = "characters">
	<input type = "submit" value = "Phân tích" name = "submit">
</form>
<?php 
if(isset($_POST["submit"])){
	$paragraph = $_POST['paragraph'];
	$characters = $_POST['characters'];
	if(!empty($paragraph) && !empty($characters)){
		$pattern_character = '/'.$characters.'/';
		$pattern_word = '/\w*'.$characters.'\w*/';
		$characters_replaced = '<b>'.$characters.'</b>';
		preg_match_all($pattern_word, $paragraph, $listWords, PREG_OFFSET_CAPTURE);
		echo '<h3>Đoạn văn bản nhập vào: </h3>';
		echo $paragraph.'<hr>';
		preg_match_all($pattern_character, $paragraph, $matches, PREG_OFFSET_CAPTURE);
		echo 'Số lần xuất hiện của ký tự "'.$characters.'" là: '.sizeof($matches[0]).'<br><hr>';
		echo '<h3>Danh sách các từ chứa ký tự "'.$characters.'" là: </h3>';
		$pattern_word_replaced = array();
		$word_replaced = array();
		for($i = 0; $i < sizeof($listWords[0]); $i++){
			echo $i + 1; 
			echo '- '.$listWords[0][$i][0];
			echo '<br>';
			$pattern_word_replaced[] = '/\b'.$listWords[0][$i][0].'\b/';
			$word_replaced[] = '<b>'.$listWords[0][$i][0].'</b>';
		}
		echo '<hr><h3>Đoạn văn bản chứa ký tự "'.$characters.'" được bôi đậm: </h3>';
		echo preg_replace($pattern_character,$characters_replaced, $paragraph);
		echo '<hr>';
		echo '<h3>Đoạn văn bản với các từ chứa ký tự "'.$characters.'" được bôi đậm :</h3>';
		echo preg_replace($pattern_word_replaced, $word_replaced, $paragraph);
	}else{
		echo '<b style = "color: red">Không được để trống ! Vui lòng nhập vào !</b>';
	}	
}
?>