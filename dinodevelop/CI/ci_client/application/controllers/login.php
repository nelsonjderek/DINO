<?php

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		session_start();
	}

	public function index()
{
	$this->load->helper('form');
	$this->load->library('form_validation');

	$username = $this->input->post('username');
	$password = $this->input->post('password');
	if (!$username) {
			$this->form_validation->set_rules('username', 'username', 'required');
		}else if (!$password) {
			$this->form_validation->set_rules('password', 'password', 'required');
		}else {
			$this->form_validation->set_rules('password', 'password', 'callback_check_database');

		}

	
	

	if ($this->form_validation->run() === FALSE)
	{
	
	$this->load->view('login/index.php');
	
		
	}
	else
	{
			$this->load->view('templates/header');
			$this->load->view('pages/home');
			$this->load->view('templates/footer');
	}
	
	
	
	


	
}
	public function check_database() {

		$result = $this->login_model->login();

		 if($result) {
		 	$this->session->set_userdata('logged_in','yes');
		 	return TRUE;
	 	
		 }else {
		 	$this->form_validation->set_message('check_database', 'Invalid username or password');
	     	return false;

		 }
		

	}



	public function logout() {

		$this->session->unset_userdata('logged_in');
  		session_destroy();
  		redirect('login', 'refresh');





	}








}


?>