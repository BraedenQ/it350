<?php
class Staff extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Staff_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $busID = $session_data['busID'];
            $data['username'] = $session_data['username'];
            $data['staff'] = $this->Staff_model->get_staff($busID);
            $data['title'] = 'Staff';

            $this->load->view('templates/header', $data);
            $this->load->view('staff/index', $data);
            $this->load->view('templates/footer');
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function addStaff() {
        $employee = $this->input->post('employee');
        $session_data = $this->session->userdata('logged_in');
        $employeeData = array(
                'busID' => $session_data['busID'],
                'firstName' => $employee['firstName'],
                'lastName' => $employee['lastName'],
                'address' => $employee['address'],
                'startDate' => date("Y-m-d")
        );
        $this->Staff_model->add_member($employeeData);
    }

    public function updateStaff() {
        $employees = $this->input->post('employees');
        foreach ($employees as $emp) {
            $empId = $emp['empId'];
            $jobId = $emp['jobId'];
            $employeeData = array(
                'firstName' => $emp['firstName'],
                'lastName' => $emp['lastName'],
                'address' => $emp['address'],
                'startDate' => $emp['startDate']
            );
            $notes = array(
                'notes' => $emp['notes']
            );
            $this->Staff_model->edit_staff($empId, $jobId, $employeeData, $notes);
        }
    }
}
