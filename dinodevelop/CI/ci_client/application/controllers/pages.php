<?php

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('event_model');
	}

	public function view($page = 'home')
	{
		$this->login_model->check_user();


				if ( ! file_exists('application/views/pages/'.$page.'.php'))
						{
							// Whoops, we don't have a page for that!
							show_404();
						}
		
		$events = $this->event_model->get_users('2');
		$events_html = '';
		//var_dump($events);
		$count = 0;
		foreach($events as $user) {
			$events_html .= '<div class="accordion-group">
				    <div class="accordion-heading">
				      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$count.'">
				        '.$user['f_name'].'
				      </a>
				    </div>
				    <div id="collapse'.$count.'" class="accordion-body collapse">
				      <div class="accordion-inner">
				       <ul>';
				       	if (isset($user['events'])) {
							foreach($user['events'] as $usere) {
								$events_html .= '<li>'.$usere[0].'&nbsp;&nbsp;'.$usere[1].'</li>';
							}
						}else {
							$events_html .='<li>User has not logged in.</li>';
						}
						$events_html .= '</ul>
				      </div>
				    </div>
				  </div>';
				  $count++;
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['events'] = $events_html;
		$data['page'] = $page;
		$data['navigation'] = $this->load->view('templates/navigation',$data,true);
		$data['sub_header'] = $this->load->view('templates/sub-header',$data,true);
		

			$this->load->view('templates/header',$data);

			
			$this->load->view('pages/'.$page,$data);
			$this->load->view('templates/footer', $data);
			if ($page != 'home' ) {
				$this->event_model->logevent('Viewed '.$page);
			}
		

	}

public function about() {

			$this->load->view('templates/header');
			$this->load->view('pages/'.$page);
			


}

}