<?php
class Vehicle_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public $id="";
    public $brand="";
    public $company="";
    public $type="";
    public $color="";
    public $model="";
    public $gear_box="";
    public $price_day="";
    public $price_hr="";
	public $addmoreprice = "";
    public $milage="";
    public $fuel="";
    public $conditions="";
   // public $doors="";
   // public $max_passanger="";
    public $max_luggage="";
   // public $abs_="";
    //public $air_bags="";
   // public $air_conditions="";
   // public $audio_system="";
  //  public $central_lock="";
  //  public $electric_window="";
  //  public $cruise_control="";
  //  public $power_steering="";
    public $car_image="";
    public $description="";
    public $location="";
    public $sub_loc="";
    public $picture="";
    public $status="";
    public $availability="available";
    public $users_id="";
    


    function update($vehicle)
    {

        $vehicle = (array) $vehicle;
        $this->db->where('id',$vehicle['id']);
        $this->db->update('vehicle', $vehicle);


    }
	
	//insert new vehicle
	function insert($vehicle)

	{

        // echo "<pre>";
        // print_r($vehicle);
        // die;
		$this->db->insert('vehicle', $vehicle);
		 return $this->db->insert_id();
	}

    function updateimage($car_image,$id){

        $sql = "Update vehicle set car_image= '$car_image' where id= $id";
        $result = $this->db->query($sql);

    }

    public function uplaod_car_image($car_image) {


            $config['upload_path'] = 'media/images/cars';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $car_image;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('car_image')) {
                        $this->upload->display_errors('<span>', '</span>');
                        $data['error'] = $this->upload->display_errors();
                    } else {
                        $file_data = $this->upload->data();
                        $data['success'] = "Your file is uploaded";
                    }


    }

    function getvehicles($status){

        // $this->db->select('*');
        // $this->db->from('vehicle');
        $this->db->select('*');
        $this->db->from('vehicle');
        $this->db->where("users_id", $this->session->userdata('id'));
        if($status != ""){
        $this->db->where("status", $status);
        }
        $query = $this->db->get();
        $result = $query->result();
       if(count($result) > 0)
	   {
		   foreach ($result as $row) {
			$return[] = $row; 
		   }
	   }else{
		   $return = array(); 
	   }
       
       return $return;
    }
	function deletevehicles($id)
	{
		$this->db->delete('vehicle', array('id' => $id)); 
	}
	function getavailablevehicles($availability)
	{
		$sql = "select * from vehicle where availability='".$availability."'";
		$results = $this->db->query($sql)->result_array();
		return $results; 
	}

    function get_vehicle_byid($id){

       $this->db->select('*');
        $this->db->from('vehicle');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->result_array();
         if(count($result) > 0)
       {
           foreach ($result as $row) {
            $return[] = $row; 
           }
       }else{
           $return = array(); 
       }
       
       return $return;

    }
	function getall_vehicle_data($id)
	{
		$sql = "select vc.id as vid, vc.*, u.* from vehicle as vc inner join users as u on u.id = vc.users_id where vc.id=".$id;
		$result = $this->db->query($sql)->result_array();
		return $result; 
	}

}