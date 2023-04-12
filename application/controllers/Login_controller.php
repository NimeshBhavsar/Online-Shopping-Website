<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('form', 'url','common_helper'));
	    $this->load->model('crud_model');
    }
	public function index()
	{
		redirect(base_url('logout'));
	}
	public function login_validate()
	{
		$user_name = $this->input->post('user_name');
		$email_id = $this->input->post('email_id');
		$password = $this->input->post('password');
		if ($this->crud_model->check_login())
		{
	  		$role = $this->session->userdata('role');
	  		if($role == 'admin')
	  		{
	  			redirect(base_url('admin_home')); 
	  		}
	  		else if($role == 'customer')
	  		{
	  			redirect(base_url('website_home')); 
	  		}
	  		else if($role == 'seller')
	  		{
	  			redirect(base_url('seller_home')); 
	  		}
	  		else
	  		{
	  			$this->session->set_tempdata('login_error', 'Invalid Email id or Password !', 5);
	    		redirect(base_url('login')); 
	  		} 
	    }
	    else
	    {
	    	$this->session->set_tempdata('login_error', 'Invalid Email id or Password !', 5);
	    	redirect(base_url('login')); 
	    }
	}
	public function logout()
	{
		$sessiondata = array('customer_id','email_id','user_name','role');
	    $this->session->unset_userdata($sessiondata);
		$this->load->view('login');
	}

	public function registration()
	{
		$sessiondata = array('customer_id','email_id','user_name','role');
	    $this->session->unset_userdata($sessiondata);
		$this->load->view('registration');
	}
	public function check_mail()
	{
		$email_id = $this->input->post('email_id');
		$data['check_mail'] = $this->crud_model->selectquery('tbl_login','email_id',$email_id);
		if(count($data['check_mail'])>0)
		{
			echo"valid";
		}
		else
		{
			echo"notvalid";
		}
	}
	public function register_validate()
	{
		$user_name = $this->input->post("user_name");
	    $email_id = $this->input->post("email_id");
	    $password = $this->input->post("password");
	    $mobile_no = $this->input->post("mobile_no");
	    $role = $this->input->post("role");
	    $datavalues = array('email_id' => $email_id);
	    $data['login_data'] = $this->crud_model->selectquery_array('tbl_login',$datavalues);
	    if(count($data['login_data']) > 0)
	    {
	    	 $this->session->set_tempdata('success', 'Email Id Already Exsits !', 5);
	    	 $this->load->view('registration');
	    }
	    else
	    {
	    	$photo = empty($_FILES['photo']['name']) ? '' : $_FILES['photo']['name'];
     		if(!empty($photo)) $photo1 = file_upload_img($photo, 'photo'); else $photo1 ='';
     		$data["data_strored_val"] = array('user_name' => $user_name , 'email_id' => $email_id , 'password' => password_hash($password, PASSWORD_DEFAULT) , 'status' => "NO" , 'mobile_no' => $mobile_no , 'role' => $role , 'photo' => $photo1,'otp' => '','status' => 'YES');
	    	// 
	    	$data['insert_id'] = $this->crud_model->insert('tbl_login',$data["data_strored_val"]);
	    	$this->session->set_tempdata('success', 'Register Successfully Please Login', 5);
	    	redirect(base_url('registration'));
	    	// $this->load->view('mail_send',$data);
	    }
	}
	public function otp_confirm()
	{
		$customer_id = $this->uri->segment('2');
		$datavalues = array('customer_id' => $customer_id);
		$data['login_data'] = $this->crud_model->selectquery_array('tbl_login',$datavalues);
		if(count($data['login_data']) > 0 && $data['login_data'][0]->otp !='')
		{
			$this->load->view('otp_confirm',$data);
		}
		else
		{
			$this->session->set_tempdata('success', 'Something Wrong Please Register Again !', 5);
			redirect(base_url('registration')); 
		}
	}
	public function otp_confirm_update()
	{
	    $otp = $this->input->post("otp");
	    $customer_id = $this->input->post("customer_id");
	    $role_one = $this->input->post("role_one");
	    $datavalues = array('customer_id' => $customer_id,'otp' => $otp);
		$data['login_data'] = $this->crud_model->selectquery_array('tbl_login',$datavalues);
		if(count($data['login_data']) > 0)
		{
			$datavalues = array('otp' => NULL, 'status' => 'YES');
			$this->crud_model->update('tbl_login', $datavalues, 'customer_id', $customer_id);
			$this->session->set_tempdata('login_error', 'Register Successfull Please Login', 5);
			redirect(base_url('login')); 
		}
		else
		{
			$this->session->set_tempdata('success', 'Otp Wrong Try Again', 5);
			redirect(base_url('otp_confirm/'.$customer_id));
		}
	}
	public function delete_registraion()
	{
		$customer_id = $this->uri->segment('2');
		$datavalues = array('customer_id' => $customer_id);
		$data['login_data'] = $this->crud_model->selectquery_array('tbl_login',$datavalues);
		if(count($data['login_data']) > 0 && $data['login_data'][0]->otp !='')
		{
			$this->db->where('customer_id', $customer_id);
			$this->db->delete('tbl_login');
			$this->session->set_tempdata('success', 'Registration Deleted please Register Again', 5);
		}
		else
		{
			$this->session->set_tempdata('success', 'Something Wrong Try Again', 5);
		}
		redirect(base_url('registration')); 
	}
}
