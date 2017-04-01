<?php
class Doctors_model extends CI_Model {

    public function get_doctors($busID)
	{
		//$this->db->select('employee.firstName,employee.lastName,employee.startDate,doctor.type');
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->join('doctor', 'doctor.emplID = employee.emplID');
		$this->db->where('employee.busID',$busID);
		$query = $this->db->get();
		//die(var_dump($query->result_array()));
		return $query->result_array();
    }


    public function add($type, $amount, $transaction,$busID)
    {
    	$data = array(
    		//'emplID' => ($transaction + 1),
    		'busID' => $busID,
    		'firstName' => $type,
    		'lastName'=> $amount
    		'address'=> $amount
    		'startDate'=> $amount
    		'age' => $amount
    	);
    	$this->db->insert('transactions',$data);

   
	}

    public function remove($doctorID)
    {
        // $data = array('transID'=>$transID);
        // $this->db->delete('transactions',$data);
	}
}
?>

emplID
busID
firstName
lastName
address
startDate
age