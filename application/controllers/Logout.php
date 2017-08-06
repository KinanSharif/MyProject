<?php
class Logout extends CI_Controller{
     
        public function __construct() {
        parent::__construct();
		   $this->load->database();
		   date_default_timezone_set('Asia/Karachi');
        }
        public function index(){
            //echo "<h2>Please wait, we are processing on your request. Thanks!</h2>";
			$this->session->sess_destroy();
			$url=	base_url()."login/";
			redirect($url);
        }
}