<?php
class Clinic extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('clinic_model');
                //$this->load->helper('url_helper');
        }

        public function index()
        {
                $data['clinics'] = $this->clinic_model->get_clinics();
                //die(var_dump($data));
		        $data['title'] = 'Clinic View';

		        $this->load->view('templates/header', $data);
		        $this->load->view('clinic/index', $data);
		        $this->load->view('templates/footer');
        }

        public function view($clinicID = NULL)
        {
                $data['clinic'] = $this->clinic_model->get_clinics($clinicID);
                if (empty($data['clinic']))
		        {
		                show_404();
		        }

		        
		        $data['title'] = 'Clinic View';

		        $this->load->view('templates/header', $data);
		        $this->load->view('clinic/view', $data);
		        $this->load->view('templates/footer');
        }
}