<?php $this->load->view('include/side_bar'); ?>
    <div class="main-panel">
<?php $this->load->view('include/header.php'); ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                  <div class="card-icon">
                    <i class="material-icons">widgets</i>
                  </div>
                  <h4 class="card-title">Get Your Order Reports - Month And Year Wise
                    <small class="category"></small>
                  </h4>
                  <p class="invalid_msg text-center text-white font-weight-bold bg-info"><?php echo $this->session->tempdata('success'); $this->session->unset_tempdata('success') ?></p>
                </div>
                <div class="card-body">
                  <div class="row">
            <div class="col-md-12">
              <div class="card">
                <p class="invalid_msg text-center text-white font-weight-bold bg-info"><?php echo $this->session->tempdata('success_mesg'); $this->session->unset_tempdata('success_mesg') ?></p>
                <div class="card-body">
                  <div id="overlayer"></div>
                  <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <form method="post" action="<?php echo base_url()?>Admin_controller/get_rows1">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Select Month</label>
                      <?php $month_array = array('01','02','03','04','05','06','07','08','09','10','11','12'); ?>
                      <select class="form-control" name="month" id="month" required>
                        <option value="">Select</option>
                        <?php foreach ($month_array as $key => $value): ?>
                          <option value="<?php echo $value; ?>" <?php if(!empty($month) && $month == $value){ echo"selected"; } ?>><?php echo $value; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    
                    <div class="col-md-4">
                      <label>Select Year</label>
                      <select class="form-control" name="year" id="year">
                        <option value="">select</option>
                        <?php 
                        $year1=2023;
                          for ($i=0; $i < 10; $i++) { 
                            $temp = $year1--;
                            if(!empty($year) && $year == $temp){ echo"<option value='".$temp."' selected>".$temp."</option>"; }
                            else
                            {
                              echo"<option value='".$temp."'>".$temp."</option>";
                            }
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <input type="submit" class="btn btn-rose">
                    </div>

                  </div>
                  </form>
                  <?php if(!empty($query_given)){ ?>
                  <form method="post" action="<?php echo base_url()?>Admin_controller/get_rows_pdf2" class="query_hidden" target="_blank">
                  <div class="row">
                      <div class="col-md-4 ">
                      
                        <input type="hidden" name="query" value="<?php echo $query_given; ?>">
                        <input type="hidden" name="year" value="<?php echo $year; ?>">
                        <input type="hidden" name="month" value="<?php echo $month; ?>">
                      

                      <input type="submit" class="btn btn-success" value="Get Pdf">
                    
                    </div>                    
                  </div>
                  </form>
                  <?php } ?>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
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
                      <tfoot>
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
                      </tfoot>
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
                  </div>
                </div>
                <!-- end content-->
              </div>
              <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
          </div>
          <span class="loader">
  <span class="loader-inner"></span>
</span>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
      </div>


     <?php $this->load->view('include/footer'); ?>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/admin_assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url()?>assets/admin_assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url()?>assets/admin_assets/js/material-dashboard.min.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url()?>assets/admin_assets/demo/demo.js"></script>
  <script src="<?php echo base_url()?>assets/admin_assets/js/plugins/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin_assets/js/zoomjs/zoomsl.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <!-- Sharrre libray -->
  <script src="<?php echo base_url()?>assets/admin_assets/demo/jquery.sharrre.js"></script>

</body>

</html>

  <script>
    $(document).ready(function() {
      $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search Product",
        }
      });

      var table = $('#datatable').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>
  <style type="text/css">
    .card-avatar1{width: 100px;height: 100px;}
    .modal-content{width: 150%;}
    .textarea_own{height: 200px !important;}
    #ld_image1{height: 450px;width: 300px;}
    .sub_img{height: 100px;width: 140px;float: left;margin: 10px;cursor: pointer;}
  </style>
  <style type="text/css">
  #overlayer {
  width:100%;
  height:100%;  
  position:absolute;
  z-index:1;
  background:#4a4a4a;
  display: none;
}
.loader {
  display: none;
  width: 30px;
  height: 30px;
  position: absolute;
  z-index:3;
  border: 4px solid #Fff;
  top: 50%;
  left: 50%;
  animation: loader 2s infinite ease;
}

.loader-inner {
  vertical-align: top;
  display: inline-block;
  width: 100%;
  background-color: #fff;
  animation: loader-inner 2s infinite ease-in;
}

@keyframes loader {
  0% {
    transform: rotate(0deg);
  }
  
  25% {
    transform: rotate(180deg);
  }
  
  50% {
    transform: rotate(180deg);
  }
  
  75% {
    transform: rotate(360deg);
  }
  
  100% {
    transform: rotate(360deg);
  }
}

@keyframes loader-inner {
  0% {
    height: 0%;
  }
  
  25% {
    height: 0%;
  }
  
  50% {
    height: 100%;
  }
  
  75% {
    height: 100%;
  }
  
  100% {
    height: 0%;
  }
}
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $('.find_row').on('click',function(){
        $(".loader").fadeIn();
          $("#overlayer").fadeIn();
      $.ajax({
            url: '<?php echo base_url()?>Report_view_controller/get_rows',
            data: {'one': 'one'},
            type: 'POST',
            success: function(data) {
                response = jQuery.parseJSON(data);
                $.each(response, function(i, item) {
              $('#mytable > tbody:last-child').append('<tr><td>'+ response[i].email_id +'</td><td>'+ response[i].mobile_no +'</td></tr>');
          });
          $(".loader").delay(1000).fadeOut("slow");
            $("#overlayer").delay(1000).fadeOut("slow");
            }             
        });
    });
  });
</script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#edate').attr('min',$('#sdate').val());
    $('#sdate').change(function(){
      $('.query_hidden').css('display','none');
         var start = $('#sdate').val();
         var end = $('#edate').val();

         var startDay = new Date(start);
         var endDay = new Date(end);
         var millisecondsPerDay = 1000 * 60 * 60 * 24;

         var millisBetween = endDay.getTime() - startDay.getTime();
         var days = millisBetween / millisecondsPerDay;
         if(days < 0)
         {
          $('#edate').val($('#sdate').val());
         }
          $('#edate').attr('min',$('#sdate').val());
    });
  });
</script>

<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('.find_row').on('click',function(){
      event.preventDefault();
      $('#datatables tbody').empty();

        var sdate = $('#sdate').val();
        var edate = $('#edate').val();
        var order_type = $('#order_type').val();
        // console.log(order_type);
        $(".loader").fadeIn();
          $("#overlayer").fadeIn();
      $.ajax({
            url: '<?php //echo base_url()?>Admin_controller/get_rows',
            data: {'sdate': sdate,'edate': edate,'order_type': order_type},
            type: 'POST',
            success: function(data) {
              // console.log(data);
                response = jQuery.parseJSON(data);
                $.each(response, function(i, item) {
              $('#datatables > tbody:last-child').append('<tr><td>'+ i +'</td><td>'+ response[i].pro_name +'</td><td>'+ response[i].amount +'</td><td>'+ response[i].category_name +'</td><td>'+ response[i].quantity_in_no +'</td><td>'+ response[i].date_of_order +'</td></tr>');
          });
          $(".loader").delay(1000).fadeOut("slow");
            $("#overlayer").delay(1000).fadeOut("slow");
            }             
        });
    });
  });
</script> -->
  