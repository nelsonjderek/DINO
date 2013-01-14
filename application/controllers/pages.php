<?php

class Pages extends CI_Controller {

	

	public function view($page = 'home')
	{
		$this->load->helper('url');
	

				if ( ! file_exists('application/views/pages/'.$page.'.php'))
						{
							// Whoops, we don't have a page for that!
							show_404();
						}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['boo'] = 'hi';
		$data['base_url'] = base_url();

			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer', $data);
		
		

	}



}