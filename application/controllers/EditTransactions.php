<?php
class EditTransactions extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('editTransactions_model');
        }

        public function index()
        {
            if($this->session->userdata('logged_in'))
            {
                $session_data = $this->session->userdata('logged_in');
    	        $data['title'] = 'Edit Transactions';
                $data['username'] = $session_data['username'];

    	        $this->load->view('templates/header', $data);
    	        $this->load->view('editTransactions/index', $data);
    	        $this->load->view('templates/footer');
            } 
            else 
            {
                //If no session, redirect to login page
                redirect('login', 'refresh');
            }
        }

        public function add()
        {


            //prep variables
        	$session_data = $this->session->userdata('logged_in');
            $busID = $session_data["busID"];
            $amount = $this->input->post("amount");
        	$type = $this->input->post("type");
        	$transaction = $this->editTransactions_model->get_latest_transaction($busID);
            //die(print($transaction));
            //change database
        	$this->editTransactions_model->add($type, $amount, $transaction,$busID);

            //load transactions
            $data['transactions'] = $this->editTransactions_model->get_transactions($busID);
            $data['title'] = 'Clinic Transactions';
        	$this->load->view('templates/header', $data);
	        $this->load->view('transactions/index', $data);
	        $this->load->view('templates/footer');
        }
            
        public function remove()
        {
            //prep variables
            $session_data = $this->session->userdata('logged_in');
            $busID = $session_data["busID"];
            $transID = $this->input->post("transID");

            //change database
            $this->editTransactions_model->remove($transID);

            //load transactions
            $data['transactions'] = $this->editTransactions_model->get_transactions($busID);
            $data['title'] = 'Clinic Transactions';
            $this->load->view('templates/header', $data);
            $this->load->view('transactions/index', $data);
            $this->load->view('templates/footer');
        }
        
}
?>