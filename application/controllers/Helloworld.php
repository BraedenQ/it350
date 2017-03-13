<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helloworld extends CI_Controller {


	// public function index()
	// {
 //        $data['page_title'] = "CI Hello World App!";
	// 	$this->load->view('helloworld_view');
	// }

    public function index()
    {
    	$this->load->view('helloworld_view');

        $this->load->model('helloworld_model');

        $data['result'] = $this->helloworld_model-><span class="sql">getData</span>();
        $data['page_title'] = "CI Hello World App!";

        $this->load->view('helloworld_view',$data);
    }
}
?>
