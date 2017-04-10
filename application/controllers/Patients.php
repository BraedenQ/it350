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

        public function addPatient()
        {
            $patient = $this->input->post('patient');
            $session_data = $this->session->userdata('logged_in');
            $doc = rand(101, 103);
            $patientData = array(
                    'buildID' => $session_data['busID'],
                    'firstName' => $patient['firstName'],
                    'lastName' => $patient['lastName'],
                    'address' => $patient['address'],
                    'doctor' => $doc,
                    'entryDate' => date("Y-m-d")
            );
            $this->Patients_model->add_patient($patientData);
        }

        public function updatePatients()
        {
            $session_data = $this->session->userdata('logged_in');
            $patients = $this->input->post('patients');
            foreach ($patients as $patient) {
            $patientData = array(
                'buildID' => $session_data['busID'],
                'patientID' => $patient['patientID'],
                'firstName' => $patient['firstName'],
                'lastName' => $patient['lastName'],
                'address' => $patient['address'],
                'entryDate' => $patient['entryDate']
            );
            $this->Patients_model->edit_patients($patientData);
        }

        }
}
?>