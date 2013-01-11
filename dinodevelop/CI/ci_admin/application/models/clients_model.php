<?php
class Clients_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_clients()
	{
	
		$query = $this->db->get('LA_clients');
		$html = '';
		$html .= '<table class="table"><tbody>';
		foreach ($query->result() as $row) {
			$html .= '<tr><td>'.$row->b_name.'</td><td>'.$row->email.'</td></tr>';

		}
		$html .= '</tbody></table>';
		return $html;
			
	}
	
	

	public function set_news()
{
	$this->load->helper('url');
	
	$slug = url_title($this->input->post('title'), 'dash', TRUE);
	
	$data = array(
		'title' => $this->input->post('title'),
		'slug' => $slug,
		'text' => $this->input->post('text')
	);
	
	return $this->db->insert('news', $data);
}
}


?>