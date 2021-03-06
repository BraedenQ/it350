<?php
class Staff_model extends CI_Model
{

    public function get_staff($busID)
    {
        $this->db->select('employee.emplID, employee.firstName,employee.lastName,employee.address, employee.startDate,jobReview.notes,jobReview.jobID');
        $this->db->from('employee');
        $this->db->join('supportStaff', 'supportStaff.emplID = employee.emplID');
        $this->db->join('jobReview', 'jobReview.jobID = supportStaff.job');
        $this->db->where('employee.busID', $busID);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function edit_staff($empId, $jobId, $data, $notes)
    {
        //Update the employee data
        $this->db->where('emplID', $empId);
        $this->db->update('employee', $data);

        //update the employee review notes
        $this->db->where('jobID', $jobId);
        $this->db->update('jobReview', $notes);
    }

    public function add_member($data)
    {
        if ($data['busID'] != null) {
            //add new employee to table
            $this->db->insert('employee', $data);

            //add to supportStaff
            $empId = array('emplID' => $this->db->insert_id());
            $this->db->insert('supportStaff', $empId);

            //add to jobReview
            $jobId = array('jobID' => $this->db->insert_id());
            $this->db->insert('jobReview', $jobId);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function delete_staff($data) {
        //delete from employee table
        $this->db->delete('employee', $data);
        //grab job from supportStaff
        // $this->db->select('job', $data);
        // $query = $this->db->get();
        // $job = $query->result_array();
    }
}


/* Select * 
from staff a
join employee b on a.emplId  = b.emplID
join staff c
on b.emplID = c.emplID
join job d
on c.job = d.jobID
join jobReview e
on d.jobID = e.jobID */
