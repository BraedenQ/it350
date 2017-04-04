<?php
class Doctors extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Doctors_model');

        }

        public function index()
        {
                if($this->session->userdata('logged_in'))
                {
                        $session_data = $this->session->userdata('logged_in');
                        $busID = $session_data['busID'];
                        $data['username'] = $session_data['username'];

                        $data['doctors'] = $this->Doctors_model->get_doctors($busID);
                        //die(var_dump($data));
                        $data['title'] = 'Doctors';

                        $this->load->view('templates/header', $data);
                        $this->load->view('doctors/index', $data);
                        $this->load->view('templates/footer');
                }
                else 
                {
                        //If no session, redirect to login page
                        redirect('login', 'refresh');
                }
        }

        public function editDoctors()
        {
                $session_data = $this->session->userdata('logged_in');
                $data['title'] = 'Doctors';
                $data['username'] = $session_data['username'];
                $busID = $session_data["busID"];

                $doctors = $this->input->post('doctors');
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

        public function add()
        {
                //prep variables
                $session_data = $this->session->userdata('logged_in');
                $busID = $session_data["busID"];

                $doc = $this->input->post('doctor');
            
                $firstName = $doc['firstName'];
                $lastName = $doc['lastName'];
                $address = $doc['address'];
                $startDate = $doc['startDate'];
                $type = $doc['type'];

                $this->Doctors_model->add($busID, $type, $lastName,$address,$startDate);
        }

        public function delete()
        {
                //prep variables
                $session_data = $this->session->userdata('logged_in');
                $emplId = trim($this->input->post('doctorID'));

                // Delete doctor
                $this->Doctors_model->remove($emplId);

        }
}
?>