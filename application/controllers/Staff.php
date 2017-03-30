<?php
class Staff extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Staff_model');
        
        }

        public function index()
        {
                if($this->session->userdata('logged_in'))
                {
                        $session_data = $this->session->userdata('logged_in');
                        $busID = $session_data['busID'];
                        $data['username'] = $session_data['username'];
                        $data['staff'] = $this->Staff_model->get_staff($busID);
                        //die(var_dump($data));
                        $data['title'] = 'Staff';

                        $this->load->view('templates/header', $data);
                        $this->load->view('staff/index', $data);
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