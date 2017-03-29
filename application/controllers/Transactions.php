<?php
class Transactions extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Transactions_model');
        
        }

        public function index()
        {

                $session_data = $this->session->userdata('logged_in');
                $busID = $session_data['busID'];

                $data['transactions'] = $this->Transactions_model->get_transactions($busID);
	        $data['title'] = 'Clinic Transactions';

	        $this->load->view('templates/header', $data);
	        $this->load->view('transactions/index', $data);
	        $this->load->view('templates/footer');
        }
        
}
?>