<?php
class Patients_model extends CI_Model {

    public function get_patients($busID)
    {
        $this->db->select('employee.FirstName AS docFName, employee.lastName AS docLName, patient.patientID, 
                            patient.firstName, patient.lastName, patient.address, patient.entryDate, patient.departDate');
        $this->db->from('patient');
        $this->db->join('employee', 'employee.emplID = patient.doctor');
        $this->db->where('patient.buildID',$busID);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_patient($data)
    {
        //die(var_dump($data));
        if ($data['buildID'] != null) {
            //add new employee to table
            $this->db->insert('patient', $data);
        } else {
            redirect('login', 'refresh');
        }
    }


    // TODO: NOT COMPLETE NEED TO REVEIW
    public function edit_patients($data)
    {
        $this->db->where('patientID',$data['patientID']);
        $this->db->update('patient',$data);
    }
}


/* Select * from patients a
join medicalRecords b
on a.patientid = b.patientid
join employee c
on b.emplID = a.doctor;

employee.FirstName
employee.lastName
patient.firstName
patient.lastName
patient.address */