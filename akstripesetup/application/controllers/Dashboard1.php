<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
        function __construct(){
        parent::__construct();
		
		$this->load->model('dashboard_model');

    }
	public function index()
	{
		$table="users";
		 $id="1"; 
		 $data['admin']=$this->dashboard_model->fetchdata($table,$id); 
		$this->load->view('dashboard');
	}
        	
	
	 

}
