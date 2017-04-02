<?php
class Patients_model extends CI_Model {

    public function get_patients($busID)
	{
		$this->db->select('employee.FirstName AS docFName, employee.lastName AS docLName, 
							patient.firstName, patient.lastName, patient.address');
		$this->db->from('patient');
		$this->db->join('employee', 'employee.emplID = patient.doctor');
		$this->db->where('patient.buildID',$busID);
		$query = $this->db->get();
		return $query->result_array();
    }


	// TODO: NOT COMPLETE NEED TO REIVEW
	public function edit($patientID,$docFirstName, $docLastName, $patientFirstName, $patientLastName, $address, $buildID)
    {


    	$data = array(
    		'buildID' => $docFirstName,
    		'firstName' => $firstName,
    		'lastName'=> $lastName,
    		'address'=> $address,
    		'doctor'=> $doctor
    	);

    	///die(var_dump($data));

    	$this->db->where('docFirstName',$patientID);
    	$this->db->update('employee',$data);

    	$data = array(
    		'type' => ($type)
    	);

		$this->db->where('emplId',$emplID);
    	$this->db->update('doctor',$data);

	}



}
?>


<!-- Select * from patients a
join medicalRecords b
on a.patientid = b.patientid
join employee c
on b.emplID = a.doctor;

employee.FirstName
employee.lastName
patient.firstName
patient.lastName
patient.address
-->