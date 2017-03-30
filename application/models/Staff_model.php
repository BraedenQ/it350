<?php
class Staff_model extends CI_Model {

    public function get_staff($busID)
	{
		$this->db->select('employee.firstName,employee.lastName,employee.startDate,jobReview.notes');
		$this->db->from('employee');
		$this->db->join('supportStaff', 'supportStaff.emplID = employee.emplID');
		$this->db->join('job', 'job.jobID = supportStaff.job');
		$this->db->join('jobReview', 'jobReview.jobID = job.jobID');
		$this->db->where('employee.busID',$busID);
		$query = $this->db->get();
		return $query->result_array();
    }
}
?>


<!-- Select * from staff a
join employee b
on a.emplId  = b.emplID
join staff c
on b.emplID = c.emplID
join job d
on c.job = d.jobID
join jobReview e
on d.jobID = e.jobID -->