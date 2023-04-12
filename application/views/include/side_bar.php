
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/admin_assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/admin_assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Online Shopping
  </title>
  
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url()?>assets/admin_assets/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url()?>assets/admin_assets/demo/demo.css" rel="stylesheet" />
  <!-- Google Tag Manager -->
  
  <!-- End Google Tag Manager -->
</head>

<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <?php $background='sidebar-1.jpg';$colour='black';$dataclr='green';
            if(!empty($this->session->userdata('customer_id')) && $this->session->userdata('role') == 'customer'){
              $background='sidebar-2.jpg';$colour='white';$dataclr='green';
            }
            elseif($this->session->userdata('role') == 'admin') 
            {
              $background='sidebar-1.jpg';$colour='black';$dataclr='rose';
            }
            elseif($this->session->userdata('role') == 'seller') 
            {
              $background='sidebar-1.jpg';$colour='black';
            }
            ?>
    <div class="sidebar" data-color="<?php echo $dataclr;?>" data-background-color="<?php echo $colour;?>" data-image="<?php echo base_url()?>assets/admin_assets/img/<?php echo $background;?>">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <?php 
          $a="";$dashboard_link = "";
          if($this->session->userdata('role') =='admin'){ $a="own";$dashboard_link = "admin_home"; } 
          if($this->session->userdata('role') =='seller'){$dashboard_link = "seller_home"; } 
          if($this->session->userdata('role') =='customer'){$dashboard_link = "customer_home"; }
          ?>
      <div class="logo"><a href="<?php echo base_url().$dashboard_link;?>" class="simple-text logo-mini">
          OS
        </a>
        <a href="<?php echo base_url().$dashboard_link;?>" class="simple-text logo-normal">
          Online Shopping
        </a></div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="<?php echo base_url()?>uploads/<?php echo get_value('tbl_login','customer_id',$this->session->userdata('customer_id'),'photo'); ?>" />
            
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username" >
              <span>
                <?php echo $this->session->userdata('user_name'); ?>
                <b class="caret"></b>
              </span>
            </a>
            <?php 
            $show_pro = '';
              if($this->uri->segment('1') == 'profile_seller' || $this->uri->segment('1') == 'profile')
                { 
                  $show_pro="show";
                }
            ?>
            <div class="collapse <?php echo $show_pro; ?>" id="collapseExample">
              <ul class="nav">
                <?php if(($this->session->userdata('role') =='seller')){ 
                  $profile_link = 'profile_seller';
                }
                else{
                  $profile_link = 'profile';
                } ?>
                <li class="nav-item <?php if($this->uri->segment('1') == $profile_link){ echo"active";} ?>">
                  <a class="nav-link" href="<?php echo base_url().$profile_link; ?>">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url()."logout"; ?>">
                    <span class="sidebar-mini"> L </span>
                    <span class="sidebar-normal"> LogOut </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <?php if($this->session->userdata('role') =='customer'){ ?>
          <li class="nav-item <?php if($this->uri->segment('1') == $dashboard_link){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url().$dashboard_link;?>">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
        <?php } ?>
          <?php if($this->session->userdata('role') =='admin' || ($this->session->userdata('role') =='seller') && $this->session->userdata('admin_approve_cmy') == '2'){ ?>
          <li class="nav-item <?php if($this->uri->segment('1') == $dashboard_link){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url().$dashboard_link;?>">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'cat'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>cat">
              <i class="material-icons">widgets</i>
              <p> Category </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'sub_cat'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>sub_cat">
              <i class="material-icons">apps</i>
              <p> Sub Category </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'brand'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>brand">
              <i class="material-icons">image</i>
              <p> Add Brand </p>
            </a>
          </li>

          <!--  -->
          <?php 
            $show_product = '';
              if($this->uri->segment('1') == 'product' || $this->uri->segment('1') == 'product_view' || $this->uri->segment('1') == 'stock_list' || $this->uri->segment('1') == 'pro_qes_ans_seller' || $this->uri->segment('1') == 'pro_qes_ans_seller_c')
                { 
                  $show_product="show";
                }
                //  <?php echo $show_pro;
            ?>
          <!--  -->
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples3">
              <i class="material-icons">image</i>
              <p> <?php echo $a; ?> Products
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse  <?php echo $show_product; ?>" id="pagesExamples3">
              <ul class="nav">
                <li class="nav-item <?php if($this->uri->segment('1') == 'product'){ echo"active";} ?>">
                  <a class="nav-link" href="<?php echo base_url()?>product">
                    <i class="material-icons">add</i>
                    <p> Add Products </p>
                  </a>
                </li>
                <li class="nav-item <?php if($this->uri->segment('1') == 'product_view'){ echo"active";} ?>">
                  <a class="nav-link" href="<?php echo base_url()?>product_view">
                    <i class="material-icons">apps</i>
                    <p> View All Products </p>
                  </a>
                </li>
                <li class="nav-item <?php if($this->uri->segment('1') == 'stock_list'){ echo"active";} ?>">
                  <a class="nav-link" href="<?php echo base_url()?>stock_list">
                    <i class="material-icons">apps</i>
                    <p> Stock List </p>
                  </a>
                </li>
                <li class="nav-item <?php if($this->uri->segment('1') == 'pro_qes_ans_seller'){ echo"active";} ?>">
                    <a class="nav-link" href="<?php echo base_url()?>pro_qes_ans_seller">
                      <i class="material-icons">apps</i>
                    <p> FAQ Pending </p>
                    </a>
                </li>
                <li class="nav-item <?php if($this->uri->segment('1') == 'pro_qes_ans_seller_c'){ echo"active";} ?>">
                    <a class="nav-link" href="<?php echo base_url()?>pro_qes_ans_seller_c">
                      <i class="material-icons">apps</i>
                    <p> FAQ Complete </p>
                    </a>
                </li>
              </ul>
            </div>
          </li>
          <!--  -->
          <?php 
            $show_orders = '';
              if($this->uri->segment('1') == 'pending_orders' || $this->uri->segment('1') == 'orders' || $this->uri->segment('1') == 'complete_orders' || $this->uri->segment('1') == 'rejected_orders')
                { 
                  $show_orders="show";
                }
                //  <?php echo $show_pro;
            ?>
          <!--  -->

          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
              <i class="material-icons">image</i>
              <p> <?php echo $a; ?> Order 
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse <?php echo $show_orders; ?>" id="pagesExamples">
              <ul class="nav">
                <li class="nav-item <?php if($this->uri->segment('1') == 'pending_orders'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>pending_orders">
              <i class="material-icons">apps</i>
              <p> Pending Orders </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'orders'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>orders">
              <i class="material-icons">apps</i>
              <p> Shipped Orders </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'complete_orders'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>complete_orders">
              <i class="material-icons">apps</i>
              <p> Completed Orders </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'rejected_orders'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>rejected_orders">
              <i class="material-icons">apps</i>
              <p> Rejected Orders </p>
            </a>
          </li>
              </ul>
            </div>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'payment_details'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>payment_details">
              <i class="material-icons">apps</i>
              <p> <?php echo $a; ?> Payment </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'coupon_code'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>coupon_code">
              <i class="material-icons">apps</i>
              <p> <?php echo $a; ?> Coupon Cdoe </p>
            </a>
          </li>
          <?php if(($this->session->userdata('role') =='seller')){ ?>
          <li class="nav-item <?php if($this->uri->segment('1') == 'raise_ticket_pro'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>raise_ticket_pro">
              <i class="material-icons">apps</i>
              <p> Raise Ticket for Product </p>
            </a>
          </li>
          <?php }?>
          <?php if(($this->session->userdata('role') =='seller') ||($this->session->userdata('role') =='admin')){ ?>
          <li class="nav-item <?php if($this->uri->segment('1') == 'pro_qes_ans_seller'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>pro_qes_ans_seller">
              <i class="material-icons">apps</i>
            <p> FAQ Pending </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'pro_qes_ans_seller_c'){ echo"active";} ?>">
            <a class="nav-link" href="<?php //echo base_url()?>pro_qes_ans_seller_c">
              <i class="material-icons">apps</i>
            <p> FAQ Complete </p>
            </a>
          </li>
        <?php }?>
        <?php }else{ ?>
          <?php if($this->session->userdata('role') =='seller'){ ?>

          <center><p class="text-danger font-weight-bold"> Once Admin approved<br> Enable All Services </p></center>
          <?php } ?>
        <?php } ?>
         <?php if(($this->session->userdata('role') =='admin')){ ?>
          <li class="nav-item <?php if($this->uri->segment('1') == 'pending_seller'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>pending_seller">
              <i class="material-icons">apps</i>
              <p> Pending Sellers </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'approved_seller'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>approved_seller">
              <i class="material-icons">apps</i>
              <p> Approved Sellers </p>
            </a>
          </li>
          <!--  -->
          <?php 
            $show_products = '';
              if($this->uri->segment('1') == 'seller_products')
                { 
                  $show_products="show";
                }
                //  <?php echo $show_pro;
            ?>
          <!--  -->
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples12">
              <i class="material-icons">image</i>
              <p> Seller Product
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse <?php echo $show_products; ?>" id="pagesExamples12">
              <ul class="nav">
                <li class="nav-item <?php if($this->uri->segment('1') == 'seller_products'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>seller_products">
              <i class="material-icons">apps</i>
              <p> View All Products </p>
            </a>
          </li>
              </ul>
            </div>
          </li>
           <!--  -->
          <?php 
            $show_sorder = '';
              if($this->uri->segment('1') == 'pending_orders_sellers' ||$this->uri->segment('1') == 'orders_sellers' ||$this->uri->segment('1') == 'complete_orders_sellers' ||$this->uri->segment('1') == 'rejected_orders_sellers')
                { 
                  $show_sorder="show";
                }
                //  <?php echo $show_sorder;
            ?>
          <!--  -->
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples11">
              <i class="material-icons">image</i>
              <p> Seller Orders
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse <?php echo $show_sorder; ?>" id="pagesExamples11">
              <ul class="nav">
                <li class="nav-item <?php if($this->uri->segment('1') == 'pending_orders_sellers'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>pending_orders_sellers">
              <i class="material-icons">apps</i>
              <p> Pending Orders </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'orders_sellers'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>orders_sellers">
              <i class="material-icons">apps</i>
              <p> Shipped Orders </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'complete_orders_sellers'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>complete_orders_sellers">
              <i class="material-icons">apps</i>
              <p> Completed Orders </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'rejected_orders_sellers'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>rejected_orders_sellers">
              <i class="material-icons">apps</i>
              <p> Rejected Orders </p>
            </a>
          </li>
              </ul>
            </div>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'payment_details_seller'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>payment_details_seller">
              <i class="material-icons">apps</i>
              <p> Seller Payment </p>
            </a>
          </li>
           <!--  -->
          <?php 
            $show_pro_tickers = '';
              if($this->uri->segment('1') == 'pending_ticket_pro' ||$this->uri->segment('1') == 'reply_ticket_pro')
                { 
                  $show_pro_tickers="show";
                }
                //  <?php echo $show_pro_tickers;
            ?>
          <!--  -->
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples1">
              <i class="material-icons">image</i>
              <p> Product Tickets
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse <?php echo $show_pro_tickers; ?>" id="pagesExamples1">
              <ul class="nav">
                <li class="nav-item <?php if($this->uri->segment('1') == 'pending_ticket_pro'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>pending_ticket_pro">
              <i class="material-icons">apps</i>
              <p> Pending Ticket </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'reply_ticket_pro'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>reply_ticket_pro">
              <i class="material-icons">apps</i>
              <p> replyed Ticket </p>
            </a>
          </li>
              </ul>
            </div>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'pro_reports'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>pro_reports">
              <i class="material-icons">apps</i>
            <p> Order Reports </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'pro_reports2'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>pro_reports2">
              <i class="material-icons">apps</i>
            <p> Order Reports 2</p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'pro_qes_ans_admin'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>pro_qes_ans_admin">
              <i class="material-icons">apps</i>
            <p> Product FAQ's </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'public_feedback'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>public_feedback">
              <i class="material-icons">apps</i>
            <p> Public Feedback </p>
            </a>
          </li>
          <?php } ?>
          <?php if(($this->session->userdata('role') =='customer')){ ?>
            <li class="nav-item <?php if($this->uri->segment('1') == 'orders_customer'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>orders_customer">
              <i class="material-icons">apps</i>
              <p> Orders </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'wishlist_customer'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>wishlist_customer">
              <i class="material-icons">apps</i>
              <p> My Wishlist </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'pro_qes_ans_customer'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>pro_qes_ans_customer">
              <i class="material-icons">apps</i>
            <p> Product FAQ's </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'user_chatbot'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>user_chatbot">
              <i class="material-icons">apps</i>
            <p> ChatBot </p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>