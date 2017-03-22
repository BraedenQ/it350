<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('user_model','',TRUE);
 }
 
 function index()
 {

   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   // If you look there is a callback here that will call the check database functions
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login/index');
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }
 
 }
 
 function check_database($password)
 {

   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   //query the database
   
   $result = $this->user_model->login($username, $password);
   //die(print("here"));
   //die(print("hi"));
   //die(var_dump($result));
  
   if($result)
   {
     $sess_array = array();
     //die(print("wait"));
     //die(var_dump($result));
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       //die(var_dump($row));
       $this->session->set_userdata('logged_in', $sess_array);
     }
     die(var_dump($sess_array));
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>