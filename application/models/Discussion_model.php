<?php
class Discussion_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_content()
        {
        	$query = $this->db->query("SELECT * FROM discussion;");
            return $query->result_array();
        }

        public function set_comment()
		{
    		$data = array(
        	'username' => $this->input->post('username'),
        	'content' => $this->input->post('content')
    		);

    		return $this->db->insert('discussion', $data);
		}
}