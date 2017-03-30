<?php
class Transactions extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Transactions_model');
        
        }

        public function index()
        {
                if($this->session->userdata('logged_in'))
                {
                        $session_data = $this->session->userdata('logged_in');
                        $busID = $session_data['busID'];
                        $data['username'] = $session_data['username'];

                        $data['transactions'] = $this->Transactions_model->get_transactions($busID);
                        $data['title'] = 'Clinic Transactions';

                        $this->load->view('templates/header', $data);
                        $this->load->view('transactions/index', $data);
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