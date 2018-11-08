<?php

class index_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getAllSales() {
        $strSQL = $this->db->prepare("SELECT st.sale_add_date, st.sale_price, sale_author, sale_complete_date, vehicle_registration, vehicle_make, vehicle_model, vehicle_colour from sale_table st join vehicle_table vt on st.vehicle_id = vt.vehicle_id;");
        $strSQL->execute();
        return $strSQL->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function getAllVehicles() {
        $strSQL = $this->db->prepare("SELECT *, (SELECT COUNT(*) from vehicle_image_table where vehicle_id = vt.vehicle_id) as vehicle_image_count from vehicle_table vt;");
        $strSQL->execute();
        return $strSQL->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function getVehicleDetails($vehicleRegistration) {
		$strSQL = $this->db->prepare("SELECT * from vehicle_table where vehicle_registration = '" . $vehicleRegistration . "'");
        $strSQL->execute();
        return $strSQL->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateVehicle() {
        print_r($_POST);


     $query = $this->db->prepare("UPDATE vehicle_table SET  
            vehicle_registration = :vehicleRegistration,
            vehicle_make = :vehicleMake,
            vehicle_model = :vehicleModel,
            vehicle_variant = :vehicleVariant,
            vehicle_engine_size = :vehicleEngineSize,
            vehicle_doors = :vehicleDoors,
            vehicle_colour = :vehicleColour,
            vehicle_year = :vehicleYear,
            vehicle_mileage = :vehicleMileage,
            vehicle_fuel = :vehicleFuel,
            vehicle_transmission = :vehicleTransmission,
            vehicle_mpg = :vehicleMPG,
            vehicle_road_tax = :vehicleRoadTax,
            vehicle_insurance_group = :vehicleInsuranceGroup,
            vehicle_extras = :vehicleExtras
            WHERE vehicle_id = :vehicleID");

        $query->bindParam(":vehicleRegistration", $_POST['vehicleRegistration']);
        $query->bindParam(":vehicleMake", $_POST['vehicleMake']);
        $query->bindParam(":vehicleModel", $_POST['vehicleModel']);
        $query->bindParam(":vehicleVariant", $_POST['vehicleVariant']);
        $query->bindParam(":vehicleEngineSize", $_POST['vehicleEngineSize']);
        $query->bindParam(":vehicleDoors", $_POST['vehicleDoors']);
        $query->bindParam(":vehicleColour", $_POST['vehicleColour']);
        $query->bindParam(":vehicleYear", $_POST['vehicleYear']);
        $query->bindParam(":vehicleMileage", $_POST['vehicleMileage']);
        $query->bindParam(":vehicleFuel", $_POST['vehicleFuel']);
        $query->bindParam(":vehicleTransmission", $_POST['vehicleTransmission']);
        $query->bindParam(":vehicleMPG", $_POST['vehicleMPG']);
        $query->bindParam(":vehicleRoadTax", $_POST['vehicleRoadTax']);
        $query->bindParam(":vehicleInsuranceGroup", $_POST['vehicleInsuranceGroup']);
        $query->bindParam(":vehicleExtras", $_POST['vehicleExtras']);                   
        $query->bindParam(":vehicleID", $_POST['vehicleID']);               

        echo "<pre>";
        //print_r($data);
        echo "</pre>";

		$query->execute();


        if($query->rowCount() > 0) {
            header("location: " . URL . "/admin/vehicles/" . $_POST['vehicleRegistration']);
        };

    }
	
	public function shareVehicle($vehicleRegistration) {
		$query = $this->db->prepare("SELECT vehicle_registration, vehicle_make, vehicle_model, vehicle_variant, vehicle_colour, vehicle_fuel, vehicle_mileage from vehicle_table where vehicle_registration = :vehicleRegistration");
		$query->bindParam(":vehicleRegistration", $vehicleRegistration);
        $query->execute();
		
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		if($query->rowCount() == 1) {
			echo "foo";
			foreach($result as $vehicle) {
				echo "foo";
				define('FACEBOOK_SDK_V4_SRC_DIR', ROOT_DIR . '/lib/facebook/');
				require_once(ROOT_DIR . '/lib/facebook/autoload.php');

				$fb = new Facebook\Facebook([
					'app_id' => '404345163435245',
					'app_secret' => '5f7d800bd6b7723e6125acf7566aa6d8',
					'default_graph_version' => 'v2.2',
				   ]);


				//Post property to Facebook
				$linkData = [
					'link' => 'www.gorbulas.co.uk/projects/jf_cars/showroom/' . $vehicle['vehicle_make'] . '/' . $vehicle['vehicle_model'] . '/' . $vehicle['vehicle_registration'] . '',
					'message' => 'Now in stock: ' . chr(10) . '' . chr(10) . '' . $vehicle['vehicle_make'] . ' ' . $vehicle['vehicle_model'] . ' ' . $vehicle['vehicle_variant'] . '  ' . chr(10) . '' . chr(10) . 'Colour: ' . $vehicle['vehicle_colour'] . '' . chr(10) . '' . chr(10) . 'Fuel Type: ' . $vehicle['vehicle_fuel'] . ' ' . chr(10) . '' . chr(10) . 'Mileage: ' . $vehicle['vehicle_mileage'] . ''
				   ];
				   
				   print_r($linkData);
				   
				   $pageAccessToken ='EAAFvvZCHVTO0BAHaNZA0ipZBRGvNAZB3mX0nlFu4rBeL1kzyldxeEoO8AMZAIIaJdX7sr7GDAYhVsbcHZAz1DbgCULe6PT9QIhlgcSKC2hAmxvV2tSmn3ucBn05SwbZBYEeb75bXmmNEESNxEz2xc8Lsur9KZCYqaSKqulxZAXRnIK8Q7XHgstfVQrWdyAwVZBoqBZAlVESibVZBHQZDZD';
				   
				   try {
					$response = $fb->post('/me/feed', $linkData, $pageAccessToken);
					header("Location: " . URL . "/admin/vehicles");
				   } catch(Facebook\Exceptions\FacebookResponseException $e) {
					echo 'Graph returned an error: '.$e->getMessage();
					exit;
				   } catch(Facebook\Exceptions\FacebookSDKException $e) {
					echo 'Facebook SDK returned an error: '.$e->getMessage();
					exit;
				   }
				   $graphNode = $response->getGraphNode();
			}
		}
        
	}
    
    public function run() {

        echo "<pre>";
        print_r($_POST);
        echo "'" . md5($_POST['password']) . "'";   
        echo "</pre>";

        $query = $this->db->prepare("SELECT user_id from users_table where user_username = :username AND user_password = :password");
		$query->execute(array(
			":username" => $_POST['login'],
			":password" => md5($_POST['password'])
		));
		
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        
        print_r($data);
		
		$count = $query->rowCount();
		if($count > 0) {
			Session::init();
            Session::set('loggedIn', true);
            
            echo Session::get('loggedIn');
			header('location: ' . URL . '/admin');
		} else {
			//header('location: ' . URL . '/admin/login');
		}
    }
}
 