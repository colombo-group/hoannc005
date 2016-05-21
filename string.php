<?php 
header('Content-Type: text/html; charset=utf-8');
$paragraph = isset($_POST['paragraph']) ? $_POST['paragraph'] : "";
$characters = isset($_POST['characters']) ? $_POST['characters'] : "";
?>
<h1>Bài bonus 2</h1>
<form action = "" method = "post">
	Đoạn văn bản: <br>
	<textarea name = "paragraph" rows="10" cols="100"><?php echo $paragraph;?></textarea>
	<br>Ký tự tìm kiếm: <input type = "text" name = "characters" value = "<?php echo $characters;?>">
	<input type = "submit" value = "Phân tích" name = "submit">
</form>
<?php 
if(isset($_POST["submit"])){
	if(!empty($paragraph) && !empty($characters)){
		$vietnamese = "ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼẾỀỂưăạảấầẩẫậắằẳẵặẹẻẽếềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ";
		$pattern_character = "/$characters/";
		$pattern_word = '/[a-zA-Z0-9_'.$vietnamese.']*'.$characters.'[a-zA-Z0-9_'.$vietnamese.']*/';
		$characters_replaced = '<b style="font-size:30px">'.$characters.'</b>';
		preg_match_all($pattern_word, $paragraph, $listWords, PREG_OFFSET_CAPTURE);
		preg_match_all($pattern_character, $paragraph, $matches, PREG_OFFSET_CAPTURE);
		echo '<h3>Đoạn văn bản nhập vào: </h3>';
		echo $paragraph.'<hr>';
		echo 'Số lần xuất hiện của ký tự "'.$characters.'" là: '.sizeof($matches[0]).'<br><hr>';
		echo '<h3>Danh sách các từ chứa ký tự "'.$characters.'" là: </h3>';
		$pattern_word_replaced = array();
		$word_replaced = array();
		for($i = 0; $i < sizeof($listWords[0]); $i++){
			echo $i + 1; 
			echo '- '.$listWords[0][$i][0];
			echo '<br>';
			$pattern_word_replaced[] = '/'.$listWords[0][$i][0].'/';
			$word_replaced[] = '<b style="font-size:30px">'.$listWords[0][$i][0].'</b>';
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