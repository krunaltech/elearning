<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
	}
	public function index()
	{
		if($this->session->userdata("customer_type") != null)
			redirect("/courses",'location');
		//$this->load->helper('url');
		//$this->load->view('login');

		$post = $this->input->post();
	    if(!$post){
	        $this->loadLoginView();
	        return;
	    }
		//$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->loadLoginView();
		}
		else
		{
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$is_login_success = $this->processLogin($username, $password);
			if(!$is_login_success)
			{
				$view_data['error'] = "Invalid username or password";
				$this->loadLoginView($view_data);
			}
			else
			{
				$session_data = array(
					"username"=>$is_login_success['username'],
					"customer_type"=>$is_login_success['customer_type']
				);
				$this->session->set_userdata($session_data);
				redirect("/courses",'location');
			}
		}
	}

	public function loadLoginView($data="")
	{
		$this->load->view("common/head");	
		$this->load->view('login', $data);
		$this->load->view("common/foot");
	}

	public function processLogin($username, $password)
	{
		$users_list = json_decode(file_get_contents('application\controllers\users.json'), true);
		for($i = 0; $i < count($users_list); $i++)
		{
			$user=$users_list[$i];
			if($user['username'] == $username && $user['password'] == $password)
			{
				return $user;
			}
		}
		return false;
	}

	public function logout()
	{
		//echo "test";
		$this->session->sess_destroy();
		//$this->load->helper('cookie');
		//delete_cookie('cart');
		//unset($_COOKIE['cart']);
		setcookie('cart', '', time()-3600, '/');

		//setcookie('cart', '0', 9000000000);
		//echo $this->input->cookie('cart');
		//print_r($_COOKIE['cart']="");
		redirect("login");
	}
}
