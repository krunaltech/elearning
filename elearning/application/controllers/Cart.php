<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->helper('cookie');
	}

	public function index()
	{
		$cart_items = json_decode($this->input->cookie('cart'));
		if($cart_items == null)
		{
			$view_data['cart_items'] = [];
			$view_data['total_price'] = 0;
			$this->load->view("common/head");
			$this->load->view("cart", $view_data);
			$this->load->view("common/foot");
			return;
		}
		//$this->load->helper('cookie');
		//echo $this->get_cookie("cart");
		$courses = json_decode(file_get_contents('application\controllers\courses.json'), true);
		$tmp_course_arr = [];
		for($i = 0; $i < count($courses); $i++)
		{
			$tmp_course_arr[$courses[$i]['id']] = $courses[$i];
		}
		//$view_data['courses'] = $courses;
		$offers = json_decode(file_get_contents('application\controllers\offers.json'), true);
		$view_data['offers'] = [];
		$customer_type = $this->session->userdata("customer_type");

		$cart_values = [];
		$total_price = 0;
		$item_count = 0;
		foreach($cart_items as $item=>$qty)
		{
			$cart_values[$item_count] = array(
				'id'=>$item, 
				'name'=>$tmp_course_arr[$item]['name'], 
				'price'=>$tmp_course_arr[$item]['price'],
				'qty' => $qty,
				'total' => $tmp_course_arr[$item]['price'] * $qty
			);
			if(isset($offers[$customer_type]) && isset($offers[$customer_type][$item]))
			{
				$offer = $offers[$customer_type][$item];
				if($offer['offer_type'] == "free")
				{
					if($offer['min_qty'] <= $qty)
					{
						$free_qty = floor(($qty / $offer['min_qty']) * $offer['free_qty']);
						$cart_values[$item_count]['free_qty'] = $free_qty;
						$cart_values[$item_count]['offer_detail'] = $offer['offer_detail'];
						$cart_values[$item_count]['total'] = $cart_values[$item_count]['total'] - ($free_qty * $tmp_course_arr[$item]['price']);
					}
					else
						$free_qty = 0;
				}
				else
				{
					if($offer['min_qty'] <= $qty)
					{
						$price_drop = $offer['price'];
						$cart_values[$item_count]['offer_detail'] = $offer['offer_detail'];
						$cart_values[$item_count]['price_drop'] = $price_drop;
						$cart_values[$item_count]['total'] = $qty * $price_drop;
					}
					else
						$price_drop =  0;
				}
			}
			$total_price = $total_price + $cart_values[$item_count]['total'];
			$item_count++;
		}
		$view_data['cart_items'] = $cart_values;
		$view_data['total_price'] = $total_price;
		$this->load->view("common/head");
		$this->load->view("cart", $view_data);
		$this->load->view("common/foot");
	}

}
