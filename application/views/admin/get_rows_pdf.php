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
                      		<th colspan="2">Start Date : <?php echo $sdate; ?></th>
                      		<th colspan="2">End Date : <?php echo $edate; ?></th>
                      		<th colspan="2">Order Type : <?php echo $order_type; ?></th>
                      	</tr>
                        <tr>
                          <th>Sl. No.</th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Category</th>
                          <th>Quantity</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php 
                        if(!empty($orders))
                        {
                          foreach ($orders as $key => $value) { ?>
                            <tr>
                              <td style="text-align: center;"><?php echo ++$key; ?></td>
                              <td><?php echo $value->pro_name; ?></td>
                              <td style="text-align: center;"><?php echo $value->amount; ?></td>
                              <td style="text-align: center;"><?php echo $value->category_name; ?></td>
                              <td style="text-align: center;"><?php echo $value->quantity_in_no; ?></td>
                              <td style="text-align: center;"><?php echo $value->date_of_order; ?></td>
                            </tr>
                          <?php } } ?>
                        
                      </tbody>
                    </table>

</body>
</html>