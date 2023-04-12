<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('form', 'url','common_helper'));
	    $this->load->model('crud_model');
	    admin_login();
    }
	public function seller_home()
	{
		$customer_id = $this->session->userdata('customer_id');
		$data['login_data'] = $this->crud_model->selectquery('tbl_login','customer_id',$customer_id);
		if(!empty($data['login_data']) && $data['login_data'][0]->admin_approve_cmy == '2')
		{
			$this->load->view('seller/seller_home',$data);
		}
		else
		{
			$this->load->view('seller/company_details',$data);
		}
	}
	public function cm_profile_update()
	{
		$customer_id = $this->session->userdata('customer_id');
		$user_name = $this->input->post("user_name");
		$email_id = $this->input->post("email_id");
		$mobile_no = $this->input->post("mobile_no");
		$address = $this->input->post("address");
		$city = $this->input->post("city");
		$country = $this->input->post("country");
		$pincode = $this->input->post("pincode");
		$land_mark = $this->input->post("land_mark");
		$about_me = $this->input->post("about_me");
		$company_details = $this->input->post("company_details");

		$query = $this->db->get_where("tbl_login",array('customer_id' => $customer_id));
		$data['attachment_data'] = $query->result();
		$photo = empty($_FILES['photo']['name']) ? '' : $_FILES['photo']['name'];
 		if(!empty($photo)) $photo1 = file_upload_img($photo, 'photo'); else $photo1 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->photo;
 		$company_logo = empty($_FILES['company_logo']['name']) ? '' : $_FILES['company_logo']['name'];
     if(!empty($company_logo)) $company_logo1 = file_upload_img($company_logo, 'company_logo'); else $company_logo1 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->company_logo;
     $company_app_doct = empty($_FILES['company_app_doct']['name']) ? '' : $_FILES['company_app_doct']['name'];
     if(!empty($company_app_doct)) $company_app_doct1 = file_upload_img($company_app_doct, 'company_app_doct'); else $company_app_doct1 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->company_app_doct;
     
		$datavalues = array('user_name' => $user_name , 'email_id' => $email_id , 'mobile_no' => $mobile_no , 'city' => $city , 'country' => $country , 'pincode' => $pincode , 'land_mark' => $land_mark , 'address' => $address, 'about_me' => $about_me, 'photo' => $photo1,'company_logo' => $company_logo1 , 'company_app_doct' => $company_app_doct1, 'admin_approve_cmy' => '1', 'company_details' => $company_details);
		$this->crud_model->update('tbl_login', $datavalues, 'customer_id', $customer_id);
		$this->session->set_tempdata('success', 'Profile updated !', 5);
		redirect(base_url('seller_home')); 
	}
	public function profile_seller()
	{
		$customer_id = $this->session->userdata('customer_id');
		$data['login_data'] = $this->crud_model->selectquery('tbl_login','customer_id',$customer_id);
		$this->load->view('seller/company_details',$data);
	}
	public function orders()
	{
		$seller_id = $this->session->userdata('customer_id');
		$datavalues = array('seller_id' => $seller_id , 'seller_status' => 'SHIPPED');
		$data['order_data'] = $this->crud_model->selectquery_array('tbl_orders',$datavalues);
		$data['header_name'] = 'View All Shipped Orders';
		$this->load->view('seller/orders',$data);
	}
	public function view_order()
	{
		$seller_id = $this->session->userdata('customer_id');
		$order_id = $this->uri->segment('2');
		$datavalues = array('seller_id' => $seller_id , 'order_id' => $order_id);
		$data['order_data'] = $this->crud_model->selectquery_array('tbl_orders',$datavalues);
		if(count($data['order_data']) == 1)
		{
			$where_cond1 = array('seller_id'=> $seller_id,'order_id >'=> $order_id);
			$this->db->select('order_id');
            $data['next'] = $this->db->limit(1)->order_by("order_id ASC")->get_where("tbl_orders", $where_cond1)->result();
            $where_cond1 = array('seller_id'=> $seller_id,'order_id <'=> $order_id);
            $this->db->select('order_id');
                $data['previous'] = $this->db->limit(1)->order_by("order_id desc")->get_where("tbl_orders", $where_cond1)->result();
			$this->load->view('seller/order_update',$data);
		}
		else
		{
			$this->session->set_tempdata('success', 'sorry for the trouble !', 5);
			redirect(base_url('orders')); 
		}
	}
	public function order_update()
	{
		$seller_id = $this->session->userdata('customer_id');
	    $order_id = $this->input->post("order_id");
	    $seller_status = $this->input->post("seller_status");
	    $rejection_reason = $this->input->post("rejection_reason");
		$query = $this->db->get_where("tbl_orders",array('order_id' => $order_id));
     	$data['attachment_data'] = $query->result();
     	$bill_of_order = empty($_FILES['bill_of_order']['name']) ? '' : $_FILES['bill_of_order']['name'];
     if(!empty($bill_of_order)) $bill_of_order1 = file_upload_img($bill_of_order, 'bill_of_order'); else $bill_of_order1 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->bill_of_order;
  		$datavalues = array('seller_status' => $seller_status , 'rejection_reason' => $rejection_reason , 'bill_of_order' => $bill_of_order1);
     	$this->session->set_tempdata('success', ' Order Details Updated Successfully !', 5);
     	$data = $this->crud_model->update('tbl_orders',$datavalues,'order_id',$order_id);
     	redirect(base_url('view_order/'.$order_id));
	}
	public function pending_orders()
	{
		$seller_id = $this->session->userdata('customer_id');
		$datavalues = array('seller_id' => $seller_id , 'seller_status' => 'PENDING');
		$data['order_data'] = $this->crud_model->selectquery_array('tbl_orders',$datavalues);
		$data['header_name'] = 'View All Pending Orders';
		$this->load->view('seller/orders',$data);
	}
	public function rejected_orders()
	{
		$seller_id = $this->session->userdata('customer_id');
		$datavalues = array('seller_id' => $seller_id , 'seller_status' => 'REJECTED');
		$data['order_data'] = $this->crud_model->selectquery_array('tbl_orders',$datavalues);
		$data['header_name'] = 'View All Rejected Orders';
		$this->load->view('seller/orders',$data);
	}
	public function complete_orders()
	{
		$seller_id = $this->session->userdata('customer_id');
		$datavalues = array('seller_id' => $seller_id , 'seller_status' => 'SUCCESS');
		$data['order_data'] = $this->crud_model->selectquery_array('tbl_orders',$datavalues);
		$data['header_name'] = 'View All Completed Orders';
		$this->load->view('seller/orders',$data);
	}
	public function payment_details()
	{
		$seller_id = $this->session->userdata('customer_id');
		$datavalues = array('customer_id' => $seller_id);
		$data['payment_data'] = $this->crud_model->selectquery_array('tbl_products',$datavalues);
		$this->load->view('seller/payment_details',$data);
	}
	public function raise_ticket_pro()
	{
		$seller_id = $this->session->userdata('customer_id');
		$datavalues = array('customer_id' => $seller_id);
		$data['product_data'] = $this->crud_model->selectquery_array('tbl_ticket_product',$datavalues);
		$data['header_name'] = "Raise Ticket For Product (Once the admin off your products raise your ticket here)";
		$this->load->view('seller/raise_ticket_pro',$data);
	}
	public function update_ticket()
	{
		$seller_id = $this->session->userdata('customer_id');
	    $product_id = $this->input->post("product_id");
	    $ticket_comments_seller = $this->input->post("ticket_comments_seller");
		$datavalues = array('customer_id' => $seller_id ,'product_id' => $product_id ,'ticket_comments_seller' => $ticket_comments_seller,'ticket_staus' => 'PENDING','date_of_raised' => date('Y-m-d H:i:s'));
		$datavalues1 = array('customer_id' => $seller_id ,'product_id' => $product_id);
		$data['product_data'] = $this->crud_model->selectquery_array('tbl_ticket_product',$datavalues1);
		if(!empty($data['product_data']))
		{
			$data = $this->crud_model->update('tbl_ticket_product',$datavalues,'product_id',$product_id);
			$this->session->set_tempdata('success', 'Ticket Updated Successfully !', 5);
		}
		else
		{
			$data = $this->crud_model->insert('tbl_ticket_product',$datavalues);
			$this->session->set_tempdata('success', 'Ticket Raised Successfully !', 5);
		}
		redirect(base_url('raise_ticket_pro'));
	}
	public function pro_qes_ans_seller()
	{
		$seller_id = $this->session->userdata('customer_id');
		$query = "SELECT * FROM `tbl_product_qes_ans` where (answer ='' or answer is null) and product_id in(SELECT product_id from tbl_products as t1 where t1.customer_id = '".$seller_id."')  ORDER BY `date_of_question`  ASC";
		$result = $this->db->query($query);
        $data['question_data'] = $result->result();
		$data['header_name'] = 'View All Product Question And Answers - Pending';
		$this->load->view('customer/pro_qes_ans_customer',$data);
	}
	public function update_pro_qes_ans()
	{
		$seller_id = $this->session->userdata('customer_id');
		$rtn_url = $this->input->post("rtn_url");
		$answer = $this->input->post("answer");
		$pro_qes_ans_id = $this->input->post("pro_qes_ans_id");
		$datavalues = array('answer' => $answer ,'pro_qes_ans_id' => $pro_qes_ans_id ,'seller_id' => $seller_id,'date_of_reply' => date('Y-m-d H:i:s'));
		$this->crud_model->update('tbl_product_qes_ans', $datavalues, 'pro_qes_ans_id', $pro_qes_ans_id);
		$this->session->set_tempdata('success', 'FAQ updated !', 5);
		redirect(base_url($rtn_url)); 
	}
	public function pro_qes_ans_seller_c()
	{
		$seller_id = $this->session->userdata('customer_id');
		$query = "SELECT * FROM `tbl_product_qes_ans` where answer !='' and product_id in(SELECT product_id from tbl_products as t1 where t1.customer_id = '".$seller_id."')ORDER BY `date_of_reply`  DESC";
		$result = $this->db->query($query);
        $data['question_data'] = $result->result();
		$data['header_name'] = 'View All Product Question And Answers - Completed';
		$this->load->view('customer/pro_qes_ans_customer',$data);
	}
}
