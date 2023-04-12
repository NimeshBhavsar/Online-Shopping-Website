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
                  <h4 class="card-title"><?php if(!empty($edit_fetch_data)){ echo"Edit"; }else{ echo"Add";} ?> Product
                    <small class="category"></small>
                  </h4>
                  <p class="invalid_msg text-center text-white font-weight-bold bg-info"><?php echo $this->session->tempdata('success'); $this->session->unset_tempdata('success') ?></p>
                </div>
                <div class="card-body">
                  <?php if(!empty($edit_fetch_data)){ ?>
                  <form method="post" action="<?php echo base_url()?>product_update" id="LoginValidation" enctype="multipart/form-data"> 
                  <?php }else{ ?>
                  <form method="post" action="<?php echo base_url()?>product_add" id="LoginValidation" enctype="multipart/form-data"> 
                  <?php } ?>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="cat_id" class="bmd-label-floating pull-right">Category*</label>
                          <select class="form-control" name="cat_id" id="cat_id" required onchange="get_subcategory()";>
                            <option value=""></option>
                            <?php foreach ($category_data as $key => $value) { ?>
                            <option value="<?php echo $value->cat_id; ?>" <?php if(!empty($edit_fetch_data) && $value->cat_id==$edit_fetch_data[0]->cat_id) echo"selected"; ?> ><?php echo $value->category_name; ?></option>
                          <?php  } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="sub_cat_id" class="bmd-label-floating pull-right">Sub Category*</label>
                          <select class="form-control" name="sub_cat_id" id="sub_cat_id" required>
                            <option value=""></option>
                            <?php foreach ($sub_category_data as $key => $value) { ?>
                            <option value="<?php echo $value->sub_cat_id; ?>" <?php if(!empty($edit_fetch_data) && $value->sub_cat_id==$edit_fetch_data[0]->sub_cat_id) echo"selected"; ?> ><?php echo $value->sub_cat_name; ?></option>
                          <?php  } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="brand_id" class="bmd-label-floating pull-right">Brand*</label>
                          <select class="form-control" name="brand_id" required>
                            <option value=""></option>
                            <?php foreach ($brand_data as $key => $value) { ?>
                            <option value="<?php echo $value->brand_id; ?>" <?php if(!empty($edit_fetch_data) && $value->brand_id==$edit_fetch_data[0]->brand_id) echo"selected"; ?> ><?php echo $value->brand_name; ?></option>
                          <?php  } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="pro_name" class="bmd-label-floating"> Product Name*</label>
                          <input type="text" class="form-control" required="true" name="pro_name" <?php if(!empty($edit_fetch_data) && $edit_fetch_data[0]->pro_name){ echo'value="'.$edit_fetch_data[0]->pro_name.'"'; } ?> id="pro_name">
                          <input type="hidden" class="form-control" required="true" name="product_id" <?php if(!empty($edit_fetch_data) && $edit_fetch_data[0]->product_id){ echo"value='".$edit_fetch_data[0]->product_id."'"; } ?> id="product_id">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="pro_amount" class="bmd-label-floating"> Product Amount* (<?php echo get_value('tbl_login','customer_id',1,'money_type'); ?>)</label>
                          <input type="text" class="form-control fnl_amt_cal" required="true" name="pro_amount" <?php if(!empty($edit_fetch_data) && $edit_fetch_data[0]->pro_amount){ echo"value='".$edit_fetch_data[0]->pro_amount."'"; } ?> id="pro_amount" number="true">
                        </div>
                      </div>
                       <div class="col-md-2">
                        <div class="form-group">
                          <label for="pro_off_percentage" class="bmd-label-floating"> Off % in No.* (<?php echo get_value('tbl_login','customer_id',1,'money_type'); ?>)</label>
                          <input type="text" class="form-control fnl_amt_cal" required="true" name="pro_off_percentage" <?php if(!empty($edit_fetch_data) && $edit_fetch_data[0]->pro_off_percentage){ echo"value='".$edit_fetch_data[0]->pro_off_percentage."'"; } ?> id="pro_off_percentage" number="true">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="pro_final_amount" class="bmd-label-floating"> Final Amount* (<?php echo get_value('tbl_login','customer_id',1,'money_type'); ?>)</label>
                          <input type="text" class="form-control" required="true" name="pro_final_amount" <?php if(!empty($edit_fetch_data) && $edit_fetch_data[0]->pro_final_amount){ echo"value='".$edit_fetch_data[0]->pro_final_amount."'"; }else{ echo"value='0'"; } ?> id="pro_final_amount" readonly>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="pro_delivery_dates" class="bmd-label-floating"> Delivery Dates*</label>
                          <input type="text" class="form-control" required="true" name="pro_delivery_dates" <?php if(!empty($edit_fetch_data) && $edit_fetch_data[0]->pro_delivery_dates){ echo"value='".$edit_fetch_data[0]->pro_delivery_dates."'"; } ?> id="pro_delivery_dates">
                        </div>
                      </div>
                      </div> 
                      
                      <div class="row"> 
                        <div class="col-md-6">
                          <div class="form-group">
                          <label for="product_description" class="bmd-label-floating pull-right">Product Description*</label>
                          <textarea name="product_description" id="product_description" class="form-control textarea_own" required="true" placeholder="&#10;&#10;Example: At Mellifluous, our range of products for your pets are ergonomically designed keeping in mind the comfort factor that your pet deserves. Our quality pet products just don’t speak quality but also let your pet connect with you. In addition to this, we’ve added modern space-saving style that can perfectly accentuate your homes too."><?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->product_description)){ echo $edit_fetch_data[0]->product_description; } ?></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                          <label for="pro_details" class="bmd-label-floating pull-right">Pro Details*</label>
                          <textarea name="pro_details" id="pro_details" class="form-control textarea_own" required="true" placeholder="&#10;Prodcut Details: (Example format like below) 
&#10;Material : Plastic
&#10;Colour : Multicolor
&#10;Blade Material : Stainless Steel
&#10;Brand : Pigeon
&#10;Item Dimensions : LxWxH 14.8 x 12.8 x 11.3 Centimeters
&#10;Item Weight : 310 Grams
&#10;Operation Mode : Manual"><?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->pro_details)){ echo $edit_fetch_data[0]->pro_details; } ?></textarea>
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                          <label for="pro_keywords" class="bmd-label-floating"> Searching Keywords*</label>
                          <input type="text" class="form-control" required="true" name="pro_keywords" <?php if(!empty($edit_fetch_data) && $edit_fetch_data[0]->pro_keywords){ echo"value='".$edit_fetch_data[0]->pro_keywords."'"; } ?> id="pro_keywords">
                        </div>
                      </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-4">
                          <h4 class="title">Image I</h4>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <img <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->pro_img1)){ ?> src="<?php echo base_url()?>uploads/<?php echo $edit_fetch_data[0]->pro_img1; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" <?php } ?>>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Select image I</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="pro_img1" <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->pro_img1)){ }else{ ?>required <?php } ?>>
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <h4 class="title">Image II</h4>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <img <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->pro_img2)){ ?> src="<?php echo base_url()?>uploads/<?php echo $edit_fetch_data[0]->pro_img2; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" <?php } ?>>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Select image II</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="pro_img2" <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->pro_img2)){ }else{ ?>required <?php } ?>>
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <h4 class="title">Image III</h4>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <img <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->pro_img3)){ ?> src="<?php echo base_url()?>uploads/<?php echo $edit_fetch_data[0]->pro_img3; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" <?php } ?>>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Select image III</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="pro_img3" <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->pro_img3)){ }else{ ?>required <?php } ?>>
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="row"> 
                        <div class="col-md-4 col-sm-4">
                          <h4 class="title">Image IV</h4>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <img <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->pro_img4)){ ?> src="<?php echo base_url()?>uploads/<?php echo $edit_fetch_data[0]->pro_img4; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" <?php } ?>>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Select image IV</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="pro_img4" <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->pro_img4)){ }else{ ?>required <?php } ?>>
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <h4 class="title">Description Image I</h4>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <img <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->des_img1)){ ?> src="<?php echo base_url()?>uploads/<?php echo $edit_fetch_data[0]->des_img1; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" <?php } ?>>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Description image I</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="des_img1" <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->des_img1)){ }else{ ?>required <?php } ?>>
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <h4 class="title">Description Image II</h4>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <img <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->des_img2)){ ?> src="<?php echo base_url()?>uploads/<?php echo $edit_fetch_data[0]->des_img2; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" <?php } ?>>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Description image II</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="des_img2" <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->des_img2)){ }else{ ?>required <?php } ?>>
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <h4 class="title">Description Image III</h4>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <img <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->des_img3)){ ?> src="<?php echo base_url()?>uploads/<?php echo $edit_fetch_data[0]->des_img3; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" <?php } ?>>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Description image III</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="des_img3" <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->des_img3)){ }else{ ?>required <?php } ?>>
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <h4 class="title">Banner Image</h4>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <img <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->des_img4)){ ?> src="<?php echo base_url()?>uploads/<?php echo $edit_fetch_data[0]->des_img4; ?>"<?php }else{ ?> src="<?php echo base_url()?>assets/admin_assets/img/image_placeholder.jpg" <?php } ?>>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Banner Image</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="des_img4" <?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->des_img4)){ }else{ ?>required <?php } ?>>
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                          <label for="des_line1" class="bmd-label-floating pull-right">Pro Descrition Line 1*</label>
                          <textarea name="des_line1" id="des_line1" class="form-control textarea_own1" required="true" placeholder="&#10;Presenting, Surf excel matic front load the machine specialist laundry detergent from the Surf excel matic family that gives you 100 percentage Tough Stain Removal in machines. Surf excel matic front load is specially designed to"><?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->des_line1)){ echo $edit_fetch_data[0]->des_line1; } ?></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                          <label for="des_line2" class="bmd-label-floating pull-right">Pro Descrition Line 2*</label>
                          <textarea name="des_line2" id="des_line2" class="form-control textarea_own1" required="true" placeholder="&#10;Presenting, Surf excel matic front load the machine specialist laundry detergent from the Surf excel matic family that gives you 100 percentage Tough Stain Removal in machines. Surf excel matic front load is specially designed to"><?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->des_line2)){ echo $edit_fetch_data[0]->des_line2; } ?></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                          <label for="des_line3" class="bmd-label-floating pull-right">Pro Descrition Line 3*</label>
                          <textarea name="des_line3" id="des_line3" class="form-control textarea_own1" required="true" placeholder="&#10;Presenting, Surf excel matic front load the machine specialist laundry detergent from the Surf excel matic family that gives you 100 percentage Tough Stain Removal in machines. Surf excel matic front load is specially designed to"><?php if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->des_line3)){ echo $edit_fetch_data[0]->des_line3; } ?></textarea>
                        </div>
                        </div>
                        <?php
                        $size_array = array();
                        if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->pro_size)){
                          $size_array = explode(",",$edit_fetch_data[0]->pro_size);
                        }
                        ?>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="des_line3" class="bmd-label-floating pull-right">Size are available</label>
<label class="checkbox-inline"><input type="checkbox" value="M" name="pro_size[]" class="pro_size_box" <?php if(in_array('M',$size_array)){ echo"checked";} ?>> M</label>
<label class="checkbox-inline"><input type="checkbox" value="L" name="pro_size[]" class="pro_size_box" <?php if(in_array('L',$size_array)){ echo"checked";} ?>> L</label>
<label class="checkbox-inline"><input type="checkbox" value="XL" name="pro_size[]" class="pro_size_box" <?php if(in_array('XL',$size_array)){ echo"checked";} ?>> XL</label>
<label class="checkbox-inline"><input type="checkbox" value="XXL" name="pro_size[]" class="pro_size_box" <?php if(in_array('XXL',$size_array)){ echo"checked";} ?>> XXL</label>
                          </div>
                        </div>
                        <?php
                        $colors_array = array();
                        if(!empty($edit_fetch_data) && !empty($edit_fetch_data[0]->pro_color_ids)){
                          $colors_array = explode(",",$edit_fetch_data[0]->pro_color_ids);
                        }
                        ?>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="des_line3" class="bmd-label-floating pull-left">Colors Related Products</label>
                             
                            <?php foreach ($pro_data as $key => $value){ ?>
                              <label class="checkbox-inline"><input type="checkbox" value="<?php echo $value->product_id; ?>" name="pro_color_ids[]" class="pro_size_box" <?php if(in_array($value->product_id,$colors_array)){ echo"checked";} ?>> <?php echo $value->pro_name; ?></label>
                            <?php } ?>
                            

                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                        <button type="submit" class="btn btn-rose"><?php if(!empty($edit_fetch_data)){ echo"Update"; }else{ echo"Add";} ?></button>
                       </div>
                    </div>
                    
                    <div class="clearfix"></div>
                  </form>
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
    .textarea_own1{height: 250px !important;}
    .pro_size_box{margin-left: 10px;margin-top: 30px;}
    .multi-select{width: 500px;margin-top: 20px;height: 300px;font-size: 15px;}
  </style>
  <script type="text/javascript">
      function get_subcategory(){
        var cat_id = $("#cat_id").val();
        document.getElementById("sub_cat_id").innerHTML = "";
        var $url="<?php echo base_url();?>get_subcategory";
        // alert($url);
        $.ajax({ 
          url: $url,
          type:"POST",
          data: {cat_id: cat_id},
          success: function ($data) { 
            if($data !='valid'){
              document.getElementById("sub_cat_id").innerHTML = $data;
            }      
          },
          error: function(){
          }
        });
      }
</script>