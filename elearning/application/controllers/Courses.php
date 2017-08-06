<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class courses extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{
		//echo "customer_type:".$this->session->userdata("customer_type");
		$courses = json_decode(file_get_contents('application\controllers\courses.json'), true);
		$view_data['courses'] = $courses;
		$offers = json_decode(file_get_contents('application\controllers\offers.json'), true);
		$view_data['offers'] = [];
		$customer_type = $this->session->userdata("customer_type");
		if(isset($offers[$customer_type]))
		{
			$view_data['offers'] = $offers[$customer_type];
		}
		$this->load->view("common/head");
	    $this->load->view('course_list', $view_data);
		$this->load->view("common/foot");

	}

}
