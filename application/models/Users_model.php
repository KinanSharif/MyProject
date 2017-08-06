<?php
class Users_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public $id="";
    public $username="";
    public $email="";
    public $password="";
    public $image="";
    public $description="";
    public $firstname="";
    public $lastname="";
   // public $profession="";
    public $gender="";
    public $phone1="";
    public $phone2="";
    public $birthdate="";
    public $cnic="";
    public $address="";
    public $licsense_status="";
    //public $issue_date="";
    public $expire_date="";
    public $licsense_no="";
    public $full_address="";
    public $account_status=0;
    public $user_role="";
    
	//GET USER DATA 
    function login($user){
		$conditions = array(
					"email" => $user->email, 
					"password" => $user->password,
					"user_role" => $user->user_role,
					"account_status" => 1,
				);
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($conditions);
        $rs= $this->db->get();
        return $rs->result_array();
    }
	//GET USER DATA
	function get_user($id){
		$sql = "SELECT * FROM users where id=".$id;
		$rs = $this->db->query($sql)->result_array();
        return $rs;
    }
	//insert new user
	function insert($user)
	{
		$this->db->insert('users', $user);
		 return $this->db->insert_id();
	}
	//update password
	function update_password($user)
	{
		$data = array(
					"password" => $user->password
				);
		$conditions = array(
				"id" => $user->id
			);
		$res = $this->db->update('users', $data, $conditions);
		return $res; 
	}
    public function upload_user_image($image_name) {


             $config['upload_path'] = 'media/images/users';
                       $config['allowed_types'] = 'jpg|jpeg|png|gif';
                       $config['overwrite'] = TRUE;
                       $config['file_name'] = $image_name;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('image')) {
                        $this->upload->display_errors('<span>', '</span>');
                        $data['error'] = $this->upload->display_errors();
                    } else {
                        $file_data = $this->upload->data();
                        $data['success'] = "Your file is uploaded";
                    }


    }
    public function update_image($id,$image_name){

        $sql = "update users set image = '$image_name' where id = $id ";


        $this->db->query($sql);
     

    }
}