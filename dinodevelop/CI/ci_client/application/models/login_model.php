<?php
class Login_model extends CI_Model {

	
	public function login() {

	
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->get_where('LA_user', array('user' => $username, 'pass'=> $password));
		if ($query -> num_rows() == 1) {
			
			$return = array();
			foreach ($query->result() as $row)
			{
			   $return['user'] = $row->user;
			   $return['userid'] = $row->id;
			   $return['usernamename'] = $row->f_name;
			   $return['groupid'] = $row->group_id;
			   $return['per'] = $row->permission;
			  
			}
			return $return;
			

		}else{
			return FALSE;

		}

	}

	public function check_user() {

	if (!$this->session->userdata('logged_in')) {
		redirect('login', 'refresh');
	}
		
		




	}
	
	
	


}


?>