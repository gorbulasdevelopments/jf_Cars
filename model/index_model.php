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

    public function getLatestSale() {
        $strSQL = $this->db->prepare("SELECT DISTINCT sale_price, sale_summary, vehicle_registration, vehicle_make, vehicle_model, vehicle_variant, vehicle_engine_size, vehicle_doors, vehicle_colour, vehicle_year, vehicle_mileage, vehicle_fuel, vehicle_transmission, vehicle_fuel_combined, vehicle_road_tax, vehicle_insurance_group, vehicle_extras, (SELECT vehicle_image_url FROM vehicle_image_table WHERE vehicle_cover_image = 1 and vehicle_id = vt.vehicle_id) as vehicle_image, (SELECT COUNT(vehicle_image_id) FROM vehicle_image_table WHERE vehicle_id = vt.vehicle_id ) as vehicle_image_count, st.sale_add_date FROM sale_table st join (vehicle_table vt left join vehicle_image_table vit on vt.vehicle_id = vit.vehicle_id) on st.vehicle_id = vt.vehicle_id  WHERE st.sale_complete_date IS NULL ORDER BY st.sale_add_date DESC LIMIT 1");
		$strSQL->execute();
        return $strSQL->fetchAll(PDO::FETCH_ASSOC);
    }

}
 