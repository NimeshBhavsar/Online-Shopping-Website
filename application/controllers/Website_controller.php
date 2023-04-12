<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('form', 'url','common_helper'));
	    $this->load->model('crud_model');
    }
	public function website_home()
	{
		$data['category'] = $this->db->get('tbl_category')->result();
		$data['banner_offer'] = $this->db->query('SELECT * FROM `tbl_products` where pro_off_percentage > 499  ORDER BY `update_date` DESC limit 9')->result();
		$this->load->view('website/website_home',$data);
	}
	public function product_v()
	{
		$product_id = $this->uri->segment('2');
		$data['category'] = $this->db->get('tbl_category')->result();
		$data['product_data'] = $this->crud_model->selectquery('tbl_products','product_id',$product_id);
		if(count($data['product_data']) > 0)
		{
			$query = $this->db->limit(7)->get_where("tbl_products",array('product_id !=' => $product_id , 'cat_id ' => $data['product_data'][0]->cat_id));
			$data['related_products'] = $query->result();
			$query = $this->db->get_where("tbl_product_qes_ans",array('product_id' => $product_id , 'answer !=' => ''));
			$data['product_qes_ans'] = $query->result();
			$query = $this->db->get_where("tbl_product_qes_ans",array('product_id' => $product_id));
			$data['review_vote'] = $query->result();
			$this->load->view('website/product_view',$data);
		}
		else
		{
			redirect(base_url('website_home'));
		}
	}
	public function qestion_pass()
	{
		$product_id = $this->input->post("product_id");
		$question = $this->input->post("question");
		$customer_id = $this->session->userdata('customer_id');
		$datavalues1 = array('product_id' => $product_id , 'question' => $question,'customer_id' => $customer_id,'date_of_question' => date('Y-m-d H:i:s'));
		$data = $this->crud_model->insert('tbl_product_qes_ans',$datavalues1);
		echo $data;
	}
	public function qestion_vote()
	{
		$product_id = $this->input->post("product_id");
		$pro_qes_ans_id = $this->input->post("pro_qes_ans_id");
		$vote_type = $this->input->post("vote_type");
		$customer_id = $this->session->userdata('customer_id');
		$datavalues1 = array('product_id' => $product_id , 'pro_qes_ans_id' => $pro_qes_ans_id,'customer_id' => $customer_id);
		$query = $this->db->get_where("tbl_qes_ans_votes", $datavalues1);
		$data['question_vote_data'] = $query->result();
		if(count($data['question_vote_data']) > 0)
		{
			$datavalues = array('product_id' => $product_id ,'customer_id' => $customer_id,'vote_type' => $vote_type,'date_of_updated' => date('Y-m-d H:i:s'));
			$data = $this->crud_model->update('tbl_qes_ans_votes',$datavalues,'qes_ans_vote_id',$data['question_vote_data'][0]->qes_ans_vote_id);
			echo"update";
		}
		else{
			$datavalues1 = array('product_id' => $product_id , 'pro_qes_ans_id' => $pro_qes_ans_id,'customer_id' => $customer_id,'vote_type' => $vote_type,'date_of_voted' => date('Y-m-d H:i:s'));
			$data = $this->crud_model->insert('tbl_qes_ans_votes',$datavalues1);
			echo"insert";
		}
	}
	public function review_vote()
	{
		$product_id = $this->input->post("product_id");
		$order_id = $this->input->post("order_id");
		$vote_type = $this->input->post("vote_type");
		$customer_id = $this->session->userdata('customer_id');
		$datavalues1 = array('product_id' => $product_id , 'order_id' => $order_id,'customer_id' => $customer_id);
		$query = $this->db->get_where("tbl_review_votes", $datavalues1);
		$data['question_vote_data'] = $query->result();
		if(count($data['question_vote_data']) > 0)
		{
			$datavalues = array('product_id' => $product_id ,'customer_id' => $customer_id,'vote_type' => $vote_type,'date_of_updated' => date('Y-m-d H:i:s'));
			$data = $this->crud_model->update('tbl_review_votes',$datavalues,'review_vote_id',$data['question_vote_data'][0]->review_vote_id);
			echo"update";
		}
		else{
			$datavalues1 = array('product_id' => $product_id , 'order_id' => $order_id,'customer_id' => $customer_id,'vote_type' => $vote_type,'date_of_voted' => date('Y-m-d H:i:s'));
			$data = $this->crud_model->insert('tbl_review_votes',$datavalues1);
			echo"insert";
		}
	}
	public function cat_v()
	{
		$cat_id = $this->uri->segment('2');
		$datavalues1 = array('cat_id' => $cat_id);
		$query = $this->db->get_where("tbl_products", $datavalues1);
		$data['product_data'] = $query->result();
		//
		$data['category'] = $this->db->get('tbl_category')->result();
		$datavalues1 = array('cat_id' => $cat_id);
		$query = $this->db->get_where("tbl_sub_category", $datavalues1);
		$data['sub_category_data'] = $query->result();
		$data['brand_data'] = $this->db->query('SELECT * FROM `tbl_brand` where brand_id in(SELECT brand_id from tbl_products where cat_id in('.$cat_id.'))')->result();
		$data['low_value'] = $this->db->query('SELECT pro_final_amount FROM `tbl_products` where cat_id in('.$cat_id.') ORDER BY `tbl_products`.`pro_final_amount`  + 0 asc limit 1')->result();
		$data['high_value'] = $this->db->query('SELECT pro_final_amount FROM `tbl_products` where cat_id in('.$cat_id.') ORDER BY `tbl_products`.`pro_final_amount`  + 0 DESC limit 1')->result();
		$this->load->view('website/cat_v',$data);
	}
	public function add_to_cart()
	{
		if(!empty($this->input->post("pro_size")))
		{
			$pro_size = $this->input->post("pro_size");
		}
		else
		{
			$pro_size ="";
		}
		
		$product_id = $this->input->post("product_id");
		$customer_id = $this->session->userdata('customer_id');
		$datavalues1 = array('product_id' => $product_id ,'customer_id' => $customer_id ,'order_status' => 'PENDING');
		$query = $this->db->get_where("tbl_cart",$datavalues1);
		$data['cart_data'] = $query->result();
		if(!empty($data['cart_data']))
		{

		}
		else
		{
			$datavalues2 = array('pro_size' => $pro_size,'product_id' => $product_id ,'customer_id' => $customer_id ,'order_status' => 'PENDING','quantity' => '1');
			$data = $this->crud_model->insert('tbl_cart',$datavalues2);
			echo"insert";
		}
	}
	public function add_to_wishlist()
	{
		$product_id = $this->input->post("product_id");
		$customer_id = $this->session->userdata('customer_id');
		$datavalues1 = array('product_id' => $product_id ,'customer_id' => $customer_id );
		$query = $this->db->get_where("tbl_wishlist",$datavalues1);
		$data['cart_data'] = $query->result();
		if(!empty($data['cart_data']))
		{

		}
		else
		{
			$data = $this->crud_model->insert('tbl_wishlist',$datavalues1);
			echo"insert";
		}
	}
	public function customer_cart()
	{
		$customer_id = $this->session->userdata('customer_id');
		$query = $this->db->get_where("tbl_cart",array('customer_id' => $customer_id , 'order_status' => 'PENDING'));
			$data['cart_data'] = $query->result();

			$query = $this->db->query("SELECT * FROM `tbl_coupon_code` where coupon_id not in(SELECT coupon_id from tbl_orders where customer_id='".$customer_id."' and (seller_status='SUCCESS' || seller_status='PENDING' || seller_status='SHIPPED')) and CAST( curdate() AS DATE) <= CAST(valid_date AS DATE)");
			$data['coupon_codes'] = $query->result();
		
			$data['category'] = $this->db->get('tbl_category')->result();
			$this->load->view('website/customer_cart',$data);
		
	}
	public function cart_inc_dec()
	{
		$a=0;
		$customer_id = $this->session->userdata('customer_id');
		$cart_id = $this->input->post("cart_id");
		$inc_dec_status = $this->input->post("inc_dec_status");
		$datavalues1 = array('cart_id' => $cart_id ,'customer_id' => $customer_id ,'order_status' => 'PENDING');
		$query = $this->db->get_where("tbl_cart",$datavalues1);
		$data['cart_data'] = $query->result();
		if(!empty($data['cart_data']))
		{
			if($inc_dec_status == 1)
			{
				$a = --$data['cart_data'][0]->quantity;
				echo"dec";
			}
			else
			{
				$a = ++$data['cart_data'][0]->quantity;
				echo"inc";
			}
			$datavalues1 = array('quantity' => $a);
			$data = $this->crud_model->update('tbl_cart',$datavalues1,'cart_id',$data['cart_data'][0]->cart_id);

		}
	}
	public function cart_pro_remove()
	{
		$cart_id = $this->input->post("cart_id");
		$query = $this->db->query("DELETE from `tbl_cart` where cart_id ='".$cart_id."'");
		echo"removed";
	}
	public function order_placed() 
	{
		$payment_type = $this->input->post("payment_method");
		$card_type = $this->input->post("card_type");
		$card_number = $this->input->post("card_number");
		$expiry_month = $this->input->post("expiry_month");
		$cvcode = $this->input->post("cvcode");
		$cc_value_hiiden = $this->input->post("cc_value_hiiden");
		$cc_id_hiiden = $this->input->post("cc_id_hiiden");
		// echo $cc_value_hiiden;
		// echo $cc_id_hiiden;
		$data['category'] = $this->db->get('tbl_category')->result();
		$customer_id = $this->session->userdata('customer_id');
		$role = $this->session->userdata('role');
		if($role =='customer')
		{
			$datavalues1 = array('customer_id' => $customer_id ,'order_status' => 'PENDING');
			$query = $this->db->get_where("tbl_cart",$datavalues1);
			$data['cart_data'] = $query->result();
			if(!empty($data['cart_data']))
			{
				$get_discount_value = 0;
				if($cc_value_hiiden != 0)
				{
					$get_discount_value = $cc_value_hiiden / count($data['cart_data']);
				}
				echo $get_discount_value;
				foreach ($data['cart_data'] as $key => $value)
				{

					$datavalues123 = array('product_id' => $value->product_id);
					$query1 = $this->db->get_where("tbl_products",$datavalues123);
					$data1['product_data'] = $query1->result();
					if(!empty($data1['product_data']))
					{

						$datavalues1 = array('customer_id' => $customer_id ,'tracking_id' => rand(10000,999999),'product_id' => $value->product_id,'seller_id' => $data1['product_data'][0]->customer_id,'amount' => $data1['product_data'][0]->pro_final_amount - $get_discount_value,'offer_amount' => $data1['product_data'][0]->pro_off_percentage + $get_discount_value,'quantity_in_no' => $value->quantity,'card_type' => $card_type,'card_number' => $card_number,'expiry_month' => $expiry_month,'cvcode' => $cvcode,'payment_type' => $payment_type,'date_of_order' => date('Y-m-d H:i:s'),'seller_status' => 'PENDING','cutomer_status' => 'PENDING','coupon_id' => $cc_id_hiiden);
						$data = $this->crud_model->insert('tbl_orders',$datavalues1);
					}
					else
					{
						$data['var'] = "Product Missing";
						$this->load->view('website/error',$data);
					}
					//stock reduce
					//$datavalues21 = array('product_id' => $value->product_id);
					//print_r($datavalues21);
					$data1['stock_list1'] = $this->db->query("SELECT * FROM `tbl_stock_list` WHERE `product_id` = '".$value->product_id."'")->result();
					
					// echo "only ".count($data1['stock_list1']);
					// echo $value->product_id;
					// print_r($data1['stock_list1']);
						
					if(!empty($data1['stock_list1']))
					{

						$balance = $data1['stock_list1'][0]->current_available - $value->quantity;
						$datavalues22 = array('current_available' => $balance);
						$this->crud_model->update('tbl_stock_list', $datavalues22, 'stock_id', $data1['stock_list1'][0]->stock_id);
					}
					//stock reduce end


				}
				$datavalues = array('order_status' => 'success');
				$data = $this->crud_model->update('tbl_cart',$datavalues,'customer_id',$customer_id);
				$this->session->set_tempdata('success', 'Order Placed Successfully', 5);
				// redirect(base_url('customer_cart'));
				redirect(base_url('orders_customer'));
			}
			else
			{
				$data['var'] = "Cart Empty Please Add some product";
				$this->load->view('website/error',$data);
			}
		}
		else
		{
			$data['var'] = "Somthing wrong please login agian";
			$this->load->view('website/error',$data);
		}
	}
	public function sub_cat_v()
	{
		$sub_cat_id = $this->uri->segment('2');
		$datavalues1 = array('sub_cat_id' => $sub_cat_id);
		$query = $this->db->get_where("tbl_products", $datavalues1);
		$data['product_data'] = $query->result();
		//
		$data['category'] = $this->db->get('tbl_category')->result();
		$datavalues1 = array('sub_cat_id' => $sub_cat_id);
		$query = $this->db->get_where("tbl_sub_category", $datavalues1);
		$data['sub_category_data'] = $query->result();
		$data['brand_data'] = $this->db->query('SELECT * FROM `tbl_brand` where brand_id in(SELECT brand_id from tbl_products where sub_cat_id in('.$sub_cat_id.'))')->result();
		$data['low_value'] = $this->db->query('SELECT pro_final_amount FROM `tbl_products` where sub_cat_id in('.$sub_cat_id.') ORDER BY `tbl_products`.`pro_final_amount`  + 0 asc limit 1')->result();
		$data['high_value'] = $this->db->query('SELECT pro_final_amount FROM `tbl_products` where sub_cat_id in('.$sub_cat_id.') ORDER BY `tbl_products`.`pro_final_amount`  + 0 DESC limit 1')->result();
		if(!empty($data['product_data']))
		{
			$this->load->view('website/sub_cat_v',$data);
		}
		else
		{
			$data['var'] = "No Product in this Category";
			$this->load->view('website/error',$data);
		}
	}
	public function product_search()
	{
		$data['category'] = $this->db->get('tbl_category')->result();
		$search_keywords = $this->input->post("search_keywords");
		$search_options = $this->input->post("search_options");
		if($search_keywords !=''){
			$data['search_keyword'] = $search_keywords;
			if($search_options == 'all')
			{
				$data['product_data'] = $this->db->query("SELECT * FROM `tbl_products` where pro_name like '%".$search_keywords."%' or pro_keywords like '%".$search_keywords."%'  order by cast(pro_final_amount as int)")->result();
			}
			else
			{
				$data['product_data'] = $this->db->query("SELECT * FROM `tbl_products` where (pro_name like '%".$search_keywords."%' or pro_keywords like '%".$search_keywords."%') and sub_cat_id in(".$search_options.")  order by cast(pro_final_amount as int)")->result();
			}
			if(count($data['product_data']) > 0)
			{
				$data['sub_category_data'] = $this->db->query("SELECT * FROM `tbl_sub_category` where sub_cat_id in(SELECT sub_cat_id from tbl_products where pro_name like '%".$search_keywords."%' or pro_keywords like '%".$search_keywords."%')")->result();

				$data['brand_data'] = $this->db->query("SELECT * FROM `tbl_brand` where brand_id in(SELECT brand_id from tbl_products where pro_name like '%".$search_keywords."%' or pro_keywords like '%".$search_keywords."%')")->result();
				$data['low_value'] = $this->db->query("SELECT pro_final_amount FROM `tbl_products` where pro_name like '%".$search_keywords."%' or pro_keywords like '%".$search_keywords."%' ORDER BY `tbl_products`.`pro_final_amount`  + 0 asc limit 1")->result();
				$data['high_value'] = $this->db->query("SELECT pro_final_amount FROM `tbl_products` where pro_name like '%".$search_keywords."%' or pro_keywords like '%".$search_keywords."%' ORDER BY `tbl_products`.`pro_final_amount`  + 0 DESC limit 1")->result();
				$this->load->view('website/search_v',$data);
			}else
			{
				$data['var'] = "Sorry No Prudct Found";
				$this->load->view('website/error',$data);
				
			}
		}
		else
		{
			$data['var'] = "Please Search Again";
			$this->load->view('website/error',$data);
		}
	}
	public function contact()
	{
		$data['category'] = $this->db->get('tbl_category')->result();
		$datavalues1 = array('customer_id' => 1);
		$query = $this->db->get_where("tbl_login", $datavalues1);
		$data['admin_data'] = $query->result();
		$this->load->view('website/contact',$data);
	}
	public function send_feedback()
	{
		$sender_name = $this->input->post("sender_name");
		$email = $this->input->post("email");
		$sender_comment = $this->input->post("sender_comment");
		$datavalues1 = array('sender_name' => $sender_name ,'email' => $email ,'sender_comment' => $sender_comment ,'date_of_feedback' => date('Y-m-d H:i:s'));
		$data = $this->crud_model->insert('tbl_public_feedback',$datavalues1);
		$this->session->set_tempdata('success', 'Thank you for valuable feedback !', 5);
		redirect(base_url('contact'));
	}
}
