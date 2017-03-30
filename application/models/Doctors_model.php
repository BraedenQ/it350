<?php
class Doctors_model extends CI_Model {

    public function get_doctors($busID)
	{
		$this->db->select('employee.firstName,employee.lastName,employee.startDate,doctor.type');
		$this->db->from('employee');
		$this->db->join('doctor', 'doctor.emplID = employee.emplID');
		$this->db->where('employee.busID',$busID);
		$query = $this->db->get();
		return $query->result_array();
    }
}
?>
