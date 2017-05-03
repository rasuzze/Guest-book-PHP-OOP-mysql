<!DOCTYPE html>
<html>
<head>
	<title>Guest book PHP</title>
</head>
<body style="text-align: center; margin-top: 20px;">
<form method="post" action="write.php">
<div>
	<label>Author</label>
		<input type="text" name="author" required="">
</div>
<hr>
<div>
	<label>Content</label>
	<textarea name="content" required=""></textarea>
		<!-- <input type="" name="content" required=""> -->
</div>
	<input type="submit" name="submit" value="submit">	
</form>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?> 
<?php
include "PostRepository.class.php";
$res = new PostRepository();
$resu = $res->getAll();
// echo '<pre>';
// var_dump($resu);
// echo '</pre>';

foreach ($resu as $value) :
		echo '<h3>'.$value->author.'</h3><p>'.$value->content.'</p>'; 

endforeach;

?>
</body>
</html>