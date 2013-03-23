<?php

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('event_model');
		
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
			$data['title'] = 'Home';
			$data['navigation'] = $this->load->view('templates/navigation',$data,true);
		$data['sub_header'] = $this->load->view('templates/sub-header',$data,true);
		

			$this->load->view('templates/header',$data);

			
			$this->load->view('pages/home',$data);
			$this->load->view('templates/footer', $data);
	}
	
	
	
	


	
}
	public function check_database() {

		$result = $this->login_model->login();

		 if($result) {
		 	$this->session->set_userdata('logged_in','yes');
		 	$this->session->set_userdata('username',$result['user']);
		 	$this->session->set_userdata('userid',$result['userid']);
		 	$this->session->set_userdata('usernamename',$result['usernamename']);
		 	$this->session->set_userdata('group_id',$result['groupid']);
		 	$this->session->set_userdata('permission',$result['per']);
		 	$this->event_model->logevent('Logged In');
		 	//var_dump($result);
		 	return TRUE;
	 	
		 }else {
		 	$this->form_validation->set_message('check_database', 'Invalid username or password');
	     	return false;

		 }
		

	}



	public function logout() {

		$this->event_model->logevent('Logged Out');
		$this->session->unset_userdata('logged_in');
  		
  		redirect('login', 'refresh');





	}








}


?>