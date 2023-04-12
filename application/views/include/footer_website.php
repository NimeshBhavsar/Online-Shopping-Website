<footer>
        <div class="footerv2-w3ls">
            <div class="footer-w3lagile-innerr">
                <!-- footer-top -->
                <div class="container-fluid">
                    <div class="row  footer-v2grids w3-agileits">
                        <!-- services -->
                        <div class="col-lg-2 col-sm-6 footer-v2grid">
                            <h4>Support</h4>
                            <ul>

                                
                                <li>
                                    <a href="#">Shipping</a>
                                </li>
                                <li>
                                    <a href="#">Cancellation & Returns</a>
                                </li>
                                <li>
                                    <a href="#">FAQ</a>
                                </li>
                            </ul>
                        </div>
                        <!-- //services -->
                        <!-- latest posts -->
                        <div class="col-lg-3 col-sm-6 footer-v2grid mt-sm-0 mt-5">
                            <h4>Latest Blog</h4>
                            <?php
                                $datavalues = array('status_seller' => 'YES');
                                $get_data = get_data_array('tbl_products',$datavalues);
                                if(!empty($get_data)){
                                foreach ($get_data as $key => $value) {
                                    if($key < 3)
                                    {
                            ?>
                            <div class="footer-v2grid1 row">
                                <div class="col-4 footer-v2grid1-left">
                                    <a href="<?php echo base_url()."product_v/".$value->product_id; ?>">
                                        <img src="<?php echo base_url()."uploads/".$value->pro_img1;?>" alt=" " class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-8 footer-v2grid1-right p-0">
                                    <a href="<?php echo base_url()."product_v/".$value->product_id; ?>"><?php echo $value->pro_name; ?></a>
                                </div>
                            </div>
                            
                            <?php } } } ?>
                        </div>
                        <!-- //latest posts -->
                        <!-- locations -->
                        <div class="col-lg-2 col-sm-6 footer-v2grid my-lg-0 my-5">
                            <h4>office locations</h4>
                            <ul>
                                <li>
                                    <a href="#">new jersey</a>
                                </li>
                                <li>
                                    <a href="#">texas</a>
                                </li>
                                <li>
                                    <a href="#">michigan</a>
                                </li>
                                <li>
                                    <a href="#">cannada</a>
                                </li>
                                <li>
                                    <a href="#">brazil</a>
                                </li>
                                <li>
                                    <a href="#">california</a>
                                </li>
                            </ul>
                        </div>
                        <!-- //locations -->
                        <!-- flickr posts -->
                        <div class="col-lg-3 col-sm-6 footer-v2grid my-lg-0 my-sm-5">
                            <h4 class="b-log">
                                flickr posts
                            </h4>
                             <?php
                                $datavalues = array('status' => 'YES');
                                $get_data = get_data_array('tbl_products',$datavalues);
                                if(!empty($get_data)){
                                foreach ($get_data as $key => $value) {
                                    if($key < 9)
                                    {
                            ?>
                            <div class="footer-v2grid-instagram">
                                <a href="<?php echo base_url()."product_v/".$value->product_id; ?>">
                                    <img src="<?php echo base_url()."uploads/".$value->pro_img1;?>" alt=" " class="img-fluid">
                                </a>
                            </div>
                            <?php } } } ?>
                        </div>
                        <!-- //flickr posts -->
                       <!-- popular tags -->
                        <div class="col-lg-2  footer-v2grid mt-sm-0 mt-5">
                            <h4>popular tags</h4>
                            <ul class="w3-tag2">
                            <?php
                                $datavaluesthree = array('status' => 'YES');
                                $get_data = get_data_array('tbl_sub_category',$datavaluesthree);
                                if(!empty($get_data)){
                                foreach ($get_data as $key => $value) {
                                    if($key < 18)
                                    {
                            ?>
                                <li>
                                    <a href="<?php echo base_url()."sub_cat_v/".$value->sub_cat_id; ?>"><?php echo $value->sub_cat_name; ?></a>
                                </li>
                                <?php } } } ?>
                            </ul>
                        </div>
                        <!-- //popular tags -->
                    </div>
                </div>
                <!-- //footer-top -->
                <div class="footer-bottomv2 py-5">
                    <div class="container">
                        <ul class="bottom-links-agile">
                            <li>
                                <a href="<?php echo base_url()?>website_home">Home</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>contact">Contact</a>
                            </li>

                        </ul>
                        <h3 class="text-center follow">Follow Us</h3>
                        <ul class="social-iconsv2 agileinfo">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-5 footer-copy_w3ls">
                <div class="d-lg-flex justify-content-between">
                    <div class="mt-2 sub-some align-self-lg-center">
                        <h5>Payment Method</h5>
                        <ul class="mt-4">
                            <li class="list-inline-item">
                                <img src="<?php echo base_url()?>assets/website_assets/images/pay2.png" alt="">
                            </li>
                            <li class="list-inline-item">
                                <img src="<?php echo base_url()?>assets/website_assets/images/pay5.png" alt="">
                            </li>
                            <li class="list-inline-item">
                                <img src="<?php echo base_url()?>assets/website_assets/images/pay3.png" alt="">
                            </li>
                            <li class="list-inline-item">
                                <img src="<?php echo base_url()?>assets/website_assets/images/pay7.png" alt="">
                            </li>
                            <li class="list-inline-item">
                                <img src="<?php echo base_url()?>assets/website_assets/images/pay8.png" alt="">
                            </li>
                            <li class="list-inline-item ">
                                <img src="<?php echo base_url()?>assets/website_assets/images/pay9.png" alt="">
                            </li>
                        </ul>
                    </div>
                    <div class="cpy-right align-self-center">
                        <h2 class="agile_btxt">
                            <a href="index.html">
                                <span>O</span>nline
                                <span>S</span>hopping</a>
                       
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <style type="text/css">
        .img-fluid {
    max-width: 100px;
    height: 90px;
}
    </style>

    <!-- <script type="text/javascript">
        document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
     return false;
  }
}
      </script>

      <script type="text/javascript" language="javascript">
        $(function() {
            $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
        }); 
</script> -->
