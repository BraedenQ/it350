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

          public function editInventory()
        {
                if($this->session->userdata('logged_in'))
                {
                        $session_data = $this->session->userdata('logged_in');
                        $busID = $session_data['busID'];
                        $data['username'] = $session_data['username'];

                        $this->load->view('templates/header', $data);
                        $this->load->view('editInventory/index', $data);
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
            $description = $this->input->post("description");
            $numUnits = $this->input->post("numUnits");
            $invID = $this->Inventory_model->get_latest_inventory($busID);
            //die(print($session_data));
            //change database
            $this->Inventory_model->add_inventory($description, $numUnits, $invID,$busID);

            //load transactions
            $data['inventory'] = $this->Inventory_model->get_inventory($busID);
            $data['title'] = 'Clinic Inventory';
            $this->load->view('templates/header', $data);
            $this->load->view('inventory/index', $data);
            $this->load->view('templates/footer');
        }
            
        public function remove()
        {
            //prep variables
            $session_data = $this->session->userdata('logged_in');
            $busID = $session_data["busID"];
            $invID = $this->input->post("invID");

            //change database
            $this->Inventory_model->remove_inventory($invID);

            //load transactions
            $data['inventory'] = $this->Inventory_model->get_inventory($busID);
        $data['title'] = 'Clinic Inventory';
            $this->load->view('templates/header', $data);
            $this->load->view('inventory/index', $data);
            $this->load->view('templates/footer');
        }
        
}
?>