<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venders extends CI_Controller {

	public function __construct() {
	parent::__construct();
	   $this->load->database();
	   $this->load->model('Users_model', 'usermodel');
	   $this->load->model('Email_model', 'emailmodel');
	   $this->load->model('Vehicle_model', 'vehiclemodel');
	   date_default_timezone_set('Asia/Karachi');
	}


	public function edit_cars_form(){
		if($this->input->post("addcar_vender") == 1)
		{
			$vehicle = new Vehicle_model(); 
			$vehicle->id =  $this->input->post("id");
			$vehicle->brand = $this->input->post("brand");
			$vehicle->company = $this->input->post("company");
			$vehicle->type = $this->input->post("type");
			$vehicle->color = $this->input->post("color");
			$vehicle->model = $this->input->post("model");
			$vehicle->gear_box = $this->input->post("gear_box");
			$vehicle->price_day = $this->input->post("price_day");
			$vehicle->price_hr = $this->input->post("price_hr");
			$vehicle->addmoreprice = $this->input->post("addmoreprice");
			$vehicle->milage = $this->input->post("milage");
			$vehicle->fuel = $this->input->post("fuel");
			$vehicle->conditions = $this->input->post("conditions");
			$vehicle->location =  $this->input->post("location");
			$vehicle->sub_loc =  $this->input->post("sub_loc");
			$vehicle->car_image = $this->input->post("car_image");;
			$vehicle->description = "";;
			$vehicle->picture = "";
			$vehicle->status = "approved";
			$vehicle->users_id = $this->session->userdata('id');
			
			 $this->vehiclemodel->update($vehicle);
			  $this->vehiclemodel->uplaod_car_image($vehicle->car_image);

			$url = base_url(). "venders/all_cars";
				redirect($url,"refresh"); 
		}
	}
	public function booked_cars()
	{
		$this->load->view('booked-cars-vender');
	}
	public function edit_cars(){

		$id = $_GET['id'];

		$data['data'] = $this->vehiclemodel->get_vehicle_byid($id);

		$this->load->view('edit-car-vender' , $data);
	}
	public function car_details()
	{
		$id = $this->input->get("cid");
		$data['vehicle_details'] = $this->vehiclemodel->getall_vehicle_data($id);
		
	}
	public function add_cars()
	{
		if($this->input->post("addcar_vender") == 1)
		{
			$vehicle = new Vehicle_model(); 
			$vehicle->brand = $this->input->post("brand");
			$vehicle->company = $this->input->post("company");
			$vehicle->type = $this->input->post("type");
			$vehicle->color = $this->input->post("color");
			$vehicle->model = $this->input->post("model");
			$vehicle->gear_box = $this->input->post("gear_box");
			$vehicle->price_day = $this->input->post("price_day");
			$vehicle->price_hr = $this->input->post("price_hr");
			$vehicle->addmoreprice = $this->input->post("addmoreprice");
			$vehicle->milage = $this->input->post("milage");
			$vehicle->fuel = $this->input->post("fuel");
			$vehicle->conditions = $this->input->post("conditions");
			$vehicle->location =  $this->input->post("location");
			$vehicle->sub_loc =  $this->input->post("sub_loc");
			$vehicle->car_image = "";
			$vehicle->description = "";;
			$vehicle->picture = "";
			$vehicle->status = "pending";
			$vehicle->users_id = $this->session->userdata('id');
			$id = $this->vehiclemodel->insert($vehicle);
			if($_FILES['car_image']['error'] != 4){
				$car_image = $id;
			$exten =	explode("/", $_FILES['car_image']['type']);
			    $car_image.= ".";
			    //print_r($_FILES); die;
			    if($exten[1] == "jpeg"){
			    	$exten[1] = "jpg";
			    }
				$car_image.= $exten[1];
			   $this->vehiclemodel->updateimage($car_image,$id); 	
			   $this->vehiclemodel->uplaod_car_image($car_image);
			}
			
			if($id > 0)
			{
				$url = base_url(). "venders/add_cars?add=success&msg=1";
				redirect($url,"refresh"); 
			}else{
				$url = base_url(). "venders/add_cars?add=failed";
				redirect($url,"refresh"); 
			}
		}else{
			$this->load->view('add-car-vender');
		}
	}
	public function all_cars()
	{
		$status = "";
		if(isset($_GET['status'])){
			$status = $_GET['status'];
		}

		$data['vehicle'] = $this->vehiclemodel->getvehicles($status);

		$this->load->view('cars-list-vender',$data);
	}



	public function deletevehicle()
	{
		$id = $this->input->post("deletevehicle");
		$res = $this->vehiclemodel->deletevehicles($id);
		echo $res;
	}
}
