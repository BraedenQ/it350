<?php
class Home extends CI_Controller {
	public function index()
    {
	   if($this->session->userdata('logged_in'))
	    {
	     $session_data = $this->session->userdata('logged_in');
	     $data['username'] = $session_data['username'];

	     $data['title'] = 'Clinical Software';

         $this->load->view('templates/header', $data);
         $this->load->view('home/index');
         $this->load->view('templates/footer');
	    }
	    else
	    {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');
	    }
    }
}