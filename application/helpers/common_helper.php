<?php
	function admin_login()
	{
		$CI = get_instance();
		$role = $CI->session->userdata('role');
		if($role == 'admin')
		{
		}
		else if($role == 'customer')
		{
		}
		else if($role == 'seller')
		{
		}
		else
		{
			redirect(base_url("logout"));
		}
	}
	function file_upload_img($file_name, $input_name)
	{
	    $CI = get_instance();
	    $config['upload_path'] = "uploads";  //$path
	    $config['allowed_types'] = 'jpg|jpeg|pdf|png';
	    $config['file_name'] = strtolower(rand(100000, 999999).'_'.$input_name);
	    $CI->load->library('upload', $config); 
	    $CI->upload->initialize($config);
	    if (!$CI->upload->do_upload($input_name))
	        $error = array('error' => $CI->upload->display_errors());
	    else
	    {
	         $data1 = $CI->upload->data();
	         $result = $data1['file_name'];
	         return $result;
	    }    
	}
	function get_data_value($tbl_name,$where_clm,$where_value,$return_value)
	{
	    $CI = get_instance();
	    $select_value = explode(",", $return_value);
	    $CI->db->select($select_value);
	    $CI->db->where($where_clm, $where_value);
	    $query = $CI->db->get($tbl_name);
	    $data = $query->result();
	    $st = '';
	    if(!empty($data)){
	    	foreach ($select_value as $key => $value) {
	    		if($key == 0)
	    		{
	    			$st .= $data[0]->$value; 
	    		}
	    		else
	    		{
	    			$st .=" - ".$data[0]->$value;
	    		}
	    	}
	    }else{
	        $st = '';
	    }
	    return $st;
	}
	function get_last_value($payment_id,$gym_mem_id_2)
	{
		$CI = get_instance();
	    $CI->db->select('payment_id');
	    $CI->db->where('gym_mem_id_2', $gym_mem_id_2);
	    $CI->db->order_by("expiry_date DESC");
	    $CI->db->limit(1);
	    $query = $CI->db->get('tbl_member_payment');
	    $data = $query->result();
	    if(!empty($data[0]->payment_id) && !empty($data))
	    {
	    	return $data[0]->payment_id;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_img_src($gym_mem_id)
	{
		$CI = get_instance();
	    $CI->db->select('photo');
	    $CI->db->where('gym_mem_id', $gym_mem_id);
	    $query = $CI->db->get('admin_profile');
	    $data = $query->result();
	    if(!empty($data[0]->photo) && !empty($data))
	    {
	    	return $data[0]->photo;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_value($tbl_name,$where_clm,$where_value,$select_value)
	{
		$CI = get_instance();
	    $CI->db->select($select_value);
	    $CI->db->where($where_clm, $where_value);
	    $query = $CI->db->get($tbl_name);
	    $data = $query->result();
	    if(!empty($data[0]->$select_value) && !empty($data))
	    {
	    	return $data[0]->$select_value;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	//
	function get_schedule_values($start_time,$day)
	{
		$CI = get_instance();
	    $CI->db->select("*");
	    $CI->db->where(array('time_start' => $start_time,'day'  => $day,'visible'  => 'YES'));
	    $query = $CI->db->get('tbl_assign_trainer');
	    $data['get_values'] = $query->result();
	    if(count($data['get_values']) == 1)
	    {
	    	return $data['get_values'];
	    }
	    else
	    {
	    	echo"";
	    }
	}
	//
	function get_value_1($tbl_name,$where_clm,$where_value,$select_value)
	{
		$CI = get_instance();
	    $CI->db->select($select_value);
	    $CI->db->where($where_clm, $where_value);
	    $query = $CI->db->get($tbl_name);
	    $data = $query->result();
	    if(!empty($data[0]->$select_value) && !empty($data))
	    {
	    	return count($data);
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_value_12($table_name,$sum_clm)
	{
		$CI = get_instance();
	    $CI->db->select_sum($sum_clm);
	    $query = $CI->db->get($table_name);
	    $data = $query->result();
	    if(!empty($data[0]->$sum_clm) && !empty($data))
	    {
	    	return $data[0]->$sum_clm;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_count($table_name,$datavalues,$select_value)
	{
		$CI = get_instance();
	    $CI->db->select($select_value);
	     $CI->db->where($datavalues);
	    $query = $CI->db->get($table_name);
	    $data = $query->result();
	    if(!empty($data))
	    {
	    	return count($data);
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_sum($table_name,$datavalues,$select_value)
	{
		$CI = get_instance();
	    $CI->db->select_sum($select_value);
	     $CI->db->where($datavalues);
	    $query = $CI->db->get($table_name);
	    $data = $query->result();
	    if(!empty($data[0]->$select_value) && !empty($data))
	    {
	    	return $data[0]->$select_value;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_rating($product_id)
	{
		$ratings = Array (1,2,3,4,5);
        $max = 0;$n = 0;
      	foreach ($ratings as $rate => $count) {
        	$datavaluestwo1 = array('product_id' => $product_id,'stars_in_number' => $count,'seller_status' => 'SUCCESS');
          $max += $count * get_count('tbl_orders',$datavaluestwo1,'product_id');
          $n += get_count('tbl_orders',$datavaluestwo1,'product_id');
      	}
      	if($max == 0 || $n == 0)
      	{
      		return 0;
      	}
      	else
      	{
      		return number_format((float)$max/$n, 1, '.', '');;
      	}
	}
	function get_stock($product_id)
	{
		$get_count_stock = get_value('tbl_stock_list','product_id',$product_id,'current_available');
        if($get_count_stock > 0)
        {
          if($get_count_stock < 10)
          {
            $aa="Hurry, Only a few left!";
          }
          else
          {
            $aa="";
          }
        }
        else
        {
          $aa="Temporarily Unavailable";
        }
        return $aa;
	}
	function get_data($tbl_name,$where_clm,$where_value)
	{
		$CI = get_instance();
	    $CI->db->select('*');
	    $CI->db->where($where_clm, $where_value);
	    $query = $CI->db->get($tbl_name);
	    $data = $query->result();
	    if(!empty($data))
	    {
	    	return $data;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_data_array($tbl_name,$where_clm)
	{
		  $CI = get_instance();
	    $CI->db->select('*');
	    $CI->db->where($where_clm);
	    $query = $CI->db->get($tbl_name);
	    $data = $query->result();
	    if(!empty($data))
	    {
	    	return $data;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_keywords()
	{
		  $CI = get_instance();
	    $CI->db->select('pro_keywords,pro_name');
	    $CI->db->where('status','YES');
	    $query = $CI->db->get('tbl_products');
	    $data['keywords'] = $query->result();
	    $key_words = "";
	    $my_arry = array();
	    $my_arry_one = array();
	    foreach ($data['keywords'] as $key => $value){
	    	$key_words .= ",".$value->pro_name;
	    	$my_arry_one = explode(",",$value->pro_keywords);
	    	foreach ($my_arry_one as $key => $value1) {

	    		if(in_array($value1,$my_arry))
		    	{

		    	}
		    	else
		    	{
		    		array_push($my_arry,$value1);
		    		$key_words .= ",".$value1;
		    	}
	    	}
	    	
	    	//
	    }
	    echo $key_words;
	}
	function get_sum1($table_name,$seller_id)
	{
		$CI = get_instance();
	    $data = $CI->db->query("SELECT SUM(quantity_in_no*amount) as amount_1 FROM $table_name where seller_status ='SUCCESS' and cutomer_status='SUCCESS' and seller_id='$seller_id'")->result();
	    if(!empty($data))
	    {
	    	return $data[0]->amount_1;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_sum2($table_name,$seller_id)
	{
		$CI = get_instance();
	    $data = $CI->db->query("SELECT SUM(quantity_in_no*amount) as amount_1 FROM $table_name where seller_status ='SUCCESS' and cutomer_status='SUCCESS' and seller_id !='$seller_id'")->result();
	    if(!empty($data))
	    {
	    	return $data[0]->amount_1;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_imgone($product_id)
	{
		$CI = get_instance();
	    $data = $CI->db->query("SELECT pro_img1 FROM `tbl_products` where product_id in('".$product_id."')")->result();
	    if(!empty($data))
	    {
	    	return $data[0]->pro_img1;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	
	
?>