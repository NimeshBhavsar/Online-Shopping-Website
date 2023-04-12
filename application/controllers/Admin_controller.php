<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('form', 'url','common_helper'));
	    $this->load->model('crud_model');
	    admin_login();
    }
	public function admin_home()
	{
		$this->load->view('admin/admin_home');
	}
	public function profile()
	{
		$customer_id = $this->session->userdata('customer_id');
		$data['login_data'] = $this->crud_model->selectquery('tbl_login','customer_id',$customer_id);
		$this->load->view('admin/profile',$data);
	}
	public function profile_update()
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
		$money_type = $this->input->post("money_type");

		$query = $this->db->get_where("tbl_login",array('customer_id' => $customer_id));
		$data['attachment_data'] = $query->result();
		$photo = empty($_FILES['photo']['name']) ? '' : $_FILES['photo']['name'];
 		if(!empty($photo)) $photo1 = file_upload_img($photo, 'photo'); else $photo1 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->photo;

		$datavalues = array('user_name' => $user_name , 'email_id' => $email_id , 'mobile_no' => $mobile_no , 'city' => $city , 'country' => $country , 'pincode' => $pincode , 'land_mark' => $land_mark , 'address' => $address, 'about_me' => $about_me, 'photo' => $photo1, 'money_type' => $money_type);
		$this->crud_model->update('tbl_login', $datavalues, 'customer_id', $customer_id);
		$this->session->set_tempdata('success', 'Profile updated !', 5);
		redirect(base_url('profile')); 
	}
	public function cat()
	{
		$customer_id = $this->session->userdata('customer_id');
		$query = $this->db->get_where("tbl_category", array('customer_id'=>$customer_id));
		$data['fetch_data'] = $query->result();
		$this->load->view('admin/cat',$data);
	}
	public function cat_add()
	{
		$customer_id = $this->session->userdata('customer_id');
		$category_name = $this->input->post("category_name");

		$datavalues = array('category_name' => $category_name , 'customer_id' => $customer_id);

		$data['fetch_data'] = $this->crud_model->selectquery_array('tbl_category',$datavalues);
		if(count($data['fetch_data']) > 0)
		{
			$this->session->set_tempdata('success', 'Category Already Exsits !', 5);
		}
		else
		{
     		$cat_img = empty($_FILES['cat_img']['name']) ? '' : $_FILES['cat_img']['name'];
     		if(!empty($cat_img)) $cat_img1 = file_upload_img($cat_img, 'cat_img');
     		$datavalues1 = array('category_name' => $category_name , 'customer_id' => $customer_id,'cat_img' => $cat_img1);

		   $this->session->set_tempdata('success', 'Category Added !', 5);
		   $data = $this->crud_model->insert('tbl_category',$datavalues1);
		}
		redirect(base_url('cat'));
	}
	public function cat_edit()
	{
		$cat_id = $this->uri->segment('2');
		$customer_id = $this->session->userdata('customer_id');
		$datavalues = array('customer_id' => $customer_id , 'cat_id' => $cat_id);
		$data['edit_fetch_data'] = $this->crud_model->selectquery_array('tbl_category',$datavalues);
		if(count($data['edit_fetch_data']) > 0)
		{
		   $this->load->view('admin/cat',$data);
		}
		else
		{
		   $this->session->set_tempdata('success', 'Category Wrongly select !', 5);
		   redirect(base_url('cat'));
		}
	}
	public function cat_update()
	{
		$category_name = $this->input->post("category_name");
		$cat_id = $this->input->post("cat_id");
		$customer_id = $this->session->userdata('customer_id');
		$query = $this->db->get_where("tbl_category",array('cat_id' => $cat_id));
     		$data['attachment_data'] = $query->result();
     		$cat_img = empty($_FILES['cat_img']['name']) ? '' : $_FILES['cat_img']['name'];
     		if(!empty($cat_img)) $cat_img1 = file_upload_img($cat_img, 'cat_img'); else $cat_img1 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->cat_img;
		$datavalues = array('category_name' => $category_name,'customer_id' => $customer_id , 'cat_id' => $cat_id,'cat_img' => $cat_img1);
		$data['edit_fetch_data'] = $this->crud_model->selectquery_array('tbl_category',$datavalues);
		if(count($data['edit_fetch_data']) > 0)
		{
		   $this->session->set_tempdata('success_mesg', 'Category Already Exsits !', 5);
		}
		else
		{
		   $datavalues1 = array('category_name' => $category_name,'customer_id' => $customer_id,'cat_img' => $cat_img1);
			$data = $this->crud_model->update('tbl_category',$datavalues1,'cat_id',$cat_id);
			$this->session->set_tempdata('success_mesg', 'Updated Category !', 5);
		}
		
		redirect(base_url('cat'));
	}
	public function upd_status()
	{
		$tbl_name = $this->uri->segment(3);
		$primary_key_clm = $this->uri->segment(4);
		$primary_key_value = $this->uri->segment(5);
		$update_clm = $this->uri->segment(6);
		$updated_value = $this->uri->segment(7);
		$redirect_string = $this->uri->segment(8);

		$data1 = array(
			$update_clm => $updated_value,
			'update_date' => date('Y-m-d H:i:s')
			 );
		$data= $this->crud_model->update($tbl_name,$data1,$primary_key_clm,$primary_key_value);
		$this->session->set_tempdata('success_mesg', 'Status '.$updated_value." updated.............", 5);
			redirect(base_url($redirect_string)); 
	}
	public function sub_cat()
	{
		$customer_id = $this->session->userdata('customer_id');
		$query = $this->db->get_where("tbl_sub_category", array('customer_id'=>$customer_id));
		$data['fetch_data'] = $query->result();
		$query = $this->db->get_where("tbl_category", array('status'=>'YES'));
		$data['cat_data'] = $query->result();
		$this->load->view('admin/sub_cat',$data);
	}
	public function sub_cat_add()
	{
		$customer_id = $this->session->userdata('customer_id');
		$cat_id = $this->input->post("cat_id");
		$sub_cat_name = $this->input->post("sub_cat_name");
		$data = array('cat_id' => $cat_id , 'sub_cat_name' => $sub_cat_name , 'customer_id' => $customer_id);

		$data['fetch_data'] = $this->crud_model->selectquery_array('tbl_sub_category',$data);
		if(count($data['fetch_data']) > 0)
		{
		   $this->session->set_tempdata('success', 'Sub Category Already Exsits !', 5);
		}
		else
		{
		   $datavalues = array('cat_id' => $cat_id , 'sub_cat_name' => $sub_cat_name , 'customer_id' => $customer_id);
			$data = $this->crud_model->insert('tbl_sub_category',$datavalues);
			$this->session->set_tempdata('success', 'Sub Category Added !', 5);
		}
		redirect(base_url('sub_cat'));
	}
	public function sub_cat_edit()
	{
		$sub_cat_id = $this->uri->segment('2');
		$customer_id = $this->session->userdata('customer_id');
		$query = $this->db->get_where("tbl_sub_category", array('sub_cat_id'=>$sub_cat_id,'customer_id'=>$customer_id));
		$data['edit_fetch_data'] = $query->result();
		if(!empty($data['edit_fetch_data']))
		{
			$query = $this->db->get_where("tbl_category", array('status'=>'YES'));
			$data['cat_data'] = $query->result();
			$this->load->view('admin/sub_cat',$data);
		}
		else
		{
			$this->session->set_tempdata('success_mesg', 'Sub Category Not Yours !', 5);
			redirect(base_url('sub_cat'));
		}
	}
	public function sub_cat_update()
	{
		$customer_id = $this->session->userdata('customer_id');
		$cat_id = $this->input->post("cat_id");
		$sub_cat_id = $this->input->post("sub_cat_id");
		$sub_cat_name = $this->input->post("sub_cat_name");
		$data = array('cat_id' => $cat_id , 'sub_cat_name' => $sub_cat_name , 'customer_id' => $customer_id);

		$data['fetch_data'] = $this->crud_model->selectquery_array('tbl_sub_category',$data);
		if(count($data['fetch_data']) > 0)
		{
		   $this->session->set_tempdata('success_mesg', 'Sub Category Already Exsits !', 5);
		}
		else
		{
		   $datavalues = array('cat_id' => $cat_id , 'sub_cat_name' => $sub_cat_name , 'customer_id' => $customer_id);
		   $data = $this->crud_model->update('tbl_sub_category',$datavalues,'sub_cat_id',$sub_cat_id);
			$this->session->set_tempdata('success_mesg', 'Sub Category Updated !', 5);
		}
		redirect(base_url('sub_cat'));
	}
	public function brand()
	{
		$customer_id = $this->session->userdata('customer_id');
		$query = $this->db->get_where("tbl_brand", array('customer_id' => $customer_id));
		$data['fetch_data'] = $query->result();
		$this->load->view('admin/brand',$data);
	}
	public function brand_add()
	{
		$customer_id = $this->session->userdata('customer_id');
		$brand_name = $this->input->post("brand_name");
		$datavalues = array('brand_name' => $brand_name , 'customer_id' => $customer_id);
		$data['fetch_data'] = $this->crud_model->selectquery_array('tbl_brand',$datavalues);
		if(count($data['fetch_data']) > 0)
		{
			$this->session->set_tempdata('success', 'Brand Already Exsits !', 5);
		}
		else
		{
		   $this->session->set_tempdata('success', 'Brand Added !', 5);
		   $data = $this->crud_model->insert('tbl_brand',$datavalues);
		}
		redirect(base_url('brand'));
	}
	public function brand_edit()
	{
		$brand_id = $this->uri->segment('2');
		$customer_id = $this->session->userdata('customer_id');
		$datavalues = array('customer_id' => $customer_id , 'brand_id' => $brand_id);
		$data['edit_fetch_data'] = $this->crud_model->selectquery_array('tbl_brand',$datavalues);
		if(count($data['edit_fetch_data']) > 0)
		{
		   $this->load->view('admin/brand',$data);
		}
		else
		{
		   $this->session->set_tempdata('success', 'Brand Wrongly select !', 5);
		   redirect(base_url('cat'));
		}
	}
	public function brand_update()
	{
		$brand_name = $this->input->post("brand_name");
		$brand_id = $this->input->post("brand_id");
		$customer_id = $this->session->userdata('customer_id');
		$datavalues = array('brand_name' => $brand_name,'customer_id' => $customer_id,'brand_id' => $brand_id);
		$data['edit_fetch_data'] = $this->crud_model->selectquery_array('tbl_brand',$datavalues);
		if(count($data['edit_fetch_data']) > 0)
		{
		   $this->session->set_tempdata('success_mesg', 'Brand Already Exsits !', 5);
		}
		else
		{
		   $datavalues1 = array('brand_name' => $brand_name,'customer_id' => $customer_id);
			$data = $this->crud_model->update('tbl_brand',$datavalues1,'brand_id',$brand_id);
			$this->session->set_tempdata('success_mesg', 'Updated Brand !', 5);
		}
		
		redirect(base_url('brand'));
	}
	public function product()
	{
	    $customer_id = $this->session->userdata('customer_id');
	    $query1 = $this->db->get_where("tbl_category", array('status' => 'YES'));
     	$data['category_data'] = $query1->result();
     	$query = $this->db->get_where("tbl_brand", array('status' => 'YES'));
     	$data['brand_data'] = $query->result();
     	$query = $this->db->get_where("tbl_products", array('status' => 'YES'));
     	$data['pro_data'] = $query->result();
	    $this->load->view('admin/product',$data);
	}
	public function product_add()
	{
		
		if(!empty($this->input->post("pro_size"))){
			$pro_size = implode(",",$this->input->post("pro_size"));
		}
		else
		{
			$pro_size ='';
		}
	
	if(!empty($this->input->post("pro_color_ids"))){
	$pro_color_ids = implode(",",$this->input->post("pro_color_ids"));
}else
{
	$pro_color_ids='';
}
	     $customer_id = $this->session->userdata('customer_id');
	     $cat_id = $this->input->post("cat_id");
	     $sub_cat_id = $this->input->post("sub_cat_id");
	     $brand_id = $this->input->post("brand_id");
	     $pro_name = $this->input->post("pro_name");
	     $pro_amount = $this->input->post("pro_amount");
	     $pro_off_percentage = $this->input->post("pro_off_percentage");
	     $pro_final_amount = $this->input->post("pro_final_amount");
	     $product_description = $this->input->post("product_description");
	     $pro_keywords = $this->input->post("pro_keywords");
	     $pro_details = $this->input->post("pro_details");
	     $pro_delivery_dates = $this->input->post("pro_delivery_dates");
	     $des_line1 = $this->input->post("des_line1");
     	$des_line2 = $this->input->post("des_line2");
     	$des_line3 = $this->input->post("des_line3");
	     $pro_img1 = empty($_FILES['pro_img1']['name']) ? '' : $_FILES['pro_img1']['name'];
	     if(!empty($pro_img1)) $pro_img11 = file_upload_img($pro_img1, 'pro_img1');
	     $pro_img2 = empty($_FILES['pro_img2']['name']) ? '' : $_FILES['pro_img2']['name'];
	     if(!empty($pro_img2)) $pro_img21 = file_upload_img($pro_img2, 'pro_img2');
	     $pro_img3 = empty($_FILES['pro_img3']['name']) ? '' : $_FILES['pro_img3']['name'];
	     if(!empty($pro_img3)) $pro_img31 = file_upload_img($pro_img3, 'pro_img3');
	     $pro_img4 = empty($_FILES['pro_img4']['name']) ? '' : $_FILES['pro_img4']['name'];
	     if(!empty($pro_img4)) $pro_img41 = file_upload_img($pro_img4, 'pro_img4');
	     $des_img1 = empty($_FILES['des_img1']['name']) ? '' : $_FILES['des_img1']['name'];
     if(!empty($des_img1)) $des_img11 = file_upload_img($des_img1, 'des_img1');
     $des_img2 = empty($_FILES['des_img2']['name']) ? '' : $_FILES['des_img2']['name'];
     if(!empty($des_img2)) $des_img21 = file_upload_img($des_img2, 'des_img2');
     $des_img3 = empty($_FILES['des_img3']['name']) ? '' : $_FILES['des_img3']['name'];
     if(!empty($des_img3)) $des_img31 = file_upload_img($des_img3, 'des_img3');
     $des_img4 = empty($_FILES['des_img4']['name']) ? '' : $_FILES['des_img4']['name'];
     if(!empty($des_img4)) $des_img41 = file_upload_img($des_img4, 'des_img4');

	     $datavalues = array('customer_id' => $customer_id , 'cat_id' => $cat_id , 'sub_cat_id' => $sub_cat_id , 'brand_id' => $brand_id , 'pro_name' => $pro_name , 'pro_amount' => $pro_amount , 'pro_off_percentage' => $pro_off_percentage , 'pro_final_amount' => $pro_final_amount , 'product_description' => $product_description  , 'pro_size' => $pro_size  , 'pro_color_ids' => $pro_color_ids , 'pro_keywords' => $pro_keywords , 'pro_details' => $pro_details , 'pro_delivery_dates' => $pro_delivery_dates , 'pro_img1' => $pro_img11 , 'pro_img2' => $pro_img21 , 'pro_img3' => $pro_img31 , 'pro_img4' => $pro_img41,'des_line1' => $des_line1 , 'des_line2' => $des_line2 , 'des_line3' => $des_line3,'des_img1' => $des_img11 , 'des_img2' => $des_img21 , 'des_img3' => $des_img31 , 'des_img4' => $des_img41,'update_date' => date('Y-m-d H:i:s'));
	     $this->session->set_tempdata('success', 'Product Added !', 5);
	     $data = $this->crud_model->insert('tbl_products',$datavalues);
	     $datavalues1 = array('customer_id' => $customer_id ,'product_id' => $data,'current_available' => 0,'total_stock' => 0);
	     $data2 = $this->crud_model->insert('tbl_stock_list',$datavalues1);
	     redirect(base_url('product'));
	}
	public function product_view()
	{
	     $customer_id = $this->session->userdata('customer_id');
		$query = $this->db->get_where("tbl_products" ,array('customer_id' => $customer_id));
     	$data['products_data'] = $query->result();
     	$this->load->view('admin/product_view',$data);
	}
	public function product_edit()
	{

	     $product_id = $this->uri->segment('2');
	     $customer_id = $this->session->userdata('customer_id');
	     $datavalues = array('customer_id' => $customer_id,'product_id' => $product_id);
	     $data['edit_fetch_data'] = $this->crud_model->selectquery_array('tbl_products',$datavalues);

	     if(count($data['edit_fetch_data']) > 0)
	     {
	     	$query = $this->db->get_where("tbl_products", array('status' => 'YES'));
     		$data['pro_data'] = $query->result();

	     	$query1 = $this->db->get_where("tbl_category", array('status' => 'YES'));
     		$data['category_data'] = $query1->result();
     		$query2 = $this->db->get_where("tbl_sub_category", array('status' => 'YES','cat_id' => $data['edit_fetch_data'][0]->cat_id));
     		$data['sub_category_data'] = $query2->result();
     		$query = $this->db->get_where("tbl_brand", array('status' => 'YES'));
     		$data['brand_data'] = $query->result();
	          $this->load->view('admin/product',$data);
	     }
	     else
	     {
	          $this->session->set_tempdata('success', ' Wrongly Select!', 5);
	          redirect(base_url(''));
	     }
	}

	public function get_subcategory()
	{
		 $cat_id = $this->input->post("cat_id");
		 $query = $this->db->get_where("tbl_sub_category", array('cat_id' => $cat_id));
     	 $data['sub_cat'] = $query->result();
     	 foreach ($data['sub_cat'] as $key => $value) {
     	 	echo"<option value='".$value->sub_cat_id."'>".$value->sub_cat_name."</option>";
     	 }
	}
	public function product_update()
{    $customer_id = $this->session->userdata('customer_id');
     $product_id = $this->input->post("product_id");
     $cat_id = $this->input->post("cat_id");
     $sub_cat_id = $this->input->post("sub_cat_id");
     $brand_id = $this->input->post("brand_id");
     $pro_name = $this->input->post("pro_name");
     $pro_amount = $this->input->post("pro_amount");
     $pro_off_percentage = $this->input->post("pro_off_percentage");
     $pro_final_amount = $this->input->post("pro_final_amount");
     $product_description = $this->input->post("product_description");
     $des_line1 = $this->input->post("des_line1");
     $des_line2 = $this->input->post("des_line2");
     $des_line3 = $this->input->post("des_line3");
     $pro_keywords = $this->input->post("pro_keywords");
     $pro_details = $this->input->post("pro_details");
     $pro_delivery_dates = $this->input->post("pro_delivery_dates");
     if(!empty($this->input->post("pro_size"))){
			$pro_size = implode(",",$this->input->post("pro_size"));
		}
		else
		{
			$pro_size ='';
		}
	
	if(!empty($this->input->post("pro_color_ids"))){
	$pro_color_ids = implode(",",$this->input->post("pro_color_ids"));
}else
{
	$pro_color_ids='';
}
     $datavalues = array('product_id' => $product_id , 'customer_id' => $customer_id);
     $data['products_update'] = $this->crud_model->selectquery_array('tbl_products',$datavalues);
     if(count($data['products_update']) > 0)
     {
     $query = $this->db->get_where("tbl_products",array('product_id' => $product_id));
     $data['attachment_data'] = $query->result();
     $pro_img1 = empty($_FILES['pro_img1']['name']) ? '' : $_FILES['pro_img1']['name'];
     if(!empty($pro_img1)) $pro_img11 = file_upload_img($pro_img1, 'pro_img1'); else $pro_img11 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->pro_img1;
     $pro_img2 = empty($_FILES['pro_img2']['name']) ? '' : $_FILES['pro_img2']['name'];
     if(!empty($pro_img2)) $pro_img21 = file_upload_img($pro_img2, 'pro_img2'); else $pro_img21 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->pro_img2;
     $pro_img3 = empty($_FILES['pro_img3']['name']) ? '' : $_FILES['pro_img3']['name'];
     if(!empty($pro_img3)) $pro_img31 = file_upload_img($pro_img3, 'pro_img3'); else $pro_img31 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->pro_img3;
     $pro_img4 = empty($_FILES['pro_img4']['name']) ? '' : $_FILES['pro_img4']['name'];
     if(!empty($pro_img4)) $pro_img41 = file_upload_img($pro_img4, 'pro_img4'); else $pro_img41 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->pro_img4;
     $des_img1 = empty($_FILES['des_img1']['name']) ? '' : $_FILES['des_img1']['name'];
     if(!empty($des_img1)) $des_img11 = file_upload_img($des_img1, 'des_img1'); else $des_img11 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->des_img1;
     $des_img2 = empty($_FILES['des_img2']['name']) ? '' : $_FILES['des_img2']['name'];
     if(!empty($des_img2)) $des_img21 = file_upload_img($des_img2, 'des_img2'); else $des_img21 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->des_img2;
     $des_img3 = empty($_FILES['des_img3']['name']) ? '' : $_FILES['des_img3']['name'];
     if(!empty($des_img3)) $des_img31 = file_upload_img($des_img3, 'des_img3'); else $des_img31 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->des_img3;
     $des_img4 = empty($_FILES['des_img4']['name']) ? '' : $_FILES['des_img4']['name'];
     if(!empty($des_img4)) $des_img41 = file_upload_img($des_img4, 'des_img4'); else $des_img41 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->des_img4;
     $datavalues = array('customer_id' => $customer_id , 'cat_id' => $cat_id , 'sub_cat_id' => $sub_cat_id , 'brand_id' => $brand_id , 'pro_name' => $pro_name , 'pro_amount' => $pro_amount , 'pro_off_percentage' => $pro_off_percentage , 'pro_final_amount' => $pro_final_amount , 'product_description' => $product_description , 'des_line1' => $des_line1 , 'des_line2' => $des_line2 , 'des_line3' => $des_line3 , 'pro_size' => $pro_size  , 'pro_color_ids' => $pro_color_ids ,'pro_keywords' => $pro_keywords , 'pro_details' => $pro_details , 'pro_delivery_dates' => $pro_delivery_dates , 'update_date' => date('Y-m-d H:i:s') , 'pro_img1' => $pro_img11 , 'pro_img2' => $pro_img21 , 'pro_img3' => $pro_img31 , 'pro_img4' => $pro_img41 , 'des_img1' => $des_img11 , 'des_img2' => $des_img21 , 'des_img3' => $des_img31 , 'des_img4' => $des_img41);
     $this->session->set_tempdata('success', 'Product Updated !', 5);
     $data = $this->crud_model->update('tbl_products',$datavalues,'product_id',$product_id);
	     //stocklist
	     $datavalues1 = array('product_id' => $product_id , 'customer_id' => $customer_id);
	     $data1['stock_list'] = $this->crud_model->selectquery_array('tbl_stock_list',$datavalues1);
	     if(!empty($data1['stock_list']))
	     {
	     	
	     }
	     else
	     {
	     	$datavalues12 = array('customer_id' => $customer_id ,'product_id' => $product_id,'current_available' => 0,'total_stock' => 0);
		     $data2 = $this->crud_model->insert('tbl_stock_list',$datavalues12);
	     }
	     //stocklist end
     }
     else
     {
     	 $this->session->set_tempdata('success', 'Product Not Yours !', 5);
     }
     redirect(base_url('product_view'));
}
	public function pending_seller()
	{
		$query = $this->db->get_where("tbl_login", array('admin_approve_cmy' => '1'));
     	$data['login_data'] = $query->result();
     	$this->load->view('admin/pending_seller',$data);
	}
	public function approved_seller()
	{
		$query = $this->db->get_where("tbl_login", array('admin_approve_cmy' => '2'));
     	$data['login_data'] = $query->result();
     	$this->load->view('admin/pending_seller',$data);
	}
	public function upd_cmy_appro()
	{
		$customer_id = $this->uri->segment('2');
		$admin_approve_cmy = $this->uri->segment('3');
		$datavalues = array('admin_approve_cmy' => '2','rejection_reason' => NULL);
		$this->crud_model->update('tbl_login', $datavalues, 'customer_id', $customer_id);
		$this->session->set_tempdata('success', 'Seller Data Approved !', 5);
		redirect(base_url('pending_seller'));
	}
	public function reject_seller()
	{
		$customer_id = $this->input->post("customer_id");
		$rejection_reason = $this->input->post("rejection_reason");
		$datavalues = array('rejection_reason' => $rejection_reason , 'admin_approve_cmy' => NULL);
		$this->crud_model->update('tbl_login', $datavalues, 'customer_id', $customer_id);
		$this->session->set_tempdata('success', 'Seller Data Submitted !', 5);
		redirect(base_url('pending_seller'));
	}
	public function pending_ticket_pro()
	{
		$customer_id = $this->session->userdata('customer_id');
		$datavalues = array('ticket_staus' => 'PENDING');
		$data['product_data'] = $this->crud_model->selectquery_array('tbl_ticket_product',$datavalues);
		$data['header_name'] = "Pending Seller Tickets";
		$this->load->view('seller/raise_ticket_pro',$data);
	}
	public function update_ticket_admin()
	{
		$seller_id = $this->session->userdata('customer_id');
	    $product_id = $this->input->post("product_id");
	    $ticket_comments_seller = $this->input->post("ticket_comments_seller");
	    $ticket_reply = $this->input->post("ticket_reply");
		$datavalues = array('ticket_comments_seller' => $ticket_comments_seller,'ticket_reply' => $ticket_reply,'ticket_staus' => 'SUCCESS','date_of_reply' => date('Y-m-d H:i:s'));
		$datavalues1 = array('product_id' => $product_id);
		$data['product_data'] = $this->crud_model->selectquery_array('tbl_ticket_product',$datavalues1);
		if(!empty($data['product_data']))
		{
			$data = $this->crud_model->update('tbl_ticket_product',$datavalues,'product_id',$product_id);
			$this->session->set_tempdata('success', 'Ticket Replyed Successfully !', 5);
		}
		else
		{
			$this->session->set_tempdata('success', 'Product Ticket Missing please check !', 5);
		}
		redirect(base_url('reply_ticket_pro'));
	}
	public function reply_ticket_pro()
	{
		$customer_id = $this->session->userdata('customer_id');
		$datavalues = array('ticket_staus' => 'SUCCESS');
		$data['product_data'] = $this->crud_model->selectquery_array('tbl_ticket_product',$datavalues);
		$data['header_name'] = "Completed Seller Tickets";
		$this->load->view('seller/raise_ticket_pro',$data);
	}
	public function seller_products()
	{
	     $customer_id = $this->session->userdata('customer_id');
		$query = $this->db->get_where("tbl_products" ,array('customer_id !=' => $customer_id));
     	$data['products_data'] = $query->result();
     	$this->load->view('admin/product_view',$data);
	}
	public function pending_orders_sellers()
	{
		$seller_id = $this->session->userdata('customer_id');
		$datavalues = array('seller_id !=' => $seller_id , 'seller_status' => 'PENDING');
		$data['order_data'] = $this->crud_model->selectquery_array('tbl_orders',$datavalues);
		$data['header_name'] = 'View All Seller Pending Orders';
		$this->load->view('seller/orders',$data);
	}
	public function view_order_admin()
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
	public function orders_sellers()
	{
		$seller_id = $this->session->userdata('customer_id');
		$datavalues = array('seller_id !=' => $seller_id , 'seller_status' => 'SHIPPED');
		$data['order_data'] = $this->crud_model->selectquery_array('tbl_orders',$datavalues);
		$data['header_name'] = 'View All Seller Shipped Orders';
		$this->load->view('seller/orders',$data);
	}
	public function rejected_orders_sellers()
	{
		$seller_id = $this->session->userdata('customer_id');
		$datavalues = array('seller_id !=' => $seller_id , 'seller_status' => 'REJECTED');
		$data['order_data'] = $this->crud_model->selectquery_array('tbl_orders',$datavalues);
		$data['header_name'] = 'View All Seller Rejected Orders';
		$this->load->view('seller/orders',$data);
	}
	public function complete_orders_sellers()
	{
		$seller_id = $this->session->userdata('customer_id');
		$datavalues = array('seller_id !=' => $seller_id , 'seller_status' => 'SUCCESS');
		$data['order_data'] = $this->crud_model->selectquery_array('tbl_orders',$datavalues);
		$data['header_name'] = 'View All Seller Completed Orders';
		$this->load->view('seller/orders',$data);
	}
	public function payment_details_seller()
	{
		$seller_id = $this->session->userdata('customer_id');
		$datavalues = array('customer_id !=' => $seller_id);
		$data['payment_data'] = $this->crud_model->selectquery_array('tbl_products',$datavalues);
		$this->load->view('seller/payment_details',$data);
	}
	public function pro_qes_ans_admin()
	{
		$customer_id = $this->session->userdata('customer_id');
		$data['question_data'] = $this->db->get('tbl_product_qes_ans')->result();
		$data['header_name'] = 'View All Product Question And Answers';
		$this->load->view('customer/pro_qes_ans_customer',$data);
	}
	public function stock_list()
	{
		$customer_id = $this->session->userdata('customer_id');
		$datavalues = array('customer_id' => $customer_id);
		$data['stock_list'] = $this->crud_model->selectquery_array('tbl_stock_list',$datavalues);
		$data['header_name'] = 'View All Stock List';
		$this->load->view('admin/stock_list',$data);
	}
	public function update_stock()
	{
		$customer_id = $this->session->userdata('customer_id');
		$current_available = $this->input->post("current_available");
		$total_stock = $this->input->post("total_stock");
		$stock_id = $this->input->post("stock_id");
		$datavalues = array('current_available' => $current_available,'total_stock' => $total_stock);
		$this->crud_model->update('tbl_stock_list', $datavalues, 'stock_id', $stock_id);
		$this->session->set_tempdata('success', 'Stock List Updated !', 5);
		redirect(base_url('stock_list')); 
	}
	public function public_feedback()
	{
		$data['feedback_data'] = $this->db->get('tbl_public_feedback')->result();
		$data['header_name'] = "View All Public Feedback's";
		$this->load->view('admin/public_feedback',$data);
	}
	public function order_update_admin()
	{
		$seller_id = $this->session->userdata('customer_id');
	    $order_id = $this->input->post("order_id");
	    $seller_status = $this->input->post("seller_status");
	    $rejection_reason = $this->input->post("rejection_reason");
		$query = $this->db->get_where("tbl_orders",array('order_id' => $order_id));
     	$data['attachment_data'] = $query->result();
     	$bill_of_order = empty($_FILES['bill_of_order']['name']) ? '' : $_FILES['bill_of_order']['name'];
     if(!empty($bill_of_order)) $bill_of_order1 = file_upload_img($bill_of_order, 'bill_of_order'); else $bill_of_order1 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->bill_of_order;
	     if($seller_status == 'SHIPPED')
	     {
	     	if($data['attachment_data'][0]->reduced =='NO')
	     	{
	     		$query = $this->db->get_where("tbl_stock_list",array('product_id' => $data['attachment_data'][0]->product_id));
     			$data['stock_list'] = $query->result();
     			if(!empty($data['stock_list']))
     			{
     				$aone = $data['stock_list'][0]->current_available - $data['attachment_data'][0]->quantity_in_no;
     				$datavalues12 = array('current_available' => $aone);
     				$data = $this->crud_model->update('tbl_stock_list',$datavalues12,'product_id',$data['attachment_data'][0]->product_id);
     				$reduced='YES';
     			}
	     	}
	     	else
	     	{
	     		$reduced='YES';
	     	}
	     	
	     }
  		$datavalues = array('seller_status' => $seller_status , 'rejection_reason' => $rejection_reason , 'bill_of_order' => $bill_of_order1, 'reduced' => $reduced);
     	$this->session->set_tempdata('success', ' Order Details Updated Successfully !', 5);
     	$data = $this->crud_model->update('tbl_orders',$datavalues,'order_id',$order_id);
     	redirect(base_url('view_order_admin/'.$order_id));
	}
	public function pro_reports()
	{
		$this->load->view('admin/pro_reports');
	}
	public function get_rows()
    {
    	$sdate = $this->input->post("start_date");
    	if(!empty($sdate))
    	{
			$edate = $this->input->post("end_date");
			$order_type = $this->input->post("type");
			$query1="";
			if($order_type != 'all')
			{
				$query1=" and t1.seller_status in('".$order_type."')";
			}
	        // $query ="SELECT t2.pro_name,t3.category_name,t1.quantity_in_no,t1.amount,t1.date_of_order FROM tbl_orders as t1 INNER join tbl_products as t2 on t1.product_id = t2.product_id INNER join tbl_category as t3 on t3.cat_id = t2.cat_id where (t1.date_of_order >= $sdate || t1.date_of_order <= $edate ) $query1";
	        $query ="SELECT t2.pro_name,t3.category_name,t1.quantity_in_no,t1.amount,t1.date_of_order FROM tbl_orders as t1 INNER join tbl_products as t2 on t1.product_id = t2.product_id INNER join tbl_category as t3 on t3.cat_id = t2.cat_id where Date(CONCAT( SUBSTRING(date_of_order,1, 4) , '-', SUBSTRING( date_of_order, 6, 2 ) , '-', SUBSTRING(date_of_order, 9, 2 ))) >= date('$sdate') and Date(CONCAT( SUBSTRING(date_of_order,1, 4) , '-', SUBSTRING( date_of_order, 6, 2 ) , '-', SUBSTRING(date_of_order, 9, 2 ))) <= date('$edate') $query1";
	        $result = $this->db->query($query);
	        $data['orders'] = $result->result();
	        $data['sdate'] = $sdate;
	        $data['edate'] = $edate;
	        $data['order_type'] = $order_type;
	        
	        if(count($data['orders']) > 0)
	        {
	        	$data['query_given'] = $this->db->last_query();
	        	$this->session->set_tempdata('success', ' Reports Generated Successfully !', 5);
	        }
	        else
	        {
	        	$data['query_given']='';
	        	$this->session->set_tempdata('success', ' No Order Done Given Dates !', 5);
	        }
	        $this->load->view('admin/pro_reports',$data);
	    }
	    else
	    {
	    	redirect(base_url('pro_reports'));
	    }
    }
    public function get_rows_pdf()
	{
		$query1 = $this->input->post("query");
		$data['sdate'] = $this->input->post("sdate");
		$data['edate'] = $this->input->post("edate");
		$data['order_type'] = $this->input->post("order_type");
		$query ="$query1";
	    $result = $this->db->query($query);
	    $data['orders'] = $result->result();
		$this->load->view('admin/get_rows_pdf',$data);
		$html = $this->output->get_output(); // Get output html
        // $html = "hi"; // Get output html
        $this->load->library('pdf'); // Load pdf library
        $this->dompdf->loadHtml($html); // Load HTML content
        $this->dompdf->setPaper('A4', 'landscape'); // potrait(Optional) Setup the paper size and orientation
        $this->dompdf->render(); // Render the HTML as PDF
        $this->dompdf->stream("orders.pdf", array("Attachment"=>0)); // Output the generated PDF (1 = download and 0 = preview)
	}
	// delete unwanted img
	public function delete_img()
	{
		$tbl_names = array("tbl_products=>pro_img1,pro_img2,pro_img3,pro_img4,des_img1,des_img2,des_img3,des_img4","tbl_category=>cat_img","tbl_login=>company_logo,company_app_doct,photo","tbl_orders=>bill_of_order,feedback_img1,feedback_img2,feedback_img3");
		$temp ="";
		foreach ($tbl_names as $key => $value)
		{
			$get_value= explode("=>", $value);
			if(!empty($get_value[0]))
			{
				$table_name = $get_value[0];
				if($get_value[1])
				{
					$get_clm_names= explode(",", $get_value[1]);
					foreach ($get_clm_names as $key => $value1)
					{
						$data['clms_nams'] = $this->db->query("SELECT group_concat(DISTINCT $value1) as clm_nams FROM $table_name")->result();
						if(!empty($data['clms_nams']) && $data['clms_nams'][0]->clm_nams)
						{
							if(!empty($temp))
							{
								$temp .= ",".$data['clms_nams'][0]->clm_nams;
							}
							else
							{
								$temp .= $data['clms_nams'][0]->clm_nams;
							}
						}
					}
				}
			}
		}
		$get_in_photo = explode(",",$temp);
		$modules['module_files'] = $this->dir_to_array('uploads');
		foreach ($modules['module_files'] as $key => $value) {
			$get_foldername = explode("/",$value);
			if(in_array($get_foldername[1],$get_in_photo))
			{
				// echo $value;
			}
			else
			{
				$Your_file_path =$value;
				unlink($Your_file_path);
			}
		}
		$this->session->set_tempdata('success', ' Deleted unwanted pictures !', 5);
		redirect(base_url('product_view'));
		
	}
	public function dir_to_array($dir, $separator = DIRECTORY_SEPARATOR, $paths = 'relative') 
{
    $result = array();
    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
        if (!in_array($value, array(".", "..")))
        {
            if (is_dir($dir . $separator . $value))
            {
                $result[$value] = $this->dir_to_array($dir . $separator . $value, $separator, $paths);
            }
            else
            {
                if ($paths == 'relative')
                {
                    $result[] = $dir . '/' . $value;                    
                }
                elseif ($paths == 'absolute')
                {
                    $result[] = base_url() . $dir . '/' . $value;
                }
            }
        }
    }
    return $result;
} 
	// delete unwanted img end

//coupon code code
public function coupon_code()
{
	$customer_id = $this->session->userdata('customer_id');
	$datavalues = array('customer_id' => $customer_id);
	$data['coupon_code'] = $this->crud_model->selectquery_array('tbl_coupon_code',$datavalues);
	$this->load->view('seller/coupon_code',$data);
}
public function coupon_code_add()
{
	    $customer_id = $this->session->userdata('customer_id');
		$coupon_type = $this->input->post("coupon_type");
		$percentage = $this->input->post("percentage");
		$maximum_amount = $this->input->post("maximum_amount");
		$valid_date = $this->input->post("valid_date");
		$data = array('coupon_type' => $coupon_type , 'percentage' => $percentage , 'maximum_amount' => $maximum_amount, 'valid_date' => $valid_date, 'customer_id' => $customer_id);

		$data['fetch_data'] = $this->crud_model->selectquery_array('tbl_coupon_code',$data);
		if(count($data['fetch_data']) > 0)
		{
		   $this->session->set_tempdata('success', 'Sub Category Already Exsits !', 5);
		}
		else
		{
		   $datavalues = array('coupon_type' => $coupon_type , 'percentage' => $percentage , 'maximum_amount' => $maximum_amount, 'valid_date' => $valid_date, 'customer_id' => $customer_id);
			$data = $this->crud_model->insert('tbl_coupon_code',$datavalues);
			$this->session->set_tempdata('success', 'Coupon Code Added !', 5);
		}
		redirect(base_url('coupon_code'));
}
public function coupon_code_edit()
{
	    $coupon_id = $this->uri->segment('2');
		$customer_id = $this->session->userdata('customer_id');
		$query = $this->db->get_where("tbl_coupon_code", array('coupon_id'=>$coupon_id,'coupon_id'=>$customer_id));
		$data['edit_fetch_data'] = $query->result();
		if(!empty($data['edit_fetch_data']))
		{
			$this->load->view('seller/coupon_code',$data);
		}
		else
		{
			$this->session->set_tempdata('success_mesg', 'Coupon Code Not Yours !', 5);
			redirect(base_url('coupon_code'));
		}
}
public function coupon_code_update()
{
	    $customer_id = $this->session->userdata('customer_id');
		$coupon_id = $this->input->post("coupon_id");
		$coupon_type = $this->input->post("coupon_type");
		$percentage = $this->input->post("percentage");
		$maximum_amount = $this->input->post("maximum_amount");
		$valid_date = $this->input->post("valid_date");
		$data = array('coupon_type' => $coupon_type , 'percentage' => $percentage , 'maximum_amount' => $maximum_amount, 'valid_date' => $valid_date, 'customer_id' => $customer_id);

		$data['fetch_data'] = $this->crud_model->selectquery_array('tbl_coupon_code',$data);
		if(count($data['fetch_data']) > 0)
		{
		   $this->session->set_tempdata('success_mesg', 'Coupon Code Already Exsits !', 5);
		}
		else
		{
		   $datavalues = array('coupon_type' => $coupon_type , 'percentage' => $percentage , 'maximum_amount' => $maximum_amount, 'valid_date' => $valid_date, 'customer_id' => $customer_id);
		   $data = $this->crud_model->update('tbl_coupon_code',$datavalues,'coupon_id',$coupon_id);
			$this->session->set_tempdata('success_mesg', 'Coupon Code Updated !', 5);
		}
		redirect(base_url('coupon_code'));
}
//coupon code code
public function pro_reports2()
	{
		$this->load->view('admin/pro_reports2');
	}
	public function get_rows1()
    {
    	$year = $this->input->post("year");
    	$month = $this->input->post("month");
    	$get_concate = $year."-".$month."-";
    	if(!empty($month) && !empty($year))
    	{
			//$edate = $this->input->post("end_date");
			//$order_type = $this->input->post("type");
			$query1="";
			// if($order_type != 'all')
			// {
			// 	$query1=" and t1.seller_status in('".$order_type."')";
			// }
	        // $query ="SELECT t2.pro_name,t3.category_name,t1.quantity_in_no,t1.amount,t1.date_of_order FROM tbl_orders as t1 INNER join tbl_products as t2 on t1.product_id = t2.product_id INNER join tbl_category as t3 on t3.cat_id = t2.cat_id where (t1.date_of_order >= $sdate || t1.date_of_order <= $edate ) $query1";
	        $query ="SELECT t2.pro_name,t2.product_id FROM tbl_orders as t1 INNER join tbl_products as t2 on t1.product_id = t2.product_id where date_of_order like'%$get_concate%'";
	        $result = $this->db->query($query);
	        $data['payment_data'] = $result->result();
	        $data['year'] = $year;
	        $data['month'] = $month;
	        
	        if(count($data['payment_data']) > 0)
	        {
	        	$data['query_given'] = $this->db->last_query();
	        	$this->session->set_tempdata('success', ' Reports Generated Successfully !', 5);
	        }
	        else
	        {
	        	$data['query_given']='';
	        	$this->session->set_tempdata('success', ' No Order Done Given Dates !', 5);
	        }
	        $this->load->view('admin/pro_reports2',$data);
	    }
	    else
	    {
	    	redirect(base_url('pro_reports2'));
	    }
    }
    public function get_rows_pdf2()
	{
		$query1 = $this->input->post("query");
		$data['year'] = $this->input->post("year");
		$data['month'] = $this->input->post("month");
		$query ="$query1";
	    $result = $this->db->query($query);
	    $data['payment_data'] = $result->result();
		$this->load->view('admin/get_rows_pdf2',$data);
		$html = $this->output->get_output(); // Get output html
        // $html = "hi"; // Get output html
        $this->load->library('pdf'); // Load pdf library
        $this->dompdf->loadHtml($html); // Load HTML content
        $this->dompdf->setPaper('A4', 'landscape'); // potrait(Optional) Setup the paper size and orientation
        $this->dompdf->render(); // Render the HTML as PDF
        $this->dompdf->stream("orders.pdf", array("Attachment"=>0)); // Output the generated PDF (1 = download and 0 = preview)
	}
}
