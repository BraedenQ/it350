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
                if($this->session->userdata('logged_in'))
                {
                        $session_data = $this->session->userdata('logged_in');
                        $data['title'] = 'Edit Doctors';
                        $data['username'] = $session_data['username'];

                        $this->load->view('templates/header', $data);
                        $this->load->view('doctors/editDoctors', $data);
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

                    //die(print($transaction));
                    //change database
                $this->editTransactions_model->add($type, $amount, $transaction,$busID);

                    //load transactions
                $data['doctors'] = $this->editTransactions_model->get_transactions($busID);
                $data['title'] = 'Edit Doctors';
                $this->load->view('templates/header', $data);
                $this->load->view('doctors/index', $data);
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
            $data['doctors'] = $this->editTransactions_model->get_transactions($busID);
            $data['title'] = 'Edit Doctors';
            $this->load->view('templates/header', $data);
            $this->load->view('transactions/index', $data);
            $this->load->view('templates/footer');
        }
}
?>