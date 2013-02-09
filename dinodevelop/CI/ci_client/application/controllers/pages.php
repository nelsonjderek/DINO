<?php

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function view($page = 'home')
	{
		$this->login_model->check_user();

				if ( ! file_exists('application/views/pages/'.$page.'.php'))
						{
							// Whoops, we don't have a page for that!
							show_404();
						}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['boo'] = 'hi';
		$data['page'] = $page;
		$data['navigation'] = $this->load->view('templates/navigation',$data,true);
		$data['sub_header'] = $this->load->view('templates/sub-header',$data,true);
		

			$this->load->view('templates/header',$data);

			
			$this->load->view('pages/'.$page,$data);
			$this->load->view('templates/footer', $data);
		
		

	}

public function about() {

			$this->load->view('templates/header');
			$this->load->view('pages/'.$page);
			


}

}