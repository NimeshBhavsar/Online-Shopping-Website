<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Online Shopping Website</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8" />
	<meta name="keywords" content="Fashion Hub Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	
	<!-- Custom Theme files -->
	<link href="<?php echo base_url()?>assets/website_assets/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<!-- shop css -->
	<link href="<?php echo base_url()?>assets/website_assets/css/shop.css" type="text/css" rel="stylesheet" media="all">
	<link href="<?php echo base_url()?>assets/website_assets/css/flexslider.css" type="text/css" rel="stylesheet" media="all">
	<link href="<?php echo base_url()?>assets/website_assets/css/style.css" type="text/css" rel="stylesheet" media="all">
	<!-- Range-slider-css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/website_assets/css/jquery-ui1.css">

	<!-- font-awesome icons -->
	<link href="<?php echo base_url()?>assets/website_assets/css/fontawesome-all.min.css" rel="stylesheet">
	<!-- //Custom Theme files -->
	<!-- online-fonts -->
	<link href="//fonts.googleapis.com/css?family=Elsie+Swash+Caps:400,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
	<!-- //online-fonts -->
</head>

<body>
<script src="//m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>

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
	<!-- inner banner -->
	<div class="ibanner_w3 pt-sm-5 pt-3">
		<h4 class="head_agileinfo text-center text-capitalize text-center pt-5">
			<?php if(!empty($product_data[0]->cat_id)){ ?>
            <?php $get_cat_name = get_value('tbl_category','cat_id',$product_data[0]->cat_id,'category_name');
                    $get_cat_name_sep = explode(" ", $get_cat_name);
 foreach ($get_cat_name_sep as $key => $value2) { ?>
                                
                                <span><?php echo $value2[0]; ?></span><?php echo ltrim($value2, $value2[0]); ?>
                                <?php } ?></h4>
           <?php } ?>
	</div>
	<!-- //inner banner -->
	<!-- breadcrumbs -->
	<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url()?>website_home">Home</a>
            </li>
            <?php if(!empty($product_data[0]->cat_id)){ ?>
            
            <li class="breadcrumb-item active" aria-current="page"><?php echo get_value('tbl_category','cat_id',$product_data[0]->cat_id,'category_name'); ?></li>
        <?php } ?>
        </ol>
    </nav>
	<!-- //breadcrumbs -->
	<!-- Shop -->
	<div class="innerf-pages section">
		<div class="fh-container mx-auto">
			<div class="row my-lg-5 mb-5">
				<!-- grid left -->
				<div class="side-bar col-lg-3">
					<!--preference -->
					<div class="left-side">
						<h3 class="shopf-sear-headits-sear-head">
							Sub Categories</h3>
						<ul>
								<input type="checkbox" class="checked search_cat" name="subcat[]" value="0" checked style="opacity:0; position:absolute; left:9999px;">
                            <?php foreach ($sub_category_data as $key => $value): ?> 
                            
							<li>
								<input type="checkbox" class="checked search_cat" name="subcat[]" value="<?php echo $value->sub_cat_id; ?>" id="<?php echo $value->sub_cat_id; ?>">
								<label for="<?php echo $value->sub_cat_id; ?>" class="search_cat"><?php echo $value->sub_cat_name; ?></label>
							</li>
                            <?php endforeach ?>
						</ul>
					</div>
                    <div class="left-side">
                        <h3 class="shopf-sear-headits-sear-head">
                            Brands</h3>
                        <ul>
                        	<input type="checkbox" class="checked search_cat" name="brand[]" value="0" checked style="opacity:0; position:absolute; left:9999px;">
                            <?php foreach ($brand_data as $key => $value): ?> 
                            
                            <li>
                                <input type="checkbox" class="checked search_cat" name="brand[]" value="<?php echo $value->brand_id; ?>" id="<?php echo "brand".$value->brand_id; ?>">
                                <label for="<?php echo "brand".$value->brand_id; ?>" class="search_cat"><?php echo $value->brand_name; ?></label>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
					<!-- price range -->
					<div class="range">
						<h3 class="shopf-sear-headits-sear-head">
							<span>Price</span> range</h3>
						<ul class="dropdown-menu6">
							<li>
                                <div class="rangeslider">
                                <input class="min search_cat" name="range_1" type="range" min="<?php if(!empty($low_value)){ echo $low_value[0]->pro_final_amount; } ?>" max="<?php if(!empty($high_value)){ echo $high_value[0]->pro_final_amount; } ?>" value="<?php if(!empty($low_value)){ echo $low_value[0]->pro_final_amount; } ?>" />
                                <input class="max search_cat" name="range_1" type="range" max="<?php if(!empty($high_value)){ echo $high_value[0]->pro_final_amount; } ?>" min="<?php if(!empty($low_value)){ echo $low_value[0]->pro_final_amount; } ?>" value="<?php if(!empty($high_value)){ echo $high_value[0]->pro_final_amount; } ?>" />
                                <span class="range_min light left"><?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> <?php if(!empty($low_value)){ echo $low_value[0]->pro_final_amount; } ?></span>
                                <span class="range_max light right"><?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> <?php if(!empty($high_value)){ echo $high_value[0]->pro_final_amount; } ?></span>
                            </div>
							</li>
						</ul>
                        <br>
					</div>
					<!-- //price range -->
					<!--preference -->
					<div class="left-side">
						<h3 class="shopf-sear-headits-sear-head">
							<span>latest</span> arrivals</h3>
						<ul>
							<li>
								<input type="checkbox" class="checked search_cat" id="arr1" name="days[]" value="30">
								<label for="arr1" class="search_cat">last 30 days</label>
							</li>
							<li>
								<input type="checkbox" class="checked search_cat" id="arr2" name="days[]" value="90">
								<label for="arr2" class="search_cat">last 90 days</label>
							</li>
							<li>
								<input type="checkbox" class="checked search_cat" id="arr3" name="days[]" value="150">
								<label for="arr3" class="search_cat">last 150 days</label>
							</li>

						</ul>
					</div>
					<!-- // preference -->
					
					<div class="left-side">
						<h3 class="shopf-sear-headits-sear-head">Discount</h3>
						<ul>
							<li>
								<input type="checkbox" class="checked search_cat" name="discount[]" id="dis1" value="100">
								<label for="dis1" class="search_cat"><?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> 0 - <?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> 100</label>
							</li>
							<li>
								<input type="checkbox" class="checked search_cat" name="discount[]" id="dis2" value="200">
								<label for="dis2" class="search_cat"><?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> 100 - <?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> 200</label>
							</li>
							<li>
								<input type="checkbox" class="checked" name="discount[]" id="dis3" value="500">
								<label for="dis3" class="search_cat"><?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> 200 - <?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> 500</label>
							</li>
							<li>
								<input type="checkbox" class="checked search_cat" name="discount[]" id="dis4" value="501">
								<label for="dis4" class="search_cat"><?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> 500 or more</label>
							</li>
						</ul>
					</div>
					<!-- //discounts -->
					<!-- reviews -->
					<div class="customer-rev left-side">
						<h3 class="shopf-sear-headits-sear-head">Customer Review</h3>
						<ul>
							<li>
								<input type="checkbox" class="checked pr-2 search_cat" name="review[]" id="r1" value="5">
								<a href="#r1">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<span for="r1"> 5.0</span>
								</a>
							</li>
							<li>
								<input type="checkbox" class="checked pr-2 search_cat" name="review[]" id="r2" value="4">
								<a href="#r2">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<span for="r2">4.0</span>
								</a>
							</li>
							<li>
								<input type="checkbox" class="checked pr-2 search_cat" name="review[]" id="r35" value="3.5">
								<a href="#r35">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-half-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<span for="r35">3.5</span>
								</a>
							</li>
							<li>
								<input type="checkbox" class="checked pr-2 search_cat" name="review[]" id="r3" value="3">
								<a href="#r3">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<span for="r3">3.0</span>
								</a>
							</li>
							<li>
								<input type="checkbox" class="checked pr-2 search_cat" name="review[]" id="r25" value="2.5">
								<a href="#r25">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-half-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<span for="r25">2.5</span>
								</a>
							</li>
						</ul>
					</div>
					<!-- //reviews -->
				</div>
				<!-- //grid left -->
				<!-- grid right -->
				<div class="col-lg-9 mt-lg-0 mt-5 right-product-grid">
					<!-- card group  -->
					<div class="card-group">
						<!-- card -->
                        <?php foreach ($product_data as $key => $value) { 
                            $get_availability = get_stock($value->product_id);
                                if($get_availability == 'Temporarily Unavailable')
                                {
                                    $ofs="out_w3";
                                }
                                else
                                {
                                    $ofs="";
                                }
                         ?>
						<div class="col-lg-3 col-sm-6 p-0 card_main">
                            <input type="hidden" name="" value="<?php echo $value->sub_cat_id;?>" class="card_subcat_id">
                            <input type="hidden" name="" value="<?php echo $value->brand_id;?>" class="card_brand_id">
                            <input type="hidden" name="" value="<?php echo $value->pro_final_amount;?>" class="card_pro_final_amount">
                            <input type="hidden" name="" value="<?php echo $value->pro_off_percentage;?>" class="card_pro_off_percentage">
                            <input type="hidden" name="" value="<?php echo $value->update_date;?>" class="card_update_date">
                            <input type="hidden" name="" value="<?php echo $value->product_id;?>" class="card_product_id">
                            <input type="hidden" name="" value="<?php echo get_rating($value->product_id);?>" class="card_rating">
							<div class="card product-men p-3 <?php echo $ofs;?>">
								<div class="men-thumb-item">
									<img src="<?php echo base_url()?>uploads/<?php echo $value->pro_img1; ?>" alt="img" class="card-img-top">
                                    <?php if(!empty($ofs)){ ?>
                                    <span class="px-2 position-absolute">out of stock</span>
                                    <?php }else{ ?>
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="<?php echo base_url()."product_v/".$value->product_id; ?>" class="link-product-add-cart" target="_blank">Quick View</a>
										</div>
									</div>
                                    <?php } ?>
								</div>
								<!-- card body -->
								<div class="card-body  py-3 px-2">
									<h5 class="card-title text-capitalize" title="<?php echo $value->pro_name; ?>"><?php echo $value->pro_name; ?></h5>
									<div class="card-text d-flex justify-content-between">
										<p class="text-dark font-weight-bold"><?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> <?php echo $value->pro_final_amount; ?></p>
										<p class="line-through"><?php echo get_value('tbl_login','customer_id',1,'money_type'); ?> <?php echo $value->pro_amount; ?></p>
									</div>
								</div>
								<!-- card footer -->
								<div class="card-footer d-flex justify-content-end">
									<?php $cart_a=0;$cart_clr="";$wishlist_a=0;$wishlist_clr=''; if(!empty($this->session->userdata('customer_id')) && ($this->session->userdata('role'))){ 
                                        $datavaluesthree = array('product_id' => $value->product_id , 'order_status' => 'PENDING' , 'customer_id' => $this->session->userdata('customer_id'));
                                        $get_data = get_data_array('tbl_cart',$datavaluesthree);
                                        if(!empty($get_data))
                                        {
                                            $cart_a=1;$cart_clr=" clr_red";
                                        }
                                        
                                        $datavalues12 = array('product_id' => $value->product_id , 'customer_id' => $this->session->userdata('customer_id'));
                                        $get_data1 = get_data_array('tbl_wishlist',$datavalues12);
                                        if(!empty($get_data1))
                                        {
                                            $wishlist_a=1;$wishlist_clr="clr_red";
                                        }
                                    } ?>
                                    <input type="hidden" name="" class="already_incart" value="<?php echo $cart_a;?>">
                                    <input type="hidden" name="" class="already_inwishlist" value="<?php echo $wishlist_a;?>">
                                        <input type="hidden" name="" class="cart_product_id" value="<?php echo $value->product_id;?>">
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
						</div>
                        <?php } ?>
							<!-- //row  -->
						</div>
						<!-- //card group -->
					</div>
				</div>
			</div>
		</div>
		<!--// Shop -->
    <?php $this->load->view('include/footer_website'); ?>
	 
    <!-- //footer -->
	<!---728x90--->
    <!-- sign up Modal -->
    
    <!-- //signup modal -->
    <!-- signin Modal -->
    
    <!-- signin Modal -->
    <!-- js -->
    <script src="<?php echo base_url()?>assets/website_assets/js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
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
    <!-- //smooth dropdown -->
    <!-- script for password match -->
    <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- script for password match -->
		<!-- cart-js -->
		<script src="<?php echo base_url()?>assets/website_assets/js/minicart.js"></script>
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
		<!-- price range (top products) -->
		<script src="<?php echo base_url()?>assets/website_assets/js/jquery-ui.js"></script>
		<script>
			//<![CDATA[ 
			$(window).load(function () {
				$("#slider-range").slider({
					range: true,
					min: 0,
					max: 9000,
					values: [50, 6000],
					slide: function (event, ui) {
						$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
					}
				});
				$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

			}); //]]>
		</script>
		<!-- //price range (top products) -->
		<script src="<?php echo base_url()?>assets/website_assets/js/bootstrap.js"></script>
		<!-- start-smoth-scrolling -->
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
		<!-- start-smoth-scrolling -->
		<!-- here stars scrolling icon -->
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
		<!-- //here ends scrolling icon -->
		<!-- smoothscroll -->
		<script src="<?php echo base_url()?>assets/website_assets/js/SmoothScroll.min.js"></script>
		<!-- //smoothscroll -->




	</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<style type="text/css">
    .card-img-top{height: 220px;width: 202px;}
    a.hub-cart {
    font-size: 12px;
    letter-spacing: 1px;
    word-spacing: 2px;
    padding: 10px 25px;
    font-weight: 600;
    text-transform: uppercase !important;
    color: #000;
    background: #d8e9fa;
    outline: none;
    border: none;
    cursor: pointer;
    margin-left: 40px;
}
a.heart_own i {
    color: #0076be !important;
}
input[type='range'] {
  width: 210px;
  height: 30px;
  overflow: hidden;
  cursor: pointer;
    outline: none;
}
input[type='range'],
input[type='range']::-webkit-slider-runnable-track,
input[type='range']::-webkit-slider-thumb {
  -webkit-appearance: none;
    background: none;
}
input[type='range']::-webkit-slider-runnable-track {
  width: 200px;
  height: 1px;
  background: #003D7C;
}

input[type='range']:nth-child(2)::-webkit-slider-runnable-track{
  background: none;
}

input[type='range']::-webkit-slider-thumb {
  position: relative;
  height: 15px;
  width: 15px;
  margin-top: -7px;
  background: #fff;
  border: 1px solid #003D7C;
  border-radius: 25px;
  z-index: 1;
}


input[type='range']:nth-child(1)::-webkit-slider-thumb{
  z-index: 2;
}

.rangeslider{
    position: relative;
    height: 60px;
    width: 210px;
    display: inline-block;
    margin-top: -5px;
    margin-left: 20px;
}
.rangeslider input{
    position: absolute;
}
.rangeslider{
    position: absolute;
}

.rangeslider span{
    position: absolute;
    margin-top: 30px;
    left: 0;
}

.rangeslider .right{
   position: relative;
   float: right;
   margin-right: -5px;
}


/* Proof of concept for Firefox */
@-moz-document url-prefix() {
  .rangeslider::before{
    content:'';
    width:100%;
    height:2px;
    background: #003D7C;
    display:block;
    position: relative;
    top:16px;
  }

  input[type='range']:nth-child(1){
    position:absolute;
    top:35px !important;
    overflow:visible !important;
    height:0;
  }

  input[type='range']:nth-child(2){
    position:absolute;
    top:35px !important;
    overflow:visible !important;
    height:0;
  }
input[type='range']::-moz-range-thumb {
  position: relative;
  height: 15px;
  width: 15px;
  margin-top: -7px;
  background: #fff;
  border: 1px solid #003D7C;
  border-radius: 25px;
  z-index: 1;
}

  input[type='range']:nth-child(1)::-moz-range-thumb {
      transform: translateY(-20px);    
  }
  input[type='range']:nth-child(2)::-moz-range-thumb {
      transform: translateY(-20px);    
  }
}
.card-title{white-space: nowrap;overflow: hidden;
  text-overflow: ellipsis;}
  .display23_none{display: none!important;}
.display23_block{display: block!important;}
.clr_red{
    color: #ff4343 !important;
}
<?php if(!empty($product_data)){ ?>
    .ibanner_w3 {
    background: url(<?php echo base_url()."uploads/".get_value('tbl_category','cat_id',$product_data[0]->cat_id,'cat_img');?>)no-repeat center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    background-size: cover;
    min-height: 260px;
}
 <?php } ?>
</style>
<script type="text/javascript">
    (function() {

        function addSeparator(nStr) {
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + '.' + '$2');
            }
            return x1 + x2;
        }

        function rangeInputChangeEventHandler(e){
            var rangeGroup = $(this).attr('name'),
                minBtn = $(this).parent().children('.min'),
                maxBtn = $(this).parent().children('.max'),
                range_min = $(this).parent().children('.range_min'),
                range_max = $(this).parent().children('.range_max'),
                minVal = parseInt($(minBtn).val()),
                maxVal = parseInt($(maxBtn).val()),
                origin = $(this).context.className;

            if(origin === 'min' && minVal > maxVal-5){
                $(minBtn).val(maxVal-5);
            }
            var minVal = parseInt($(minBtn).val());
            $(range_min).html('₹ ' + addSeparator(minVal*1000));


            if(origin === 'max' && maxVal-5 < minVal){
                $(maxBtn).val(5+ minVal);
            }
            var maxVal = parseInt($(maxBtn).val());
            $(range_max).html('₹ ' + addSeparator(maxVal*1000));
        }

     $('input[type="range"]').on( 'input', rangeInputChangeEventHandler);
})();
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.search_cat').on('click',function(){
			var display_array = [];
			var all_product_array = [];
			var get_subcatid='';
			var subcat_array = $('input[name="subcat[]"]:checked').map(function () {
    		return this.value;
			}).get();
			// console.log(subcat_array);
			if(subcat_array.length > 0)
			{
				$('.card_main').each(function(index, element) {
		        	get_subcatid = $(this).find('.card_subcat_id').val();
		        	card_product_id = $(this).find('.card_product_id').val();
		        	if(jQuery.inArray(get_subcatid, subcat_array) !== -1)
		        	{
		        		display_array.push(card_product_id);
		        	}
		        });
			}
			//brand code start here
			var get_brandid='';
			var brand_array = $('input[name="brand[]"]:checked').map(function () {
    		return this.value;
			}).get();
			// console.log(brand_array);
			if(brand_array.length > 0)
			{
				$('.card_main').each(function(index, element) {
		        	get_brandid = $(this).find('.card_brand_id').val();
		        	card_product_id = $(this).find('.card_product_id').val();
		        	if(jQuery.inArray(get_brandid, brand_array) !== -1)
		        	{
		        		display_array.push(card_product_id);
		        	}
		        	
		        });
			}
			//brand code start here end
			//range code start here end
			var get_range_min = parseInt((($('.range_min').text()).slice(2,-4)).replace(/\./g, ''));
			var get_range_max = parseInt((($('.range_max').text()).slice(2,-4)).replace(/\./g, ''));
			if(get_range_min > 0 && get_range_max > 0)
			{
				$('.card_main').each(function(index, element) {
		        	get_pro_final_amount = $(this).find('.card_pro_final_amount').val();
		        	card_product_id = $(this).find('.card_product_id').val();
		        	if(get_range_min <= get_pro_final_amount && get_pro_final_amount <= get_range_max)
		        	{
		        		display_array.push(card_product_id);
		        	}
		        	
		        });
			}
			//range code start here end
			//days with search
			var get_days='';
			var days_array = $('input[name="days[]"]:checked').map(function () {
    		return this.value;
			}).get();
			if(days_array.length > 0)
			{
				$('.card_main').each(function(index, element) {
		        	get_days = $(this).find('.card_update_date').val();
		        	card_product_id = $(this).find('.card_product_id').val();
		        	var date1 = new Date(get_days);
					var today = new Date(); //less than 1
					var start = Math.floor(date1.getTime() / (3600 * 24 * 1000)); //days as integer from..
					var end = Math.floor(today.getTime() / (3600 * 24 * 1000)); //days as integer from..
					var daysDiff = end - start; // exact dates

						var maxValueInArray = Math.max.apply(Math, days_array);
						if(daysDiff < maxValueInArray)
			        	{
			        		display_array.push(card_product_id);
			        	}
		        	;
		        });
			}
			//days with search end
			//discount amount start here
			var get_discount='';
			var discount_array = $('input[name="discount[]"]:checked').map(function () {
    		return this.value;
			}).get();
			if(discount_array.length > 0)
			{
				$('.card_main').each(function(index, element) {
		        	get_discount = $(this).find('.card_pro_off_percentage').val();
					card_product_id = $(this).find('.card_product_id').val();
		        	var maxValueInArray = Math.max.apply(Math, discount_array);
		        	var minValueInArray = Math.min.apply(Math, discount_array);
		        	if(parseInt(minValueInArray) <= parseInt(get_discount))
		        	{
		        		display_array.push(card_product_id);		
		        	}
		        });
			}
			//discount amount start here end
			//star rating here start here
			var get_review='';
			var review_array = $('input[name="review[]"]:checked').map(function () {
    		return this.value;
			}).get();
			if(review_array.length > 0)
			{
				$('.card_main').each(function(index, element) {
		        	get_review = $(this).find('.card_rating').val();
		        	card_product_id = $(this).find('.card_product_id').val();
		        	var maxValueInArray = Math.max.apply(Math, review_array);
		        	var minValueInArray = Math.min.apply(Math, review_array);

		        	if(parseInt(get_review) >= parseInt(minValueInArray))
		        	{
		        		display_array.push(card_product_id);
		        	}
		        });
			}
			//star rating here here end
			//

			$('.card_main').each(function(index, element) {
				card_product_id = $(this).find('.card_product_id').val();
				if(jQuery.inArray(card_product_id, display_array) !== -1)
		        	{
		        		$(this).removeClass('display23_none').addClass('display23_block');
		        	}
		        	else
		        	{
		        		if(display_array.length !=0)
		        		{
		        			$(this).removeClass('display23_block').addClass('display23_none');
		        		}
		        		else
		        		{
		        			$('.card_main').removeClass('display23_none').addClass('display23_block');
		        		}
		        	}
			});
		});
	});
</script>
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