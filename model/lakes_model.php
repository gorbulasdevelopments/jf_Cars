<?php

class lakes_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getAllLakes() {
        $strSQL = $this->db->prepare("SELECT lake_id, lake_name, lake_location FROM lake_table ORDER BY lake_name DESC");
        $strSQL->execute();
        return $strSQL->fetchAll();
        
    }
    
    public function viewLake($lakeName) {
        $strSQL = $this->db->prepare("SELECT lake_id, lake_name, lake_location FROM lake_table WHERE lake_name = '$lakeName' ORDER BY lake_name DESC");
        $strSQL->execute();
        
        
        return $strSQL->fetchAll();
    }
    
    public function getSwims($lakeName) {
        $strSQL = $this->db->prepare("SELECT swim_id, swim_number FROM swim_table WHERE lake_id = (SELECT lake_id FROM lake_table WHERE lake_name = '$lakeName') ORDER BY swim_number");
        $strSQL->execute();
        
        
        return $strSQL->fetchAll();
    }
    

}
 