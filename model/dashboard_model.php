<?php

class Dashboard_Model extends Model {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function xhrInsert() {
		
		$text = $_POST['text'];
		
		$strSQL = $this->db->prepare('INSERT INTO data (data) VALUES (:text)');
		$strSQL->execute(array(':text' => $text));
		
		$ret_var = array('data' => $text, 'id' => $this->db->lastInsertId());
		
		echo json_encode($ret_var);
	}
	
	function xhrGetListings() {
		$strSQL = $this->db->prepare('SELECT * from data');
		$strSQL->setFetchMode(PDO::FETCH_ASSOC);
		$strSQL->execute();
		echo json_encode($strSQL->fetchAll());
		
	}
	
	function xhrDeleteListing() {
		
		$id = $_POST['id'];
		$strSQL = $this->db->prepare('DELETE FROM data WHERE id = "' . $id . '"');
		$strSQL->execute();
		echo json_encode($strSQL->fetchAll());
		
	}
}