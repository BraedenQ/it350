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

        public function editPatients()
        {
                $session_data = $this->session->userdata('logged_in');
                $data['title'] = 'Patients';
                $data['username'] = $session_data['username'];
                $busID = $session_data["busID"];

                $doctors = $this->input->post('patients');
                foreach ($doctors as $doc) {
                    $empId = $doc['emplID'];
                    $firstName = $doc['firstName'];
                    $lastName = $doc['lastName'];
                    $address = $doc['address'];
                    $startDate = $doc['startDate'];
                    $type = $doc['type'];

                    $this->Doctors_model->edit($empId,$busID,$type,$firstName, $lastName,$address,$startDate);
                }

        }
}
?>