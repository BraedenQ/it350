<?php
class EditTransactions extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('editTransactions_model');
        
        }

        public function index()
        {
            
	        $data['title'] = 'Edit Transactions';
	        
	        $this->load->view('templates/header', $data);
	        $this->load->view('editTransactions/index', $data);
	        $this->load->view('templates/footer');
        }

        public function add()
        {
            //prep variables
        	$amount = $this->input->post("amount");
        	$type = $this->input->post("type");
        	$transaction = $this->editTransactions_model->get_latest_transaction();

            //change database
        	$this->editTransactions_model->add($type, $amount, $transaction);

            //load transactions
            $data['transactions'] = $this->editTransactions_model->get_transactions();
            $data['title'] = 'Clinic Transactions';
        	$this->load->view('templates/header', $data);
	        $this->load->view('transactions/index', $data);
	        $this->load->view('templates/footer');
        }
        


        
}
?>