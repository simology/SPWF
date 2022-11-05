<?php

class ArticlesModel extends Database{
	public function __construct(){
        global $db;
        parent::__construct($db);
	}

	public function findAutoComplete($string_to_find){
		return $this->select('articles')->where("article_code LIKE '$string_to_find%' OR article_description LIKE '%$string_to_find%'")->results();
		
	}		
	public function getPrefixes(){
		$query = "SELECT LEFT(article_code, 3) AS prefix FROM articles GROUP BY prefix";
		$query = $this->query($query, PDO::FETCH_ASSOC);
		return $query->fetchAll();
	}

}