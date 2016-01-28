<?php
class Post_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_post($slug = FALSE)
    {
        if ($slug === FALSE)
        {
                $query = $this->db->get('post');
                return $query->result_array();
        }

        $query = $this->db->get_where('post', array('SLUG' => $slug));

        return $query->row_array();
    }

    public function set_post()
	{
	    $this->load->helper('url');

	    $slug = url_title($this->input->post('title'), 'dash', TRUE);

	    $data = array(
	        'SUMMARY' => $this->input->post('title'),
	        'SLUG' => $slug,
	        'CONTENT' => $this->input->post('text')
	    );

	    return $this->db->insert('post', $data);
	}
}