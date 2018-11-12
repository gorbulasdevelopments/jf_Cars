<?php

class showroom_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getAllSales() {
        $strSQL = $this->db->prepare("SELECT DISTINCT sale_price, sale_summary, vehicle_registration, vehicle_make, vehicle_model, vehicle_variant, vehicle_engine_size, vehicle_doors, vehicle_colour, vehicle_year, vehicle_mileage, vehicle_fuel, vehicle_transmission, vehicle_mpg, vehicle_road_tax, vehicle_insurance_group, vehicle_extras, (SELECT vehicle_image_url FROM vehicle_image_table WHERE vehicle_cover_image = 1 and vehicle_id = vt.vehicle_id) as vehicle_image, (SELECT COUNT(vehicle_image_id) FROM vehicle_image_table WHERE vehicle_id = vt.vehicle_id ) as vehicle_image_count, st.sale_add_date FROM sale_table st join (vehicle_table vt left join vehicle_image_table vit on vt.vehicle_id = vit.vehicle_id) on st.vehicle_id = vt.vehicle_id  WHERE st.sale_complete_date IS NULL ORDER BY st.sale_add_date DESC");
		$strSQL->execute();
        return $strSQL->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function getAllImages() {
        $strSQL = $this->db->prepare("SELECT vt.vehicle_registration, vt.vehicle_make, vt.vehicle_model, vit.vehicle_image_url, vit.vehicle_image_priority, vehicle_cover_image from (vehicle_table vt join sale_table st on st.vehicle_id = vt.vehicle_id) join vehicle_image_table vit on vt.vehicle_id = vit.vehicle_id WHERE vit.vehicle_cover_image = true AND st.sale_complete_date IS NULL;");
        $strSQL->execute();
        return $strSQL->fetchAll();
    }
	
	public function getMake($vehicleMake) {
		$strSQL = $this->db->prepare("SELECT * from sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id where st.sale_complete_date is null and vehicle_make = '" . strtoupper($vehicleMake) . "';");
        $strSQL->execute();
        return $strSQL->fetchAll();
	}
	
	public function getModel($vehicleMake, $vehicleModel) {
		$strSQL = $this->db->prepare("SELECT * from sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id where st.sale_complete_date is null and vehicle_make = '" . strtoupper($vehicleMake) . "' and vehicle_model LIKE '%" . strtoupper($vehicleModel) . "%';");
        $strSQL->execute();
        return $strSQL->fetchAll();
	}
   
	public function getRegistration($vehicleMake, $vehicleModel, $vehicleRegistration) {
		$strSQL = $this->db->prepare("SELECT * from sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id where st.sale_complete_date is null and vehicle_make = '" . strtoupper(urldecode($vehicleMake)) . "' and vehicle_model LIKE '%" . strtoupper(urldecode($vehicleModel)) . "%' AND vehicle_registration = '" . strtoupper(urldecode($vehicleRegistration)) . "';");
        $strSQL->execute();
        return $strSQL->fetchAll();
	}
	
	public function search($query = null) {
		if(is_null($query)) {
			$strSQL = $this->db->prepare("SELECT sale_price, sale_summary, vehicle_registration, vehicle_make, vehicle_model, vehicle_variant, vehicle_engine_size, vehicle_doors, vehicle_colour, vehicle_year, vehicle_mileage, vehicle_fuel, vehicle_transmission, vehicle_mpg, vehicle_road_tax, vehicle_insurance_group, vehicle_extras, (SELECT distinct vehicle_image_url FROM vehicle_image_table WHERE vehicle_cover_image = 1 and vehicle_id = vt.vehicle_id limit 1) as vehicle_image, (SELECT distinct COUNT(vehicle_image_id) FROM vehicle_image_table WHERE vehicle_id = vt.vehicle_id limit 1) as vehicle_image_count FROM sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id  WHERE st.sale_complete_date IS NULL ORDER BY st.sale_add_date DESC");
			//$strSQL = $this->db->prepare("SELECT * from sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id where st.sale_complete_date is null");
		} else {
			//$strSQL = $this->db->prepare("SELECT * from sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id where st.sale_complete_date is null AND $query");
			$strSQL = $this->db->prepare("SELECT DISTINCT sale_price, sale_summary, vehicle_registration, vehicle_make, vehicle_model, vehicle_variant, vehicle_engine_size, vehicle_doors, vehicle_colour, vehicle_year, vehicle_mileage, vehicle_fuel, vehicle_transmission, vehicle_mpg, vehicle_road_tax, vehicle_insurance_group, vehicle_extras, (SELECT vehicle_image_url FROM vehicle_image_table WHERE vehicle_cover_image = 1 and vehicle_id = vt.vehicle_id) as vehicle_image, (SELECT COUNT(vehicle_image_id) FROM vehicle_image_table WHERE vehicle_id = vt.vehicle_id ) as vehicle_image_count FROM sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id  WHERE st.sale_complete_date IS NULL AND $query ORDER BY st.sale_add_date DESC");
		}
        $strSQL->execute();
        return $strSQL->fetchAll();
	}
	
	public function getAllMakes() {
		$strSQL = $this->db->prepare("SELECT DISTINCT vehicle_make from sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id where st.sale_complete_date is null;");
        $strSQL->execute();
        return $strSQL->fetchAll();
	}
	
	public function getAllModels($vehicleMake = null) {
		if(is_null($vehicleMake)) {
			$strSQL = $this->db->prepare("SELECT DISTINCT vehicle_model from sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id where st.sale_complete_date is null;");
		} else {
			$strSQL = $this->db->prepare("SELECT DISTINCT vehicle_model from sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id where st.sale_complete_date is null and vehicle_make = '" . $vehicleMake . "';");
		}
		
        $strSQL->execute();
        return $strSQL->fetchAll();
	}
	
	public function getDoors() {
		$strSQL = $this->db->prepare("SELECT DISTINCT vehicle_doors from sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id where st.sale_complete_date is null;");
        $strSQL->execute();
        return $strSQL->fetchAll();
	}

	public function getVehicleImages($vehicleRegistration) {
		$strSQL = $this->db->prepare("SELECT vt.vehicle_registration, vt.vehicle_make, vt.vehicle_model, vit.vehicle_image_url, vit.vehicle_image_priority, vehicle_cover_image from (vehicle_table vt join sale_table st on st.vehicle_id = vt.vehicle_id) join vehicle_image_table vit on vt.vehicle_id = vit.vehicle_id WHERE vt.vehicle_registration = '" . $vehicleRegistration . "' ORDER BY vit.vehicle_cover_image DESC,CASE WHEN vit.vehicle_cover_image THEN vit.vehicle_image_priority  ELSE vit.vehicle_image_priority END ASC;");
        $strSQL->execute();
        return $strSQL->fetchAll();
	}

	public function vehicleEnquiry($data) {
		$vehicleRegistration = $data['vehicleRegistration'];
		$enquiryType = $data['enquiryType'];
		$customerName = $data['customerName'];
		$customerNumber = $data['customerNumber'];
		$customerEmail = $data['customerEmail'];
		$customerMessage = $data['customerMessage'];
		$emailSubject = null;
		switch($enquiryType) {
			case 'viewing':
				$emailSubject = "Viewing Request for $vehicleRegistration";
				$message = "<h2>" . date("d/m/Y") . " Viewing Request</h2> Vehicle: $vehicleRegistration <br />Customer: $customerName <br />Contact Number: $customerNumber </br >Customer Email: $customerEmail<br /> Message: $customerMessage";
				break;
			case 'question':
				$emailSubject = "New question about $vehicleRegistration";
				$message = "<h2>" . date("d/m/Y") . " Customer Question</h2> Vehicle: $vehicleRegistration <br />Customer: $customerName <br />Contact Number: $customerNumber </br >Customer Email: $customerEmail<br /> Message: $customerMessage";
				break;
			case 'testDrive':
				$emailSubject = "Test drive for $vehicleRegistration";
				$message = "<h2>" . date("d/m/Y") . " Test Drive Request</h2> Vehicle: $vehicleRegistration <br />Customer: $customerName <br />Contact Number: $customerNumber </br >Customer Email: $customerEmail<br /> Message: $customerMessage";
				break;
		}

		if(!is_null($emailSubject)) {
			$headers= "MIME-Version: 1.0\r\nContent-Type: text/html;\r\ncharset: utf-8;\r\nFrom: JF Contact Enquiry<sully_2306@gorbulas.co.uk>\r\n";

			if(mail("sully_2306@gorbulas.co.uk", $emailSubject, $message, $headers)) {
				return 1;
			} else {
				return 0;
			}
		}
		
	}
}
 