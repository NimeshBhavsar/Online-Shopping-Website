<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Order Invoice</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
	<style type="text/css">
.width_own{width: 30%;}
.logo_own{width: 60px;height: 60px;float: right;margin-right: 110px;}
.logo_own1{width: 200px;height: 100px;float: left;margin-left: 00px;}
.sign_own{float: right;margin-right: 60px;}
#mytable1,#mytable{border: 0px solid #fff!important;}
.full_border_own{border: 1px solid #ddd!important;}
.border_top_own{border-bottom: 1px solid #ddd!important;}
.border_lr_own{border-left: 1px solid #ddd!important;border-right: 1px solid #ddd!important;}
#mytable1{text-align:center!important;}
.text_left{text-align:left!important;}
.text_right{text-align:right!important;}
.log_text_onw{text-align: left!important;margin-left: 40px;}
#mytable tr td{padding: 5px;}
#mytable1 tr th,td{padding: 10px;}
</style>
</head>
<body>
	<div class="container-fluid mt-5">
		<?php $datavalues = array('customer_id' => $order_data[0]->seller_id);
              $get_seller = get_data_array('tbl_login',$datavalues);
              $datavalues1 = array('customer_id' => $order_data[0]->customer_id);
              $get_customer = get_data_array('tbl_login',$datavalues1);
              $datavalues12 = array('product_id' => $order_data[0]->product_id);
              $get_product_data = get_data_array('tbl_products',$datavalues12);
		?>
		<table class="table table-responsive" id="mytable">
			<tr class="border_top_own" >
				<td class="width_own" style="font-size:30px;font-weight: bold;border-bottom: 1px solid #ddd;">Tax Invoice</td>
				<td class="border_lr_own" style="border-bottom: 1px solid #ddd;">Order Id: <b><?php echo $order_data[0]->tracking_id;?></b><br> Order Date: <b><?php echo $order_data[0]->date_of_order;?></b></td>
				<td class="border_lr_own" style="border-bottom: 1px solid #ddd;">Invoice No: <b><?php echo"FACEGB2".rand(10000,999999);?></b><br> Invoice Date: <b><?php echo $order_data[0]->shipped_date;?></b></td>
			</tr>
			<tr>
				<td><b>Sold By</b><br><?php echo $get_seller[0]->address;?><br><?php echo $get_seller[0]->city." - ".$get_seller[0]->country." - ".$get_seller[0]->pincode;?></td>
				<td><b>Shipping Address</b><br><?php echo $get_customer[0]->address;?><br><?php echo $get_customer[0]->city." - ".$get_customer[0]->country." - ".$get_customer[0]->pincode;?></td>
				<td><b>Billing Address</b><br><?php echo $get_customer[0]->address;?><br><?php echo $get_customer[0]->city." - ".$get_customer[0]->country." - ".$get_customer[0]->pincode;?></td>
			</tr>
		</table>
		<table class="table table-responsive" id="mytable1"> 
			<tr class="">
				<th style="border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;">Product</th>
				<th style="border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;">Qty</th>
				<th style="border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;">MRP(1P)</th>
				<th style="border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;">Rate(1P)</th>
				<th style="border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;">Discount</th>
				<th style="border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;border-right: 1px solid #ddd;">Total</th>
			</tr>
			<tr class="border_lr_own">
				<td class="text_left"><?php echo $get_product_data[0]->pro_name;?></td>
				<td><?php echo $order_data[0]->quantity_in_no;?></td>
				<td>₹ <?php echo $order_data[0]->amount+$order_data[0]->offer_amount;?></td>
				<td>₹ <?php echo $order_data[0]->amount;?></td>
				<td>₹ <?php echo $order_data[0]->quantity_in_no*$order_data[0]->offer_amount;?></td>
				<td>₹ <?php echo $order_data[0]->quantity_in_no*$order_data[0]->amount; ?></td>
			</tr>
			<tr style="border-bottom: 1px solid #000;border-right: 1px solid #ddd;">
				<td style="border-bottom: 1px solid #ddd;"></td>
				<td style="border-bottom: 1px solid #ddd;">Shipping Charge</td>
				<td style="border-bottom: 1px solid #ddd;">0</td>
				<td style="border-bottom: 1px solid #ddd;">0</td>
				<td style="border-bottom: 1px solid #ddd;">0</td>
				<td style="border-bottom: 1px solid #ddd;border-right: 1px solid #ddd;">0</td>
			</tr>
			<tr class="full_border_own">
				<td colspan="2" style="border-bottom: 1px solid #ddd;" class="text_left"><b>TOTAL QTY: <?php echo $order_data[0]->quantity_in_no;?></b></td>
				<td colspan="2" style="border-bottom: 1px solid #ddd;" class="text_left"><b>Payment Type: <?php echo $order_data[0]->payment_type;?></b></td>
				<td colspan="2" class="text_right" style="border-bottom: 1px solid #ddd;"><b>TOTAL PRICE: ₹ <?php echo $order_data[0]->quantity_in_no*$order_data[0]->amount;?></b></td>
			</tr>
			<tr class="text_left">
				<td colspan="7"><b>Seller Registered Address:</b><?php echo $get_seller[0]->address;?><br><?php echo $get_seller[0]->city." - ".$get_seller[0]->country." - ".$get_seller[0]->pincode;?>
				<br><b>Declaration</b><br>The goods sold are intended for end user consumption and not for resale.</td>
			</tr>
			<tr>
				<td  colspan="7">
					
					<?php 
              if (!empty($get_seller[0]->company_logo)) { 
                $photo=$get_seller[0]->company_logo;
                $url = "http://localhost/others/FinalProjectIWP/uploads/".$photo;
                $imageFileType = strtolower(pathinfo($url,PATHINFO_EXTENSION));
                $image_base64 = base64_encode(file_get_contents($url));
                $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
               }
               ?>
               <img src="<?php echo $image; ?>" class="logo_own">
					<br>
					<br>
					<br>
					<span class="sign_own"><?php echo $get_seller[0]->user_name; ?><br>Authorized Signature</span>

				</td>
			</tr>
			<tr>
				<td  colspan="7" class="log_text_onw">

					<span >E. & O.E.</span>
					<br>
					<!-- <img src="./oslogo.png" class="logo_own1"> -->
					<img class="logo_own1" src="data:image/png;base64,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" />

				</td>
			</tr>
		</table>
		
	</div>

</body>
</html>

