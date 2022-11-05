<?php

class ProductsModel extends Database {
	public function __construct(){
        global $db;
        parent::__construct($db);
	}

	public function getItems(){
		return $this->select('products')->results();
	}
	
	public function insertItems( $product_details ){
        $this->insert( 'products' )->values( $product_details );
        return true;
	}

	public function deleteItems($product_id){
		if( $this->delete('products')->where("id = '$product_id'")->num_rows() ){
            return true;
		}
		else{
            return false;
        }
	}

	public function updateItems($data, $id){
		$this->update('products')->values($data)->where("id = $id");;
		return true;
	}

	public function getItemsById($product_id){
		return $this->select('products')->where("id = '$product_id'")->results();
	}

	public function getItemsPrefixes(){
		$query = "SELECT LEFT(product_name, 3) AS prefix FROM products GROUP BY prefix";
		$query = $this->query($query, PDO::FETCH_ASSOC);
		return $query->fetchAll();
	}

	public function findItemsAutoComplete($string_to_find){
		return $this->select('products')->where("product_name LIKE '$string_to_find%' OR product_description LIKE '%$string_to_find%'")->results();
		
	}

}