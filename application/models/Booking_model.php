<?php
class Booking_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public $id="";
    public $vehicle="";
    public $date_pickup="";
    public $date_drop="";
    public $time_pickup_from="";
    public $time_pickup_to="";
    public $time_drop_from="";
    public $time_drop_to="";
    public $user="";
    public $vender="";
    public $address_pickup="";
    public $address_drop="";
    public $booking_status="pending";
    
	function insert($booking)
	{
		$this->db->insert('book_vehicle', $booking);
		return $this->db->insert_id();
	}
	//get user booking list
	function bookinglist($user)
	{
		$sql = "SELECT * FROM `book_vehicle` where user=".$user." OR vender=".$user." order by id desc";
		$result = $this->db->query($sql)->result_array(); 
		return $result;
	}
	function searchcar($data)
	{  
		$searchData = $data; 
		$sql = "SELECT * FROM vehicle where status = 'approved' AND location='".$data['loc_pick']."'";
		$vehicles = $this->db->query($sql)->result_array();
		//echo "<pre>"; print_r($vehicles); exit; 
		$getcars = array(); 
		foreach($vehicles as $vehicle)
		{
			$sql = "SELECT * FROM book_vehicle where vehicle=".$vehicle['id']
					." AND booking_status='pending' AND address_pickup='".$data['loc_pick']."' group by vehicle";
			$book_vehicles = $this->db->query($sql)->result_array();
			if(count($book_vehicles) > 0)
			{
				foreach($book_vehicles as $book_vehicle)
				{
					if($book_vehicle['date_pickup'] == $searchData['date_pick'])
					{
						$pick_time = explode(":", $book_vehicle['time_pickup_from']); 
						$drop_time = explode(":", $book_vehicle['time_drop_to']); 
						$pick_hr = (int)$pick_time[0];
						$drop_hr = (int)$drop_time[0];
						
						$selected_pick_time = explode(":", $searchData['time_pick']); 
						$selected_drop_time = explode(":", $searchData['time_drop']); 
						$selected_pick_hr = (int)$selected_pick_time[0];
						$selected_drop_hr = (int)$selected_drop_time[0];
						if($selected_pick_hr != $pick_hr && $selected_pick_hr >= $pick_hr+3)
						{
							$getcars[] = $vehicle;
						}
						/* if($selected_pick_hr > $drop_hr )
						{
							$getcars[] = $vehicle;
						}else{
						
						} */
						
					}else{
						$getcars[] = $vehicle; 
					}
				}
			}else{
				$getcars[] = $vehicle; 
			}
		}
		//echo "<pre>"; print_r($getcars); exit; 
		return $getcars; 
		
	}
	
	function bookdetails($recId)
	{
		$sql = "SELECT  v.brand as company, v.model as model, v.price_day , v.price_hr, v.car_image, u.username, u.phone1 as userphone1, u.phone2 as userphone2, u.licsense_status as status, u.user_role as useruserrole, vender.username as vendername, vender.phone1 as venderphone1, vender.phone2 as venderphone2, vender.user_role as venderrole  FROM `book_vehicle` as bv
				inner join vehicle as v on v.id = bv.vehicle 
				inner join users as u on u.id = bv.user 
                inner join users as vender on vender.id = v.users_id
				where bv.id = ".$recId;
		$results = $this->db->query($sql)->result_array(); 
		return $results; 
	}

}