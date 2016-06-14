<?php 
header('Content-Type: text/html; charset=utf-8');
function find($paragraph, $characters){
	$words_finded = array();
	if(!empty($paragraph) && !empty($characters)){
		$vietnamese = "ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúủăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼẾỀỂưăạảấầẩẫậắằẳẵặẹẻẽếềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ";
		$pattern_input = "/[^a-zA-Z0-9_$vietnamese\s]/";
		if(!preg_match($pattern_input, $characters)){
			$pattern_character = "/$characters/";
			$pattern_word = '/[a-zA-Z0-9_'.$vietnamese.']*'.$characters.'[a-zA-Z0-9_'.$vietnamese.']*/';
			$characters_replaced = '<b style="font-size:30px">'.$characters.'</b>';
			preg_match_all($pattern_word, $paragraph, $listWords, PREG_OFFSET_CAPTURE);
			preg_match_all($pattern_character, $paragraph, $matches, PREG_OFFSET_CAPTURE);
			$number = sizeof($matches[0]);
			if($number > 0){
				$pattern_word_replaced = array();
				$word_replaced = array();
				for($i = 0; $i < sizeof($listWords[0]); $i++){
					$words_finded[] = $listWords[0][$i][0];
					$pattern_word_replaced[] = '/'.$listWords[0][$i][0].'/';
					$word_replaced[] = '<b style="font-size:30px">'.$listWords[0][$i][0].'</b>';
				}
				$paragraph_characters = preg_replace($pattern_character,$characters_replaced, $paragraph);
				$paragraph_words = preg_replace($pattern_word_replaced, $word_replaced, $paragraph);
				return array(
					'status' => true,
					'count' => $number,
					'words_finded' => $words_finded,
					'paragraph_characters' => $paragraph_characters,
					'paragraph_words' => $paragraph_words
				);
			}else{
				$error = "Không tìm được kết quả phù hợp";
			}
		}else{
			$error = "Bạn đã nhập ký tự không phù hợp ! Vui lòng nhập lại !";
		}
	}else{
		$error = "Không được để trống ! Vui lòng nhập vào !";
	}
	return array(
		'status' => false,
		'error' => $error
	);
}
$paragraph = isset($_POST['paragraph']) ? $_POST['paragraph'] : "";
$characters = isset($_POST['characters']) ? $_POST['characters'] : "";
if(isset($_POST["submit"])){
	$result = find($paragraph, $characters);
}
?>
<h1>Bài bonus 2</h1>
<form action = "" method = "post">
	Đoạn văn bản: <br>
	<textarea name = "paragraph" rows="10" cols="100"><?php echo $paragraph;?></textarea>
	<br>Ký tự tìm kiếm: <input type = "text" name = "characters" value = "<?php echo $characters;?>">
	<input type = "submit" value = "Phân tích" name = "submit">
</form>
<?php if($result['status'] == true) :?>
<h3>Số lần xuất hiện của ký tự <?php echo $characters ?> là: <?php echo $result['count'] ?></h3><hr>
<h3>Danh sách các từ chứa ký tự <?php echo $characters ?> là: </h3>
<?php
foreach ($result['words_finded'] as $key => $word){
	echo "<p>$key : $word </p>";
}
?>
<hr>
<h3>Đoạn văn bản chứa ký tự <?php echo $characters ?> được bôi đậm: </h3>
<p><?php echo $result['paragraph_characters'] ?></p>
<hr>
<h3>Đoạn văn bản với các từ chứa <?php $characters ?> được bôi đậm :</h3>
<p><?php echo $result['paragraph_words']?></p>
<?php else: ?>
	<p style="color: red"> <?php echo $result['error']?></p>
<?php endif;?>
