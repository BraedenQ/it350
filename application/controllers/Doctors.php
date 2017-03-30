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
}
?>