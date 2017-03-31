<?php
class Patients_model extends CI_Model {

    public function get_patients($busID)
	{
		$this->db->select('employee.FirstName, employee.lastName, 
							patient.firstName, patient.lastName, patient.address');
		$this->db->from('patient');
		$this->db->join('employee', 'employee.emplID = doctor.emplID');
		$this->db->where('patient.buildID',$busID);
		$query = $this->db->get();
		return $query->result_array();
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