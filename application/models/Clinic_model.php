<?php
class Clinic_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_clinics($clinicID = FALSE)
	{
        if ($clinicID === FALSE)
        {
            $query = $this->db->get('test2');
            return $query->result_array();
        }
        $query = $this->db->get_where('test2', array('name' => $clinicID));
        return $query->row_array();
	}
    
}