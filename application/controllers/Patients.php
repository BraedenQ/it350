<?php
class Patients extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Patients_model');
        
        }

        public function index()
        {
                if($this->session->userdata('logged_in'))
                {
                        $session_data = $this->session->userdata('logged_in');
                        $busID = $session_data['busID'];
                        $data['username'] = $session_data['username'];
                        $data['patients'] = $this->Patients_model->get_patients($busID);
                        //$data['title'] = $this->Patients_model->numberRows($busID);
                        //die(var_dump($data));
                        $data['title'] = 'Patient';


                        $this->load->view('templates/header', $data);
                        $this->load->view('patients/index', $data);
                        $this->load->view('templates/footer');
                }
                else 
                {
                        //If no session, redirect to login page
                        redirect('login', 'refresh');
                }
        }
}
?>