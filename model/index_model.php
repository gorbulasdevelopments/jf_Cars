<?php

class Index_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function getAllSales() {
        $strSQL = $this->db->prepare("SELECT * from sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id where st.sale_complete_date IS NULL;");
        $strSQL->execute();
        return $strSQL->fetchAll();
    }

}
 