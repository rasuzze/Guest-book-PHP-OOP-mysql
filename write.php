<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?> 
<?php
echo '<a href="index.php">Back</a>';
$author =$_POST['author'];
$content=$_POST['content'];
require "PostRepository.class.php";
$rep = new PostRepository();

$post = new Post();
$post->author = $author;
$post->content = $content;

$rep->add($post);

header('Location: index.php'); exit();  //redirektinam i index.php
?>