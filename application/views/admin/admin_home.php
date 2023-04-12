<?php $this->load->view('include/side_bar'); ?>
    <div class="main-panel">
<?php $this->load->view('include/header.php'); ?>
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <?php
              $datavaluestwo = array('customer_id' => $this->session->userdata('customer_id'));
                            ?>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">weekend</i>
                    </div>
                    <p class="card-category">Products</p>
                    <h3 class="card-title"><?php echo get_count('tbl_products',$datavaluestwo,'product_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons text-danger">warning</i> -->
                      <a href="#pablo">Total Products Admin</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">attach_money</i>
                    </div>
                    <p class="card-category">Revenue</p>
                    <h3 class="card-title">₹ <?php echo get_sum1('tbl_orders',$this->session->userdata('customer_id')); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">date_range</i>  -->
                      <a href="#pablo">Total Revenue Admin Products</a>
                    </div>
                  </div>
                </div>
              </div>

              <!--  -->
              <?php
              $datavaluestwo = array('seller_id' => $this->session->userdata('customer_id'));
                            ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">Order</p>
                    <h3 class="card-title"><?php echo get_count('tbl_orders',$datavaluestwo,'seller_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">local_offer</i>  -->
                      <a href="#pablo">Total Orders Admin</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->

              <?php
              $datavaluestwo = array('seller_id' => $this->session->userdata('customer_id'),'seller_status' => 'PENDING');
                            ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="fa fa-twitter"></i>
                    </div>
                    <p class="card-category">Pending Orders</p>
                    <h3 class="card-title"><?php echo get_count('tbl_orders',$datavaluestwo,'seller_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">update</i> Just Updated -->
                      <a href="#pablo">Total Pending Orders Admin</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <!--  -->
              <?php
              $datavaluestwo = array('seller_id' => $this->session->userdata('customer_id'),'seller_status' => 'SHIPPED');
                            ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">reorder</i>
                    </div>
                    <p class="card-category">Shipped Orders</p>
                    <h3 class="card-title"><?php echo get_count('tbl_orders',$datavaluestwo,'seller_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">local_offer</i>  -->
                      <a href="#pablo">Total Shipped Orders Admin</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <!--  -->
              <?php
              $datavaluestwo = array('seller_id' => $this->session->userdata('customer_id'),'seller_status' => 'SUCCESS');
                            ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">grading</i>
                    </div>
                    <p class="card-category">Com. Orders</p>
                    <h3 class="card-title"><?php echo get_count('tbl_orders',$datavaluestwo,'seller_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">local_offer</i>  -->
                      <a href="#pablo">Total Completed Orders Admin</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <!--  -->
              <?php
              $datavaluestwo = array('seller_id' => $this->session->userdata('customer_id'),'seller_status' => 'REJECTED');
                            ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">delete</i>
                    </div>
                    <p class="card-category">Rejected Orders</p>
                    <h3 class="card-title"><?php echo get_count('tbl_orders',$datavaluestwo,'seller_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">local_offer</i>  -->
                      <a href="#pablo">Total Rejected Orders Admin</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <?php
              $datavaluestwo = array('cat_id !=' =>'-1');
              ?>
              <!--  -->
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">drag_indicator</i>
                    </div>
                    <p class="card-category">Category</p>
                    <h3 class="card-title"><?php echo get_count('tbl_category',$datavaluestwo,'cat_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">local_offer</i>  -->
                      <a href="#pablo">Total Category</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <?php
              $datavaluestwo = array('sub_cat_id !=' =>'-1');
              ?>
              <!--  -->
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">list_alt</i>
                    </div>
                    <p class="card-category">Sub-Category</p>
                    <h3 class="card-title"><?php echo get_count('tbl_sub_category',$datavaluestwo,'cat_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">update</i> Just Updated -->
                      <a href="#pablo">Total Sub Category</a>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              $datavaluestwo = array('brand_id !=' =>'-1');
              ?>
              <!--  -->
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">takeout_dining</i>
                    </div>
                    <p class="card-category">Brands</p>
                    <h3 class="card-title"><?php echo get_count('tbl_brand',$datavaluestwo,'brand_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">update</i> Just Updated -->
                      <a href="#pablo">Number of Brands</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <?php
              $datavaluestwo = array('status' =>'YES','role' =>'seller');
              ?>
              <!--  -->
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">supervised_user_circle</i>
                    </div>
                    <p class="card-category">Sellers</p>
                    <h3 class="card-title"><?php echo get_count('tbl_login',$datavaluestwo,'customer_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">local_offer</i>  -->
                      <a href="#pablo">Number of Sellers</a>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              $datavaluestwo = array('status' =>'YES','role' =>'customer');
              ?>

              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">group_add</i>
                    </div>
                    <p class="card-category">Customers</p>
                    <h3 class="card-title"><?php echo get_count('tbl_login',$datavaluestwo,'customer_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">date_range</i> --> 
                      <a href="#pablo">Total Customers</a>
                    </div>
                  </div>
                </div>
              </div>
               <?php
              $datavaluestwo = array('customer_id !=' =>'1');
              ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">collections</i>
                    </div>
                    <p class="card-category">Products</p>
                    <h3 class="card-title"><?php echo get_count('tbl_products',$datavaluestwo,'product_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons text-danger">warning</i> -->
                      <a href="#pablo">Sellers Product Count</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">attach_money</i>
                    </div>
                    <p class="card-category">Revenue</p>
                    <h3 class="card-title">₹ <?php echo get_sum2('tbl_orders',$this->session->userdata('customer_id')); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">date_range</i>  -->
                      <a href="#pablo">Total Revenue Seller Products</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <?php
              $datavaluestwo = array('seller_id  !=' => $this->session->userdata('customer_id'));
                            ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">Order</p>
                    <h3 class="card-title"><?php echo get_count('tbl_orders',$datavaluestwo,'seller_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">local_offer</i>  -->
                      <a href="#pablo">Total Orders Seller</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->

              <?php
              $datavaluestwo = array('seller_id  !=' => $this->session->userdata('customer_id'),'seller_status' => 'PENDING');
                            ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">reorder</i>
                    </div>
                    <p class="card-category">Pending Orders</p>
                    <h3 class="card-title"><?php echo get_count('tbl_orders',$datavaluestwo,'seller_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">update</i> Just Updated -->
                      <a href="#pablo">Total Pending Orders Seller</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <!--  -->
              <?php
              $datavaluestwo = array('seller_id  !=' => $this->session->userdata('customer_id'),'seller_status' => 'SHIPPED');
                            ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">grading</i>
                    </div>
                    <p class="card-category">Shipped Orders</p>
                    <h3 class="card-title"><?php echo get_count('tbl_orders',$datavaluestwo,'seller_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">local_offer</i>  -->
                      <a href="#pablo">Total Shipped Orders Seller</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <!--  -->
              <?php
              $datavaluestwo = array('seller_id  !=' => $this->session->userdata('customer_id'),'seller_status' => 'SUCCESS');
                            ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">delete</i>
                    </div>
                    <p class="card-category">Com. Orders</p>
                    <h3 class="card-title"><?php echo get_count('tbl_orders',$datavaluestwo,'seller_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">local_offer</i>  -->
                      <a href="#pablo">Total Completed Orders Seller</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <!--  -->
              <?php
              $datavaluestwo = array('seller_id !=' => $this->session->userdata('customer_id'),'seller_status' => 'REJECTED');
                            ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">Rejected Orders</p>
                    <h3 class="card-title"><?php echo get_count('tbl_orders',$datavaluestwo,'seller_id'); ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">local_offer</i>  -->
                      <a href="#pablo">Total Rejected Orders Seller</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
            </div>
            <!-- end -->
          </div>
        </div>
      </div>
      <!-- footer link -->
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
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

      md.initVectorMap();

    });
  </script>
</body>

</html>