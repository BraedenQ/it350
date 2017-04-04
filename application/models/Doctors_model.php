<?php
class Doctors_model extends CI_Model {

    public function get_doctors($busID)
	{
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->join('doctor', 'doctor.emplID = employee.emplID');
		$this->db->where('employee.busID',$busID);

		$query = $this->db->get();
		return $query->result_array();
    }


    public function add($busID, $type, $lastName,$address,$startDate)
    {
    	$data = array(
    		'busID' => $busID,
    		'firstName' => $type,
    		'lastName'=> $lastName,
    		'address'=> $address
    	);

        $this->db->set('startDate', 'NOW()', FALSE);
    	$this->db->insert('employee',$data);

    	// This gets the last ID that was inserted.
    	$emplID = $this->db->insert_id();

    	$data = array(
    		'emplId' => ($emplID),
    		'type' => ($type)
    	);

    	$this->db->insert('doctor',$data);
	}

	public function edit($emplID,$busID, $type, $firstName, $lastName,$address,$startDate)
    {


    	$data = array(
    		'busID' => $busID,
    		'firstName' => $firstName,
    		'lastName'=> $lastName,
    		'address'=> $address,
    		'startDate'=> $startDate
    	);

    	$this->db->where('emplID',$emplID);
    	$this->db->update('employee',$data);

    	$data = array(
    		'type' => ($type)
    	);

		$this->db->where('emplId',$emplID);
    	$this->db->update('doctor',$data);

	}

    public function remove($emplID)
    {

        $data = array('emplID'=>$emplID);
        $this->db->delete('employee',$data);
        $data = array('emplId'=>$emplID);
        $this->db->delete('doctor',$data);
	}
}
?>