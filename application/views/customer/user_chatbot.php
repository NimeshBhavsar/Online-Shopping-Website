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
                  <h4 class="card-title"><?php echo $header_name; ?>
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
            <h4 class="modal-title" style="float: left;">Update Product FAQ</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url()?>update_pro_qes_ans" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                   <img src="#" class="img-thumbnail" alt="Image not found" onerror="this.src='<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg';" id="ld_image1">
                   <br>
                   <br>
                   <center><a href="#" id="ld_product_link" class="btn btn-info" target="_blank">View Product</a></center>
                </div>

                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-12">
                      <label>Product Name</label>
                      <input type="text" class="form-control" id="ld_Name" disabled>
                    </div>
                    <div class="col-md-12">
                         <label>Question</label>
                         <input type="text" class="form-control" id="ld_question" disabled>
                    </div>
                    <div class="col-md-12">
                       <label>Answer</label>
                       <input type="text" class="form-control" id="ld_answer" name="answer" required="true">
                    </div>
                    <div class="col-md-5">
                       <label>Date of Question</label>
                       <input type="text" class="form-control" id="ld_date_of_question" disabled>
                    </div>
                    <div class="col-md-5">
                       <label>Date of answer</label>
                       <input type="text" class="form-control" id="ld_date_of_answer" disabled>
                    </div>
                     <div class="col-md-2">
                      <input type="hidden" class="form-control" id="ld_redirect_url" name="rtn_url">
                       <label>FAQ Id</label>
                       <input type="text" class="form-control text-center" id="ld_pro_qes_ans_id" name="pro_qes_ans_id" readonly required>
                    </div>
                  </div>
                </div>
              </div>
              <br>
            <div class="row">
              <div class="col-md-12">
                <center><input type="submit" name="update_faq" class="btn-success btn" id="ld_update_btn"></center>
              </div>
            </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-success" data-dismiss="modal">Close</button> -->
        </div>
      </form>
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
    
  <!-- Sharrre libray -->
  <script src="<?php echo base_url()?>assets/admin_assets/demo/jquery.sharrre.js"></script>
  
  
  
  
</body>

</html>

  
  <style type="text/css">
    .card-avatar1{width: 100px;height: 100px;}
    .modal-content{width: 150%;}
    .textarea_own{height: 200px !important;}
    #ld_image1{height: 250px;width: 200px;}
    .sub_img{height: 100px;width: 140px;float: left;margin: 10px;cursor: pointer;}
    .img_own {
    height: 100px;
    width: 100px;
}
  </style>
  