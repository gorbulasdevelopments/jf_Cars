<?php

class vehicle_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
	
	public function getAllVehicles() {
        $strSQL = $this->db->prepare("SELECT *, (SELECT COUNT(*) from vehicle_image_table where vehicle_id = vt.vehicle_id) as vehicle_image_count from vehicle_table vt;");
        $strSQL->execute();
        return $strSQL->fetchAll(PDO::FETCH_ASSOC);
    }


}
 