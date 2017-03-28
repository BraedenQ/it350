<?php
class EditTransactions extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('editTransactions_model');
        
        }

        public function index()
        {
             $data['edit'] = $this->editTransactions_model->get_transactions();
	        $data['title'] = 'Edit Transactions';

	        $this->load->view('templates/header', $data);
	        $this->load->view('editTransactions/index', $data);
	        $this->load->view('templates/footer');
        }
        
}
?>