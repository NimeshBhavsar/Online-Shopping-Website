<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('form', 'url','common_helper'));
	    $this->load->model('crud_model');
	    admin_login();
    }
	public function customer_home()
	{
		$this->load->view('customer/customer_home');
	}
	public function orders_customer()
	{
		$customer_id = $this->session->userdata('customer_id');
		$datavalues = array('customer_id' => $customer_id);
		$data['order_data'] = $this->crud_model->selectquery_array('tbl_orders',$datavalues);
		$data['header_name'] = 'View All Shipped Orders';
		$this->load->view('seller/orders',$data);
	}
	public function view_order_customer()
	{
		$customer_id = $this->session->userdata('customer_id');
		$order_id = $this->uri->segment('2');
		$datavalues = array('customer_id' => $customer_id , 'order_id' => $order_id);
		$data['order_data'] = $this->crud_model->selectquery_array('tbl_orders',$datavalues);
		if(count($data['order_data']) == 1)
		{
			$where_cond1 = array('customer_id' => $customer_id ,'order_id >'=> $order_id);
			$this->db->select('order_id');
            $data['next'] = $this->db->limit(1)->order_by("order_id ASC")->get_where("tbl_orders", $where_cond1)->result();
            $where_cond1 = array('customer_id' => $customer_id ,'order_id <'=> $order_id);
            $this->db->select('order_id');
                $data['previous'] = $this->db->limit(1)->order_by("order_id desc")->get_where("tbl_orders", $where_cond1)->result();
			$this->load->view('customer/order_update_customer',$data);
		}
		else
		{
			$this->session->set_tempdata('success', 'sorry for the trouble !', 5);
			redirect(base_url('orders')); 
		}
	}
	public function order_update_customer()
	{
		$customer_id = $this->session->userdata('customer_id');
	     $feedback = $this->input->post("feedback");
	     $feedback_cmt = $this->input->post("feedback_cmt");
	     $stars_in_number = $this->input->post("stars_in_number");
	     $order_id = $this->input->post("product_id");
	     $query = $this->db->get_where("tbl_orders",array('order_id' => $order_id));
     	$data['attachment_data'] = $query->result();
	     $feedback_img1 = empty($_FILES['feedback_img1']['name']) ? '' : $_FILES['feedback_img1']['name'];
	     if(!empty($feedback_img1)) $feedback_img11 = file_upload_img($feedback_img1, 'feedback_img1'); else $feedback_img11 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->feedback_img1;
	     $feedback_img2 = empty($_FILES['feedback_img2']['name']) ? '' : $_FILES['feedback_img2']['name'];
	     if(!empty($feedback_img2)) $feedback_img21 = file_upload_img($feedback_img2, 'feedback_img2'); else $feedback_img21 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->feedback_img2;
	     $feedback_img3 = empty($_FILES['feedback_img3']['name']) ? '' : $_FILES['feedback_img3']['name'];
	     if(!empty($feedback_img3)) $feedback_img31 = file_upload_img($feedback_img3, 'feedback_img3'); else $feedback_img31 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->feedback_img3;
     	$datavalues = array('feedback' => $feedback , 'feedback_cmt' => $feedback_cmt , 'stars_in_number' => $stars_in_number , 'feedback_img1' => $feedback_img11 , 'feedback_img2' => $feedback_img21 , 'feedback_img3' => $feedback_img31, 'date_of_received' => date('Y-m-d H:i:s'), 'cutomer_status' => 'SUCCESS', 'seller_status' => 'SUCCESS');
     $this->session->set_tempdata('success', ' Product Review Updated !', 5);
     $data = $this->crud_model->update('tbl_orders',$datavalues,'order_id',$order_id);
     redirect(base_url('view_order_customer/'.$order_id));
	}
	public function wishlist_customer()
	{
		$customer_id = $this->session->userdata('customer_id');
		$datavalues = array('customer_id' => $customer_id);
		$data['wishlist'] = $this->crud_model->selectquery_array('tbl_wishlist',$datavalues);
		$this->load->view('customer/wishlist_customer',$data);
	}
	public function delete_wishlist()
	{
		$customer_id = $this->session->userdata('customer_id');
		$wishlist_id = $this->uri->segment('2');
		$datavalues = array('customer_id' => $customer_id , 'wishlist_id' => $wishlist_id);
		$data['wishlist'] = $this->crud_model->selectquery_array('tbl_wishlist',$datavalues);
		if(count($data['wishlist'])==1)
		{
			$query = $this->db->query("DELETE from `tbl_wishlist` where wishlist_id ='".$wishlist_id."'");
			$this->session->set_tempdata('success', ' Product Wishlist Removed !', 5);
		}
		else
		{
			$this->session->set_tempdata('success', ' Sorry for the trouble !', 5);
		}
		redirect(base_url('wishlist_customer'));
	}
	public function pro_qes_ans_customer()
	{
		$customer_id = $this->session->userdata('customer_id');
		$datavalues = array('customer_id' => $customer_id);
		$data['question_data'] = $this->crud_model->selectquery_array('tbl_product_qes_ans',$datavalues);
		$data['header_name'] = 'View All Product Question And Answers';
		$this->load->view('customer/pro_qes_ans_customer',$data);
	}
	public function cancel_order()
	{
		$customer_id = $this->session->userdata('customer_id');
		$order_id = $this->uri->segment('2');
		$datavalues = array('cutomer_status' => 'CANCEL','seller_status' => 'CANCEL');
		$data = $this->crud_model->update('tbl_orders',$datavalues,'order_id',$order_id);
		$this->session->set_tempdata('success', ' Order Canceled Successfully !', 5);
		redirect(base_url('view_order_customer/'.$order_id));
	}
	public function down_invocie()
	{
		$customer_id = $this->session->userdata('customer_id');
		$role = $this->session->userdata('role');
		$clm_customer = "";
		if($role == 'customer')
		{
			$clm_customer ='customer_id';
		}
		else
		{
			$clm_customer ='seller_id';
		}
		$order_id = $this->uri->segment('2');
		$datavalues = array($clm_customer => $customer_id , 'order_id' => $order_id);
		$data['order_data'] = $this->crud_model->selectquery_array('tbl_orders',$datavalues);
		if(count($data['order_data']) > 0)
		{
			$this->load->view('customer/down_invocie',$data);
			// if(1):
	        $html = $this->output->get_output(); // Get output html
	        // $html = "hi"; // Get output html
	        $this->load->library('pdf'); // Load pdf library
	        $this->dompdf->loadHtml($html); // Load HTML content
	        $this->dompdf->setPaper('A3', 'landscape'); // potrait(Optional) Setup the paper size and orientation
	        $this->dompdf->render(); // Render the HTML as PDF
	        $this->dompdf->stream("ONE.pdf", array("Attachment"=>0)); // Output the generated PDF (1 = download and 0 = preview)
	        // endif;
		}
		else
		{
			$data['category'] = $this->db->get('tbl_category')->result();
			$data['var'] = "somthing worng please try again";
			$this->load->view('website/error',$data);
		}
	}
	public function user_chatbot()
	{
		$data['header_name'] = 'Chat Bot';
		$this->load->view('customer/user_chatbot',$data);
	}
	public function check_bot_msg()
	{
		$customer_id = $this->session->userdata('customer_id');
		$key_words = $this->input->post("val");
		// $key_words = "hi";
		$data['get_questions'] = $this->db->query("SELECT * FROM `tbl_d_msg` where key_words like '%".$key_words."%'")->result();
		
		if(!empty($data['get_questions']))
		{
			$get_response_1 = explode("<==>",$data['get_questions'][0]->response);
			foreach($get_response_1 as $key => $value)
			{
				echo"<div class='msg user'><span class='avtr'><figure style='background-image: url(https://mrseankumar25.github.io/Sandeep-Kumar-Frontend-Developer-UI-Specialist/images/avatar.png)'></figure></span><span class='responsText responsText1' >".$value."</span></div>";
			}
			echo"<br>";
			$get_keywords_1 = explode(",",$data['get_questions'][0]->question_search);
			
			foreach($get_keywords_1 as $key => $value)
			{
				?>
				<span class="questions" onclick="myFunction('<?php echo $value; ?>')"><?php echo $value; ?></span>
				<?php
			}
			echo"<br><br>";
		}
		else
		{
			echo"<div class='msg user'><span class='avtr'><figure style='background-image: url(https://mrseankumar25.github.io/Sandeep-Kumar-Frontend-Developer-UI-Specialist/images/avatar.png)'></figure></span><span class='responsText responsText1'>I con't understand this</span></div>";
		}
	}
}
