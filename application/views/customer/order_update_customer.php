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
                    <i class="material-icons">add</i>
                  </div>
                  <h4 class="card-title">Update Order Details
                    <small class="category"></small>
                   
                    <?php if(!empty($next)){ ?><a href="<?php echo base_url()."view_order_customer/".$next[0]->order_id; ?>" class="btn btn-success" style="float: right;">Next</a> <?php } ?>
                    <?php if(!empty($previous)){ ?><a href="<?php echo base_url()."view_order_customer/".$previous[0]->order_id; ?>" class="btn btn-primary" style="float: right;">Previous</a> <?php } ?>
                    
                  </h4>
                  <p class="invalid_msg text-center text-white font-weight-bold bg-info"><?php echo $this->session->tempdata('success'); $this->session->unset_tempdata('success') ?></p>
                </div>
                <div class="card-body">
                  
                    <div class="row">
                      <div class="col-md-4">
                        <img src="<?php echo base_url()."uploads/".get_value('tbl_products','product_id',$order_data[0]->product_id,'pro_img1')."";?>" class="img_own">
                      </div>
                      <div class="col-md-8">
                        <table class="table table-responsive">
                          <tr>
                            <th>Order Id </th>
                            <th>:</th>
                            <th><?php echo $order_data[0]->tracking_id; ?></th>
                          </tr>
                          <tr>
                            <th>Product Name </th>
                            <th>:</th>
                            <td><a href="<?php echo base_url()."product_v/".$order_data[0]->product_id; ?>" target="_blank"><?php echo get_value('tbl_products','product_id',$order_data[0]->product_id,'pro_name'); ?></a></td>
                          </tr>
                          <tr>
                            <th>Price </th>
                            <th>:</th>
                            <td>₹<?php echo $order_data[0]->amount; ?></td>
                          </tr>
                          <tr>
                            <th>Discount in Price </th>
                            <th>:</th>
                            <td>₹<?php echo $order_data[0]->offer_amount; ?></td>
                          </tr>
                          <tr>
                            <th>Quantity</th>
                            <th>:</th>
                            <td><?php echo $order_data[0]->quantity_in_no; ?></td>
                          </tr>
                          <tr>
                            <th>Total Price</th>
                            <th>:</th>
                            <td>₹<?php echo $order_data[0]->amount*$order_data[0]->quantity_in_no; ?></td>
                          </tr>
                          <tr>
                            <th>Payment Type</th>
                            <th>:</th>
                            <td><?php echo $order_data[0]->payment_type; if($order_data[0]->payment_type == 'COD'){ echo" (Cash On Delivery)"; } ?></td>
                          </tr>
                           <tr>
                            <th>Customer Details</th>
                            <th>:</th>
                            <td><?php echo get_value('tbl_login','customer_id',$order_data[0]->customer_id,'user_name')."<br>".get_value('tbl_login','customer_id',$order_data[0]->customer_id,'email_id')."<br>".get_value('tbl_login','customer_id',$order_data[0]->customer_id,'mobile_no'); ?></td>
                          </tr>
                        </table>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label text-success ">
                            *The product status is - <?php echo $order_data[0]->seller_status; ?>
                          </label>
                          <?php if(!empty($order_data[0]->cutomer_status)&&$order_data[0]->cutomer_status =='CANCEL'){ ?>
                            <label class="form-check-label text-success">
                            *Order Canceled by Customer
                          </label>
                            <?php } ?>
                        </div>
                        <?php if(!empty($order_data[0]->seller_status)&&($order_data[0]->seller_status !='CANCEL' && $order_data[0]->seller_status !='SHIPPED' && $order_data[0]->seller_status !='REJECTED' && $order_data[0]->seller_status !='SUCCESS')&& $order_data[0]->cutomer_status =='PENDING'){ ?>
                         <div class="col-md-4">
                           <a href="<?php echo base_url()."cancel_order/".$order_data[0]->order_id?>" class="btn btn-rose">Cancel Order</a>
                         </div>
                       <?php } ?>
                      </div>
                      <?php if(!empty($order_data[0]->seller_status)&&$order_data[0]->seller_status =='SHIPPED'){ ?>
                      <div class="col-md-4">
                        <img src="<?php echo base_url()."uploads/".get_value('tbl_products','product_id',$order_data[0]->product_id,'pro_img2')."";?>"  class="img_own">
                      </div>
                      <div class="col-md-4 col-sm-4">
                          <h4 class="title">View Order Bill</h4>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <?php
                                  if (!empty($order_data[0]->bill_of_order) && strpos($order_data[0]->bill_of_order, '.pdf') !== false)
                                  { ?>
                                    <a href="<?php echo base_url()?>uploads/<?php echo $order_data[0]->bill_of_order; ?>" target="_blank" class="text-success">View Pdf document</a>

                               <?php   }else{
                                ?>
                                <a href="<?php echo base_url()?>uploads/<?php echo $order_data[0]->bill_of_order; ?>" target="_blank"><img <?php if(!empty($order_data) && !empty($order_data[0]->bill_of_order)){ ?> src="<?php echo base_url()?>uploads/<?php echo $order_data[0]->bill_of_order; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" <?php } ?> title="Click and View" class="own_img"></a>
                              <?php   }
                                ?>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                          <label for="rejection_reason" class="bmd-label-floating"> Reason for Order Rejections</label>
                          <div class="form-group">
                          <label class="bmd-label-floating"> If you not interested, simply skip. give none.</label>
                          <textarea class="form-control textarea_own1" rows="5" id="rejection_reason" name="rejection_reason" disabled><?php if(!empty($order_data) && $order_data[0]->rejection_reason){ echo $order_data[0]->rejection_reason; } ?></textarea>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-8">
                        </div>
                    </div>
                    <br>
                    <div class="clearfix"></div>
                    <hr>
                  <?php } ?>
                    <?php if(!empty($order_data) && ($order_data[0]->seller_status=='SHIPPED' || $order_data[0]->seller_status=='SUCCESS')){ ?>
                    <div class="card-header card-header-icon card-header-rose">
                      <div class="card-icon">
                        <i class="material-icons">add</i>
                      </div>
                      <h4 class="card-title">Ratings & Reviews
                        <small class="category"></small>                                   
                      </h4>
                      <p class="invalid_msg text-center text-white font-weight-bold bg-info"></p>
                    </div>
                    <form method="post" action="<?php echo base_url()?>order_update_customer" id="LoginValidation" enctype="multipart/form-data"> 
                      <div class="row">
                        <div class="col-md-12">
                          <span class="span_own">Rate this product</span>
                          <div class="star-rating">
  <input type="radio" id="5-stars" name="stars_in_number" value="5" <?php if(!empty($order_data[0]->stars_in_number) && $order_data[0]->stars_in_number =='5'){ echo"checked"; } ?> />
  <label for="5-stars" class="star">&#9733;</label>
  <input type="radio" id="4-stars" name="stars_in_number" value="4" <?php if(!empty($order_data[0]->stars_in_number) && $order_data[0]->stars_in_number =='4'){ echo"checked"; } ?> />
  <label for="4-stars" class="star">&#9733;</label>
  <input type="radio" id="3-stars" name="stars_in_number" value="3" <?php if(!empty($order_data[0]->stars_in_number) && $order_data[0]->stars_in_number =='3'){ echo"checked"; } ?> />
  <label for="3-stars" class="star">&#9733;</label>
  <input type="radio" id="2-stars" name="stars_in_number" value="2" <?php if(!empty($order_data[0]->stars_in_number) && $order_data[0]->stars_in_number =='2'){ echo"checked"; } ?> />
  <label for="2-stars" class="star">&#9733;</label>
  <input type="radio" id="1-star" name="stars_in_number" value="1" <?php if(!empty($order_data[0]->stars_in_number) && $order_data[0]->stars_in_number =='1'){ echo"checked"; } ?> />
  <label for="1-star" class="star">&#9733;</label>
</div>
                        </div>
                        <div class="col-md-12">
                          <span class="span_own">Review this product</span>
                          <textarea class="form-control about_me_type textarea_own1" id="feedback_cmt" name="feedback_cmt" required="true" aria-required="true" aria-invalid="false" placeholder="Type your feedback Here"><?php if(!empty($order_data) && $order_data[0]->feedback_cmt){ echo $order_data[0]->feedback_cmt; } ?></textarea>
                        </div>
                        <div class="col-md-12">
                          <br>
                          <span class="span_own">Title (optional)</span>
                          <input type="text" name="feedback" class="form-control" value="<?php if(!empty($order_data) && $order_data[0]->feedback){ echo $order_data[0]->feedback; } ?>">
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <h4 class="title">Review Image I</h4>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <img <?php if(!empty($order_data[0]->feedback_img1) && !empty($order_data[0]->feedback_img1)){ ?> src="<?php echo base_url()?>uploads/<?php echo $order_data[0]->feedback_img1; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" <?php } ?>>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Select Img</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="feedback_img1" <?php if(!empty($order_data[0]->feedback_img1) && !empty($order_data[0]->feedback_img1)){ }else{ ?> <?php } ?>>
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <h4 class="title">Review Image II</h4>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <img <?php if(!empty($order_data[0]->feedback_img2) && !empty($order_data[0]->feedback_img2)){ ?> src="<?php echo base_url()?>uploads/<?php echo $order_data[0]->feedback_img2; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" <?php } ?>>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Select Img</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="feedback_img2" <?php if(!empty($order_data[0]->feedback_img2) && !empty($order_data[0]->feedback_img2)){ }else{ ?> <?php } ?>>
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <h4 class="title">Review Image III</h4>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <img <?php if(!empty($order_data[0]->feedback_img3) && !empty($order_data[0]->feedback_img3)){ ?> src="<?php echo base_url()?>uploads/<?php echo $order_data[0]->feedback_img3; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" <?php } ?>>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Select Img</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="feedback_img3" <?php if(!empty($order_data[0]->feedback_img3) && !empty($order_data[0]->feedback_img3)){ }else{ ?> <?php } ?>>
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <br>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="status" required="true" value="SUCCESS" aria-required="true" checked disabled> this order product received.
                              <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-12">
                          <input type="hidden" name="product_id" value="<?php if(!empty($order_data[0]->order_id)){ echo$order_data[0]->order_id; } ?>">
                        <center><button type="submit" class="btn btn-success"><?php if(!empty($order_data[0]->cutomer_status == 'SUCCESS')){ echo"Update"; }else{ echo"Add";} ?></button></center>
                       </div>
                    </div>
                  </form>
                <?php } ?>
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
  <script>
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
  <script>
    $(document).ready(function() {


      $('#facebook').sharrre({
        share: {
          facebook: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('facebook');
        },
        template: '<i class="fab fa-facebook-f"></i> Facebook',
        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
      });

      $('#google').sharrre({
        share: {
          googlePlus: true
        },
        enableCounter: false,
        enableHover: false,
        enableTracking: true,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('googlePlus');
        },
        template: '<i class="fab fa-google-plus"></i> Google',
        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
      });

      $('#twitter').sharrre({
        share: {
          twitter: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        buttons: {
          twitter: {
            via: 'CreativeTim'
          }
        },
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('twitter');
        },
        template: '<i class="fab fa-twitter"></i> Twitter',
        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
      });


      // Facebook Pixel Code Don't Delete
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

      try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      } catch (err) {
        console.log('Facebook Track Error:', err);
      }

    });
  </script>
  <script>
    // Facebook Pixel Code Don't Delete
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window,
      document, 'script', '//connect.facebook.net/en_US/fbevents.js');

    try {
      fbq('init', '111649226022273');
      fbq('track', "PageView");

    } catch (err) {
      console.log('Facebook Track Error:', err);
    }
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
  <script>
    $(document).ready(function() {
      md.checkFullPageBackgroundImage();
    });
  </script>
</body>

</html>
<script>
    function setFormValidation(id) {
      $(id).validate({
        highlight: function(element) {
          $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
          $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
        },
        success: function(element) {
          $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
          $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
        },
        errorPlacement: function(error, element) {
          $(element).closest('.form-group').append(error);
        },
      });
    }

    $(document).ready(function() {
      setFormValidation('#LoginValidation');
    });
    $(document).ready(function() {
      $('.fnl_amt_cal').keyup(function() {
        if($('#pro_amount').val() !='' && $('#pro_off_percentage').val() !='' )
        {
          $('#pro_final_amount').val($('#pro_amount').val() - $('#pro_off_percentage').val());
        }
      });
    });
  </script>
  <style type="text/css">
    .textarea_own{height: 200px !important;}
    .textarea_own1{height: 250px !important;border: 1px solid #ccc;padding: 10px;}
    .span_own{
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 20px;
}
.star-rating {
  border:solid 0px #ccc;
  display:flex;
  flex-direction: row-reverse;
  font-size:1.5em;
  justify-content:space-around;
  padding:0 .2em;
  text-align:center;
  width:5em;
  margin-left: 47px;
}

.star-rating input {
  display:none;
}

.star-rating label {
  color:#ccc;
  cursor:pointer;
}

.star-rating :checked ~ label {
  color:#f90;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
  color:#fc0;
}
.star{font-size: 50px;}
  .own_img{height: 300px;}
  .img_own{height: 450px !important;width: 335px;}
  .fileinput {
    display: inline-block;
    margin-bottom: 9px;
    margin-left: 30px;
}
  </style>
  