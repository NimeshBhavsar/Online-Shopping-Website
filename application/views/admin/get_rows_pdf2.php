<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reports</title>
	<style type="text/css">
		#datatables thead tr th{text-align: center;}
		#datatables tr td{text-align: left;padding-left: 10px;}
		#datatables tr td,th{border: 1px solid #ccc;}
	</style>
</head>
<body>
	<h4 style="text-align:center;">ORDER DETAILS</h4>
	<table id="datatables" width="100%" style="width:100%;border-collapse: collapse;">
                      <thead>
                      	<tr>
                      		<th colspan="5">Month : <?php echo $month; ?></th>
                      		<th colspan="4">Year: <?php echo $year; ?></th>
                      		
                      	</tr>
                        <tr>
                          <th>Sl. No.</th>
                          <th>Product Name</th>
                          <th>Total Order</th>
                          <th>Order Complete</th>
                          <th>Order Pending</th>
                          <th>Order Shipped</th>
                          <th>Order Reject</th>
                          <th>Amount Earned</th>
                          <th>Pending Amount</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                        if(!empty($payment_data))
                        {
                        foreach ($payment_data as $key => $value) { ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo $value->pro_name; ?></td>
                            <?php
                            $datavaluestwo = array('product_id' => $value->product_id);
                            ?>
                            <td><?php echo get_count('tbl_orders',$datavaluestwo,'order_id'); ?></td>
                            <!--  -->
                            <?php
                            $datavaluestwo = array('product_id' => $value->product_id,'seller_status' => 'SUCCESS');
                            ?>
                            <td><?php echo get_count('tbl_orders',$datavaluestwo,'order_id'); ?></td>
                            <!--  -->
                            <?php
                            $datavaluestwo = array('product_id' => $value->product_id,'seller_status' => 'PENDING');
                            ?>
                            <td><?php echo get_count('tbl_orders',$datavaluestwo,'order_id'); ?></td>
                             <!--  -->
                            <?php
                            $datavaluestwo = array('product_id' => $value->product_id,'seller_status' => 'SHIPPED');
                            ?>
                            <td><?php echo get_count('tbl_orders',$datavaluestwo,'order_id'); ?></td>
                            <!--  -->
                            <?php
                            $datavaluestwo = array('product_id' => $value->product_id,'seller_status' => 'REJECTED');
                            ?>
                            <td><?php echo get_count('tbl_orders',$datavaluestwo,'order_id'); ?></td>
                             <!--  -->
                            <?php
                            $datavaluestwo = array('product_id' => $value->product_id,'seller_status' => 'SUCCESS');
                            ?>
                            <td><?php echo get_sum('tbl_orders',$datavaluestwo,'amount'); ?></td>
                             <!--  -->
                            <?php
                            $datavaluestwo = array('product_id' => $value->product_id,'seller_status !=' => 'SUCCESS');
                            ?>
                            <td><?php echo get_sum('tbl_orders',$datavaluestwo,'amount'); ?></td>
                        </tr>
                        <?php } 
                      } ?>
                        
                      </tbody>
                    </table>

</body>
</html>