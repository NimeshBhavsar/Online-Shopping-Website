
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Online Shopping Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    
    <!-- Custom Theme files -->
    <link href="<?php echo base_url()?>assets/website_assets/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <!-- shop css -->
    <link href="<?php echo base_url()?>assets/website_assets/css/shop.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/website_assets/css/owl.carousel.min.css">
    <!-- Owl-Carousel-CSS -->
    <link href="<?php echo base_url()?>assets/website_assets/css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="<?php echo base_url()?>assets/website_assets/css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Elsie+Swash+Caps:400,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- //online-fonts -->
</head>

<body>

<script async src='<?php echo base_url()?>assets/website_assets/js/autotrack.js'></script>

<meta name="robots" content="noindex">
<body><link rel="stylesheet" href="<?php echo base_url()?>assets/website_assets/assests/css/font-awesome.min.css">
<!-- New toolbar-->
<style>
* {
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}


#w3lDemoBar.w3l-demo-bar {
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  padding: 40px 5px;
  padding-top:70px;
  margin-bottom: 70px;
  background: #0D1326;
  border-top-left-radius: 9px;
  border-bottom-left-radius: 9px;
}

#w3lDemoBar.w3l-demo-bar a {
  display: block;
  color: #e6ebff;
  text-decoration: none;
  line-height: 24px;
  opacity: .6;
  margin-bottom: 20px;
  text-align: center;
}

#w3lDemoBar.w3l-demo-bar span.w3l-icon {
  display: block;
}

#w3lDemoBar.w3l-demo-bar a:hover {
  opacity: 1;
}

#w3lDemoBar.w3l-demo-bar .w3l-icon svg {
  color: #e6ebff;
}
#w3lDemoBar.w3l-demo-bar .responsive-icons {
  margin-top: 30px;
  border-top: 1px solid #41414d;
  padding-top: 40px;
}
#w3lDemoBar.w3l-demo-bar .demo-btns {
  border-top: 1px solid #41414d;
  padding-top: 30px;
}
#w3lDemoBar.w3l-demo-bar .responsive-icons a span.fa {
  font-size: 26px;
}
#w3lDemoBar.w3l-demo-bar .no-margin-bottom{
  margin-bottom:0;
}
.toggle-right-sidebar span {
  background: #0D1326;
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  color: #e6ebff;
  border-radius: 50px;
  font-size: 26px;
  cursor: pointer;
  opacity: .5;
}
.pull-right {
  float: right;
  position: fixed;
  right: 0px;
  top: 70px;
  width: 90px;
  z-index: 99999;
  text-align: center;
}
/* ============================================================
RIGHT SIDEBAR SECTION
============================================================ */

#right-sidebar {
  width: 90px;
  position: fixed;
  height: 100%;
  z-index: 1000;
  right: 0px;
  top: 0;
  margin-top: 60px;
  -webkit-transition: all .5s ease-in-out;
  -moz-transition: all .5s ease-in-out;
  -o-transition: all .5s ease-in-out;
  transition: all .5s ease-in-out;
  overflow-y: auto;
}


/* ============================================================
RIGHT SIDEBAR TOGGLE SECTION
============================================================ */

.hide-right-bar-notifications {
  margin-right: -300px !important;
  -webkit-transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}



@media (max-width: 992px) {
  #w3lDemoBar.w3l-demo-bar a.desktop-mode{
      display: none;

  }
}
@media (max-width: 767px) {
  #w3lDemoBar.w3l-demo-bar a.tablet-mode{
      display: none;

  }
}
@media (max-width: 568px) {
  #w3lDemoBar.w3l-demo-bar a.mobile-mode{
      display: none;
  }
  #w3lDemoBar.w3l-demo-bar .responsive-icons {
      margin-top: 0px;
      border-top: none;
      padding-top: 0px;
  }
  #right-sidebar,.pull-right {
      width: 90px;
  }
  #w3lDemoBar.w3l-demo-bar .no-margin-bottom-mobile{
      margin-bottom: 0;
  }
}
</style>



</div>

<!---728x90--->
            <?php $this->load->view('include/website_header'); ?>
            
            <!-- bottom nav -->
            <?php $this->load->view('include/header_webiste'); ?>
            <!-- //bottom nav -->
        </div>
        <!-- //header container -->
    </header>
    <!-- //header -->
	<!---728x90--->
    <!-- banner -->
    <div class="banner-text">
        <div class="callbacks_container">
            <ul class="rslides" id="slider3">
                <!--  -->
                <?php foreach ($banner_offer as $key => $value) { 
                    $get_cat_name = get_value('tbl_category','cat_id',$value->cat_id,'category_name');
                    $get_cat_name_sep = explode(" ", $get_cat_name);
                    $get_sub_cat_name = get_value('tbl_sub_category','sub_cat_id',$value->sub_cat_id,'sub_cat_name');
                    $get_sub_cat_name_sep = explode(" ", $get_sub_cat_name);
                    ?>
                   <?php if($key == 0) { ?>
                <li class="banner">
                    <?php }else{ ?>
                        <li class="banner banner<?php echo ++$key; ?>">
                    <?php } ?>

                    <div class="container">
                        <h3 class="agile_btxt">
                            <span>O</span>nline
                            <span>S</span>hopping
                        </h3>
                        <h4 class="w3_bbot">SHOP EXCLUSIVE ITEM for you</h4>
                        <div class="slider-info mt-sm-5">
                            <h4 class="bn_right">
                               <?php foreach ($get_cat_name_sep as $key => $value2) { ?>
                                
                                <span><?php echo $value2[0]; ?></span><?php echo ltrim($value2, $value2[0]); ?>
                                <?php } ?>
                                <?php foreach ($get_sub_cat_name_sep as $key => $value3) { ?>
                                
                                <span><?php echo $value3[0]; ?></span><?php echo ltrim($value3, $value3[0]); ?>
                                <?php } ?></h4>
                                
                            <div class="bnr_clip position-relative">
                                <h4>get up to <span class="money_type"><?php echo get_value('tbl_login','customer_id',1,'money_type'); ?></span>
                                    <span class="px-2"><?php echo $value->pro_off_percentage; ?></span>
                                </h4>
                                <div class="d-inline-flex flex-column banner-pos position-absolute text-center">
                                    <div class="bg-flex-item">
                                        <span>O</span>
                                    </div>
                                    <div class="bg-flex-item">
                                        <span>F</span>
                                    </div>
                                    <div class="bg-flex-item">
                                        <span>F
                                        </span>
                                    </div>
                                </div>
                                <p class="text-uppercase py-2">on special sale</p>
                                <a class="btn btn-primary mt-3 text-capitalize" href="<?php echo base_url()."product_v/".$value->product_id; ?>" role="button">shop now</a>
                            </div>
                        </div>
                    </div>
                </li>
                 <?php } ?>
                <!--  -->
            </ul>
        </div>
    </div>
    <!-- //banner -->
    <!--services-->
    <div class="agileits-services" id="services">
        <div class="no-gutters agileits-services-row row">
            <div class="col-lg-3 col-sm-6 agileits-services-grids p-sm-5 p-3">
                <span class="fas fa-sync-alt p-4"></span>
                <h4 class="mt-2 mb-3">30 days replacement</h4>
            </div>
            <div class="col-lg-3 col-sm-6 agileits-services-grids p-sm-5 p-3">
                <span class="fas fa-gift p-4"></span>
                <h4 class="mt-2 mb-3">Gift Card</h4>
            </div>

            <div class="col-lg-3 col-sm-6 agileits-services-grids p-sm-5 p-3">
                <span class="fas fa-lock p-4"></span>
                <h4 class="mt-2 mb-3">secure payments</h4>
            </div>
            <div class="col-lg-3 col-sm-6 agileits-services-grids p-sm-5 p-3">
                <span class="fas fa-shipping-fast p-4"></span>
                <h4 class="mt-2 mb-3">free shipping</h4>
            </div>
        </div>
    </div>
    <!-- //services-->
    <!-- about -->
    <div class="row no-gutters pb-5">
        <?php foreach ($category as $key => $value) { ?>
        <div class="col-sm-4 pb-3">
            <div class="hovereffect">
                <img class="img-fluid1" src="<?php echo base_url()."uploads/".$value->cat_img; ?>" alt="">
                <div class="overlay">
                    <h5><?php echo $value->category_name;?></h5>
                    <a class="info" href="<?php echo base_url()."cat_v/".$value->cat_id; ?>">Shop Now</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <!-- //about -->
    <section class="tabs_pro py-md-5 pt-sm-3 pb-5">
        <h5 class="head_agileinfo text-center text-capitalize pb-5">
            <span>S</span>mart <span>P</span>roducts</h5>
        <div class="tabs tabs-style-line pt-md-5">
            <nav class="container">
                <ul id="clothing-nav" class="nav nav-tabs tabs-style-line" role="tablist">
                    <?php foreach ($category as $key => $value) { 
                        if($key == 0)
                    {
                        $active="active";
                    }
                    else
                    {
                        $active="";
                    }
                        ?>
                        <li class="nav-item">
                        <a class="nav-link <?php echo $active; ?>" href="#<?php echo $value->cat_id;?>" id="<?php echo $value->cat_id;?>-tab" role="tab" data-toggle="tab" aria-controls="<?php echo $value->cat_id;?>" aria-expanded="true"><?php echo $value->category_name;?></a>
                    </li>

                    <?php } ?>
                </ul>
            </nav>
            <!-- Content Panel -->
            <div id="clothing-nav-content" class="tab-content py-sm-5">
                 <?php foreach ($category as $key => $value) { 
                    $get_data = get_data('tbl_products','cat_id',$value->cat_id);
                    if($key == 0)
                    {
                        $active="active";
                    }
                    else
                    {
                        $active="";
                    }
                 ?>
                <div role="tabpanel" class="tab-pane fade show <?php echo $active; ?>" id="<?php echo $value->cat_id;?>" aria-labelledby="<?php echo $value->cat_id;?>-tab">
                    <div id="owl-demo" class="owl-carousel text-center">
                        <?php if(!empty($get_data)) {
                            foreach ($get_data as $key => $value1) { 
                                $get_availability = get_stock($value1->product_id);
                                if($get_availability == 'Temporarily Unavailable')
                                {
                                    $ofs="out_w3";
                                }
                                else
                                {
                                    $ofs="";
                                }
                                ?>
                        <div class="item">
                            <!-- card -->
                            <div class="card product-men p-3 <?php echo $ofs;?>">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url()."uploads/".$value1->pro_img1;?>" alt="img" class="card-img-top img_own">
                                    <?php if(!empty($ofs)){ ?>
                                    <span class="px-2 position-absolute">out of stock</span>
                                    <?php }else{ ?>
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo base_url()."product_v/".$value1->product_id;?>" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <!-- card body -->
                                <div class="card-body  py-3 px-2">
                                    <h5 class="card-title text-capitalize" title="<?php echo $value1->pro_name;?>"><?php echo $value1->pro_name;?></h5>
                                    <div class="card-text d-flex justify-content-between">
                                        <p class="text-dark font-weight-bold"><?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> <?php echo $value1->pro_final_amount;?></p>
                                        <p class="line-through"><?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> <?php echo $value1->pro_amount;?></p>
                                    </div>
                                </div>
                                <!-- card footer -->
                                <div class="card-footer d-flex justify-content-end">
                                    <?php $cart_a=0;$cart_clr=""; $wishlist_a=0;$wishlist_clr=''; if(!empty($this->session->userdata('customer_id')) && ($this->session->userdata('role'))){ 
                                        $datavaluesthree = array('product_id' => $value1->product_id , 'order_status' => 'PENDING' , 'customer_id' => $this->session->userdata('customer_id'));
                                        $get_data = get_data_array('tbl_cart',$datavaluesthree);
                                        if(!empty($get_data))
                                        {
                                            $cart_a=1;$cart_clr=" clr_red";
                                        }
                                        //
                                        
                                        $datavalues12 = array('product_id' => $value1->product_id , 'customer_id' => $this->session->userdata('customer_id'));
                                        $get_data1 = get_data_array('tbl_wishlist',$datavalues12);
                                        if(!empty($get_data1))
                                        {
                                            $wishlist_a=1;$wishlist_clr=" clr_red";
                                        }
                                    }?>
                                    <input type="hidden" name="" class="already_incart" value="<?php echo $cart_a;?>">
                                    <input type="hidden" name="" class="already_inwishlist" value="<?php echo $wishlist_a;?>">
                                        <input type="hidden" name="" class="cart_product_id" value="<?php echo $value1->product_id;?>">
                                        <?php if(empty($ofs)){ ?>
                                        <button type="submit" class="hub-cart phub-cart btn add_to_cart">
                                            <i class="fa fa-cart-plus <?php echo $cart_clr;?>" aria-hidden="true"></i>
                                        </button>
                                        <?php } ?>
                                        <button type="submit" class="hub-cart phub-cart btn add_to_wishlist ml-5">
                                            <i class="fa fa-heart <?php echo $wishlist_clr;?>" aria-hidden="true"></i>
                                        </button>
                                </div>
                            </div>
                            <!-- //card -->
                        </div>
                        <?php } ?>

                        <div class="item">
                            <div class="product-men p-3 text-center">
                                <img src="<?php echo base_url()?>assets/website_assets/images/p2.png" class="img-responsive" alt="" />
                                <a href="<?php echo base_url()."cat_v/".$value1->cat_id;?>" class="btn btn-lg bg-info text-white">view more</a>
                            </div>
                        </div>
                    <?php }else{ ?>
                            <span>No Products In this Category</span>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- product tabs -->
    
    <!-- //product tabs -->
    <!-- insta posts -->
    <section class="py-lg-5">
        <!-- insta posts -->
        <h5 class="head_agileinfo text-center text-capitalize pb-5">
            <span>s</span>hop on insta</h5>
        <div class="gallery row no-gutters pt-lg-5">
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="<?php echo base_url()?>assets/website_assets/images/i1.jpg" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> 56</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> 2</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="<?php echo base_url()?>assets/website_assets/images/i2.jpg" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> 89</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> 5</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="<?php echo base_url()?>assets/website_assets/images/i3.jpg" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> 42</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> 1</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="<?php echo base_url()?>assets/website_assets/images/i4.jpg" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> 38</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> 0</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="<?php echo base_url()?>assets/website_assets/images/i5.jpg" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> 38</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> 0</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="<?php echo base_url()?>assets/website_assets/images/i6.jpg" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> 38</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> 0</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="gallery row no-gutters pb-5">
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="<?php echo base_url()?>assets/website_assets/images/i7.jpg" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> 56</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> 2</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="<?php echo base_url()?>assets/website_assets/images/i8.jpg" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> 89</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> 5</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="<?php echo base_url()?>assets/website_assets/images/i9.jpg" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> 42</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> 1</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="<?php echo base_url()?>assets/website_assets/images/i10.jpg" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> 38</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> 0</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="<?php echo base_url()?>assets/website_assets/images/i11.jpg" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> 38</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> 0</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="<?php echo base_url()?>assets/website_assets/images/i12.jpg" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> 38</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> 0</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- //insta posts -->
    <!-- footer -->
    <?php $this->load->view('include/footer_website'); ?>
    
    <!-- //footer -->
	<!---728x90--->
    
    
    <!-- js -->
    <script src="<?php echo base_url()?>assets/website_assets/js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- script for show signin and signup modal -->
    
    <!-- //script for show signin and signup modal -->
    <!-- smooth dropdown -->
    <script>
        $(document).ready(function () {
            $('ul li.dropdown').hover(function () {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
            }, function () {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
            });
        });
    </script>
    <!-- Banner Responsiveslides -->
    <script src="<?php echo base_url()?>assets/website_assets/js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!-- // Banner Responsiveslides -->
    <!-- Product slider Owl-Carousel-JavaScript -->
    <script src="<?php echo base_url()?>assets/website_assets/js/owl.carousel.js"></script>
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: false,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            responsive: {
                320: {
                    items: 1,
                },
                568: {
                    items: 2,
                },
                991: {
                    items: 3,
                },
                1050: {
                    items: 4
                }
            }
        });
    </script>
    <!-- //Product slider Owl-Carousel-JavaScript -->
    <!-- cart-js -->
    <script src="<?php echo base_url()?>assets/website_assets/js/minicart.js">
    </script>
    <script>
        hub.render();

        hub.cart.on('new_checkout', function (evt) {
            var items, len, i;

            if (this.subtotal() > 0) {
                items = this.items();

                for (i = 0, len = items.length; i < len; i++) {}
            }
        });
    </script>
    <!-- //cart-js -->
    <!-- start-smooth-scrolling -->
    <script src="<?php echo base_url()?>assets/website_assets/js/move-top.js"></script>
    <script src="<?php echo base_url()?>assets/website_assets/js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="<?php echo base_url()?>assets/website_assets/js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()?>assets/website_assets/js/bootstrap.js"></script>



	</body>

</html>
<style type="text/css">
    .banner-pos {
    right: 15%;
    top: 40px;
    background: #fff;
    width: 30px;
}
<?php foreach ($banner_offer as $key => $value) { 
    if($key == 0)
    { ?>
       .banner {
    background: url(<?php echo base_url()."uploads/".$value->des_img4; ?>) no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    background-size: cover;
    position: relative;
} 
   <?php }else{ ?>
    .banner<?php echo ++$key; ?> {
    background: url(<?php echo base_url()."uploads/".$value->des_img4; ?>) no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    background-size: cover;
}
   <?php } ?>

 <?php } ?>
 .img-fluid1{height:562px !important ;}
 /*//450 × 562 px*/
 .img_own{height: 331px !important;width: 300px !important;}
 .clr_red{
    color: #ff4343 !important;
}
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $('.add_to_cart').on('click',function (){
            var product_id = $(this).closest(".card-footer").find('.cart_product_id').val();
            var already_incart = $(this).closest(".card-footer").find('.already_incart').val();
            var customer_id = "<?php echo $this->session->userdata('customer_id');?>";
            var role = "<?php echo $this->session->userdata('role');?>";
            var order_status = 'PENDING';
            if(role == 'customer')
            {
                if(already_incart == 1)
                {
                    alert("Already in Cart Please Check");
                }
                else
                {
                    $(this).closest('.card-footer').find('button i.fa-cart-plus').addClass('clr_red');
                    $(this).closest(".card-footer").find('.already_incart').val("1");
                    //
                     var $url="<?php echo base_url();?>add_to_cart";
                    
                    $.ajax({ 
                      url: $url,
                      type:"POST",
                      data: {product_id: product_id},
                      success: function ($data) {
                        if($data =='insert'){
                          alert("Product Added Successfully");
                        } 
                      },
                      error: function(){
                      }
                    });
                }
            }
            else
            {
                alert("Please Login and give add to cart");
            }
        });
 });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.add_to_wishlist').on('click',function (){
            var product_id = $(this).closest(".card-footer").find('.cart_product_id').val();
            var already_inwishlist = $(this).closest(".card-footer").find('.already_inwishlist').val();
            var customer_id = "<?php echo $this->session->userdata('customer_id');?>";
            var role = "<?php echo $this->session->userdata('role');?>";
            var order_status = 'PENDING';
            if(role == 'customer')
            {
                if(already_inwishlist == 1)
                {
                    alert("Already in Wishlist Please Check");
                }
                else
                {
                    $(this).closest('.card-footer').find('button i.fa-heart').addClass('clr_red');
                    $(this).closest(".card-footer").find('.already_inwishlist').val("1");
                    //
                     var $url="<?php echo base_url();?>add_to_wishlist";
                    
                    $.ajax({ 
                      url: $url,
                      type:"POST",
                      data: {product_id: product_id},
                      success: function ($data) {
                        if($data =='insert'){
                          alert("Product Added Successfully");
                        } 
                      },
                      error: function(){
                      }
                    });
                }
            }
            else
            {
                alert("Please Login and give add to wishlist");
            }
        });
 });
</script>
<style type="text/css">
    .card-title {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.money_type {
    font-size: 19px !important;
}
.banner-pos {
    right: 9%;
    top: 40px;
    background: #fff;
    width: 30px;
}
</style>
