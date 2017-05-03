<?php

/**
* Atliekami visi paemimai is duomenu bazes
*/
include "Post.class.php";

class PostRepository 
{
	public $pdo;
	public function __construct()
	{
		// $this->pdo=$pdo;
		$host = 'localhost';
		$db   = 'scotchbox';
		$user = 'root';
		$pass = 'root';
		$charset = 'utf8';
		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$this->pdo = new PDO($dsn, $user, $pass);
	}
	public function getAll() 
	{
		$array = [];
		$query = $this->pdo ->query("SELECT * FROM `posts`");
		$result = $query->fetchAll();  //pasiimam viska is duomenu bazes
		
		
		foreach ($result as $value) {
			$post = new Post();
			$post->id = $value['id'];
			$post->author = $value['author'];
			$post->content = $value['content'];
			$array[]=$post;
			// echo '<pre>';
			// var_dump ($post);
			// echo '</pre>';
		}	
		return $array;	
	}

	public function add($post) 
	{
		
		$query = $this->pdo->prepare("INSERT INTO `posts` SET `author`=:author, `content`=:content");
				$query->execute([
					'author'=> $post->author,
					'content'=> $post->content					
				]);
	}
}
?>