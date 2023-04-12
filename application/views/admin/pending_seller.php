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
                  <h4 class="card-title">View All Sellers
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
                  <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>Sl. No.</th>
                          <th>Seller Name</th>
                          <th>Email id</th>
                          <th>Mobile Number</th>
                          <th>photo</th>
                          <th>Status</th>
                          <th>Action</th>
                          <th>City</th>
                          <th>Country</th>
                          <th>Pincode</th>
                          <th>Land Mark</th>
                          <th>About Me</th>
                          <th>Company Logo</th>
                          <th>Company Approval Doct</th>
                          <th>Company Details</th>
                          <th>Customer Id</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Sl. No.</th>
                          <th>Seller Name</th>
                          <th>Email id</th>
                          <th>Mobile Number</th>
                          <th>photo</th>
                          <th>Status</th>
                          <th>Action</th>
                          <th>City</th>
                          <th>Country</th>
                          <th>Pincode</th>
                          <th>Land Mark</th>
                          <th>About Me</th>
                          <th>Company Logo</th>
                          <th>Company Approval Doct</th>
                          <th>Company Details</th>
                          <th>Customer Id</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php 
                        $status_val="";
                        foreach ($login_data as $key => $value) { ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo $value->user_name; ?></td>
                            <td><?php echo $value->email_id; ?></td>
                            <td><?php echo $value->mobile_no; ?></td>
                            <td><img src="<?php echo base_url()?>uploads/<?php echo $value->photo; ?>" class="card-avatar1"></td>
                            <td><?php echo $value->status; ?></td>
                            <td class="text-right">
                              <a href="#" class="load_details" title="View The Products clearly"><i class="material-icons">favorite</i></a>
                              <?php if($value->status =='YES'){ $status_val="NO";}else{ $status_val="YES";} ?>
                            <a href="<?php echo base_url()?>Admin_controller/upd_status/tbl_login/customer_id/<?php echo $value->customer_id;?>/status/<?php echo $status_val;?>/pending_seller" class="btn btn-link btn-warning btn-just-icon edit"
                            <?php if($value->status =='YES'){ echo"title='Turn Off Seller Login'"; }else{ echo"title='Turn On Seller Login'";} ?>><i class="material-icons">dvr</i></a>
                            <?php if($value->admin_approve_cmy =='1') { ?>
                            <a href="<?php echo base_url()?>upd_cmy_appro/<?php echo $value->customer_id;?>/2" class="btn btn-link btn-warning btn-just-icon edit" title="Approve Seller"><i class="material-icons">done_all</i></a>
                            <a href="#" class="btn btn-link btn-warning btn-just-icon edit modal_one" title="Reject Seller"><i class="material-icons">dangerous</i></a>
                          <?php } ?>
                          </td>
                            <td><?php echo $value->city; ?></td>
                            <td><?php echo $value->country; ?></td>
                            <td><?php echo $value->pincode; ?></td>
                            <td><?php echo $value->land_mark; ?></td>
                            <td><?php echo $value->about_me; ?></td>
                            <td><?php
                                  if (!empty($value->company_logo) && strpos($value->company_logo, '.pdf') !== false)
                                  { ?>
                                    <a href="<?php echo base_url()?>uploads/<?php echo $value->company_logo; ?>" target="_blank" class="text-success">View Pdf document</a>

                               <?php   }else{
                                ?>
                                <img <?php if(!empty($login_data) && !empty($value->company_logo)){ ?> src="<?php echo base_url()?>uploads/<?php echo $value->company_logo; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" class="card-avatar1" <?php } ?> class="card-avatar1">
                              <?php   }
                                ?></td>
                            <td><?php
                                  if (!empty($value->company_app_doct) && strpos($value->company_app_doct, '.pdf') !== false)
                                  { ?>
                                    <a href="<?php echo base_url()?>uploads/<?php echo $value->company_app_doct; ?>" target="_blank" class="text-success">View Pdf document</a>

                               <?php   }else{
                                ?>
                                <img <?php if(!empty($login_data) && !empty($value->company_app_doct)){ ?> src="<?php echo base_url()?>uploads/<?php echo $value->company_app_doct; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" class="card-avatar1" <?php } ?> class="card-avatar1">
                              <?php   }
                                ?></td>
                            <td><?php echo $value->company_details; ?></td>
                            <td><?php echo $value->customer_id; ?></td>
                        </tr>
                        <?php } ?>
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
                </div>
              </div>
            </div>
            <?php if(empty($edit_fetch_data)){
             ?>
          <?php } ?>
            
          </div>
        </div>
      </div>

       <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" style="float: left;">Seller Personal Information View</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                   <img src="#" class="img-thumbnail" alt="Image not found" onerror="this.src='<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg';" id="ld_image1">
                </div>
                <div class="col-md-6">
                  <img src="#" class="img-thumbnail sub_img" alt="Image not found" onerror="this.src='<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg';" id="ld_image2">
                  <img src="#" class="img-thumbnail sub_img" alt="Image not found" onerror="this.src='<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg';" id="ld_image3">
                  <img src="#" class="img-thumbnail sub_img" alt="Image not found" onerror="this.src='<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg';" id="ld_image4">
                  <a href="#" class="ld_image3 btn btn-rose" target="_blank"></a>
                  <a href="#" class="ld_image4 btn btn-rose" target="_blank"></a>
                </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                   <label>Seller Name</label>
                   <input type="text" class="form-control" id="ld_Seller_Name" disabled>
              </div>
              <div class="col-md-4">
                   <label>Email Id</label>
                   <input type="text" class="form-control" id="ld_Email_id" disabled>
              </div>
              <div class="col-md-4">
                   <label>Mobile Number</label>
                   <input type="text" class="form-control" id="ld_Mobile_Number" disabled>
              </div>
              <div class="col-md-4">
                   <label>Login Status</label>
                   <input type="text" class="form-control" id="ld_Status" disabled>
              </div>
              <div class="col-md-4">
                   <label>City</label>
                   <input type="text" class="form-control" id="ld_City" disabled>
              </div>
              <div class="col-md-4">
                   <label>Country</label>
                   <input type="text" class="form-control" id="ld_Country" disabled>
              </div>
              <div class="col-md-4">
                   <label>Pincode</label>
                   <input type="text" class="form-control" id="ld_Pincode" disabled>
              </div>
              <div class="col-md-4">
                   <label>Land Mark</label>
                   <input type="text" class="form-control" id="ld_Land_Mark" disabled>
              </div>
              <div class="col-md-12">
                   <label>About Company</label>
                   <textarea class="form-control textarea_own" id="ld_About_Me" disabled></textarea>
              </div>
              <div class="col-md-12">
                   <label>Company Details</label>
                   <textarea class="form-control textarea_own" id="ld_Company_Details" disabled></textarea>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-success" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="myModal_one" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" style="float: left;">Reject Seller</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <form method="post" action="<?php echo base_url()?>reject_seller">
               <div class="row">
                <div class="col-md-6">
                   <label>Seller Name</label>
                   <input type="text" class="form-control" id="ld_Seller_Name_one" disabled>
              </div>
              <div class="col-md-6">
                   <label>Customer Id</label>
                   <input type="text" class="form-control" id="ld_customer_id" name="customer_id" readonly>
              </div>
                  <div class="col-md-6">
                       <label>Rejection Reason</label>
                       <textarea class="form-control textarea_own" id="rejection_reason" name="rejection_reason" placeholder="Enter Rejection Reason Here"></textarea>
                  </div>
                  <div class="col-md-6">
                    <br>
                    <h5 class="text-center text-rose">Default Rejection Commands</h5>
                    <div class="form-check clk_recmd">
                      <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="rejection_cmd[]" value="Document Not Proper"> Document Not Proper
                          <span class="form-check-sign"><span class="check"></span>
                          </span>
                      </label>
                    </div>
                    <div class="form-check clk_recmd">
                      <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="rejection_cmd[]" value="Document Missing"> Document Missing
                          <span class="form-check-sign"><span class="check"></span>
                          </span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <br>
                    <center><input type="submit" name="update_rejections" value="Submit" class="btn btn-rose"></center>
                  </div>
                </div>
            </form>
            
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-success" data-dismiss="modal">Close</button> -->
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
  </script>
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
    #ld_image1{height: 300px;width: 300px;}
    .sub_img{height: 100px;width: 140px;float: left;margin: 10px;cursor: pointer;}
  </style>
  <script type="text/javascript">
    $(document).ready(function() {
        $('.modal_one').click(function(){
          var row_index = $(this).closest('tr').index() + 2;
          var Seller_Name= $("#datatables tr:eq(" + row_index + ") td:eq(1)").text();
          var customer_id= $("#datatables tr:eq(" + row_index + ") td:eq(15)").text();
          $("#ld_Seller_Name_one").val(Seller_Name);
          $("#ld_customer_id").val(customer_id);
          $('#myModal_one').modal('show'); 
        });
        $('.load_details').click(function(){
            
            var row_index = $(this).closest('tr').index() + 2;
            var Seller_Name= $("#datatables tr:eq(" + row_index + ") td:eq(1)").text();
            var Email_id= $("#datatables tr:eq(" + row_index + ") td:eq(2)").text();
            var Mobile_Number= $("#datatables tr:eq(" + row_index + ") td:eq(3)").text();
            var Status= $("#datatables tr:eq(" + row_index + ") td:eq(5)").text();
            var City= $("#datatables tr:eq(" + row_index + ") td:eq(7)").text();
            var Country= $("#datatables tr:eq(" + row_index + ") td:eq(8)").text();
            var Pincode= $("#datatables tr:eq(" + row_index + ") td:eq(9)").text();
            var Land_Mark= $("#datatables tr:eq(" + row_index + ") td:eq(10)").text();
            var About_Me= $("#datatables tr:eq(" + row_index + ") td:eq(11)").text();
            var Company_Details= $("#datatables tr:eq(" + row_index + ") td:eq(14)").text();
            //
            // var title_value= $("#datatables tr:eq(" + row_index + ") td:eq(8)").attr('title');
            // console.log(Cat + "dgfdg" + title_value);
            //
            var image_soruce1= $("#datatables tr:eq(" + row_index + ") td:eq(4)").find('img').attr("src");
            var image_soruce2= $("#datatables tr:eq(" + row_index + ") td:eq(12)").find('img').attr("src");
            var image_soruce3= $("#datatables tr:eq(" + row_index + ") td:eq(13)").find('img').attr("src");
            console.log(image_soruce2);
            console.log(image_soruce3);
            if (typeof image_soruce2 === "undefined") {
                var image_soruce2= $("#datatables tr:eq(" + row_index + ") td:eq(13)").find('a').attr("href");
                $(".ld_image3").attr('href', image_soruce2);
                $(".ld_image3").text('View Company Logo');
                $("#ld_image3").css('display',"none");

            }
            else
            {
              $("#ld_image3").attr('src', image_soruce2);
              $(".ld_image3").css('display',"none");
            }
            if (typeof image_soruce3 === "undefined") {
                var image_soruce3= $("#datatables tr:eq(" + row_index + ") td:eq(13)").find('a').attr("href");
                $(".ld_image4").attr('href', image_soruce3);
                $(".ld_image4").text('View Company Document');
                $("#ld_image4").css('display',"none");

            }
            else
            {
              $("#ld_image4").attr('src', image_soruce3);
              $(".ld_image4").css('display',"none");
            }
            
             $("#ld_Seller_Name").val(Seller_Name);
             $("#ld_Email_id").val(Email_id);
             $("#ld_Mobile_Number").val(Mobile_Number);
             $("#ld_Status").val(Status);
             $("#ld_City").val(City);
             $("#ld_Country").val(Country);
             $("#ld_Pincode").val(Pincode);
             $("#ld_Land_Mark").val(Land_Mark);
             $("#ld_About_Me").val(About_Me);
             $("#ld_Company_Details").val(Company_Details);
              $("#ld_image1").attr('src', image_soruce1);
              $("#ld_image2").attr('src', image_soruce1);
             $('#myModal').modal('show'); 
        });

      $('.sub_img').hover(function(){
        $("#ld_image1").attr('src', $(this).attr("src"));
      });
      $("#ld_image1").imagezoomsl({
        zoomrange:[3,3]
      });
      $('.clk_recmd').click(function(){
        var get_reject_cmd= $('input[name="rejection_cmd[]"]:checked').map(function() {
          return this.value;
        }).get().join(',');
        $('#rejection_reason').val(get_reject_cmd);
      });
 });
</script>