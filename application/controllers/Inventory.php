<?php
class Inventory extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Inventory_model');
        
        }

        public function index()
        {
                if($this->session->userdata('logged_in'))
                {
                        $session_data = $this->session->userdata('logged_in');
                        $busID = $session_data['busID'];
                        $data['username'] = $session_data['username'];

                        $data['inventory'] = $this->Inventory_model->get_inventory($busID);
        	        $data['title'] = 'Clinic Inventory';

        	        $this->load->view('templates/header', $data);
        	        $this->load->view('inventory/index', $data);
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