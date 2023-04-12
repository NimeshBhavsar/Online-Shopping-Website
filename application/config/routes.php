<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login_validate'] = 'Login_controller/login_validate';
$route['logout'] = 'Login_controller/logout';
$route['login'] = 'Login_controller';
$route['registration'] = 'Login_controller/registration';
$route['check_mail'] = 'Login_controller/check_mail';
$route['register_validate'] = 'Login_controller/register_validate';
$route['otp_confirm/(:any)'] = 'Login_controller/otp_confirm/$i';
$route['otp_confirm_update'] = 'Login_controller/otp_confirm_update';
$route['delete_registraion/(:any)'] = 'Login_controller/delete_registraion/$i';
//
$route['admin_home'] = 'Admin_controller/admin_home';
$route['profile'] = 'Admin_controller/profile';
$route['profile_update'] = 'Admin_controller/profile_update';

$route['cat'] = 'Admin_controller/cat';
$route['cat_add'] = 'Admin_controller/cat_add';
$route['cat_edit/(:any)'] = 'Admin_controller/cat_edit/$i';
$route['cat_update'] = 'Admin_controller/cat_update';

$route['sub_cat'] = 'Admin_controller/sub_cat';
$route['sub_cat_add'] = 'Admin_controller/sub_cat_add';
$route['sub_cat_edit/(:any)'] = 'Admin_controller/sub_cat_edit/$i';
$route['sub_cat_update'] = 'Admin_controller/sub_cat_update';

//
$route['brand'] = 'Admin_controller/brand';
$route['brand_add'] = 'Admin_controller/brand_add';
$route['brand_edit/(:any)'] = 'Admin_controller/brand_edit/$i';
$route['brand_update'] = 'Admin_controller/brand_update';
//
$route['product'] = 'Admin_controller/product';
$route['product_add'] = 'Admin_controller/product_add';
$route['product_edit/(:any)'] = 'Admin_controller/product_edit/$i';
$route['product_update'] = 'Admin_controller/product_update';
$route['product_view'] = 'Admin_controller/product_view';

$route['get_subcategory'] = 'Admin_controller/get_subcategory';
$route['pending_seller'] = 'Admin_controller/pending_seller';
$route['approved_seller'] = 'Admin_controller/approved_seller';
$route['upd_cmy_appro/(:any)/(:any)'] = 'Admin_controller/upd_cmy_appro/$i/$j';
$route['reject_seller'] = 'Admin_controller/reject_seller';
$route['pending_ticket_pro'] = 'Admin_controller/pending_ticket_pro';
$route['reply_ticket_pro'] = 'Admin_controller/reply_ticket_pro';
$route['update_ticket_admin'] = 'Admin_controller/update_ticket_admin';
$route['seller_products'] = 'Admin_controller/seller_products';
$route['pending_orders_sellers'] = 'Admin_controller/pending_orders_sellers';
$route['orders_sellers'] = 'Admin_controller/orders_sellers';
$route['complete_orders_sellers'] = 'Admin_controller/complete_orders_sellers';
$route['rejected_orders_sellers'] = 'Admin_controller/rejected_orders_sellers';
$route['view_order_admin/(:any)'] = 'Admin_controller/view_order_admin/$i';
$route['payment_details_seller'] = 'Admin_controller/payment_details_seller';
$route['pro_qes_ans_admin'] = 'Admin_controller/pro_qes_ans_admin';
$route['stock_list'] = 'Admin_controller/stock_list';
$route['update_stock'] = 'Admin_controller/update_stock';
$route['public_feedback'] = 'Admin_controller/public_feedback';
$route['order_update_admin'] = 'Admin_controller/order_update_admin';
$route['coupon_code'] = 'Admin_controller/coupon_code';
$route['coupon_code_update'] = 'Admin_controller/coupon_code_update';
$route['coupon_code_edit/(:any)'] = 'Admin_controller/coupon_code_edit/$i';
$route['coupon_code_add'] = 'Admin_controller/coupon_code_add';

$route['seller_home'] = 'Seller_controller/seller_home';
$route['cm_profile_update'] = 'Seller_controller/cm_profile_update';
$route['profile_seller'] = 'Seller_controller/profile_seller';
$route['orders'] = 'Seller_controller/orders';
$route['view_order/(:any)'] = 'Seller_controller/view_order/$i';
$route['order_update'] = 'Seller_controller/order_update';
$route['pending_orders'] = 'Seller_controller/pending_orders';
$route['rejected_orders'] = 'Seller_controller/rejected_orders';
$route['complete_orders'] = 'Seller_controller/complete_orders';
$route['payment_details'] = 'Seller_controller/payment_details';
$route['raise_ticket_pro'] = 'Seller_controller/raise_ticket_pro';
$route['update_ticket'] = 'Seller_controller/update_ticket';
$route['pro_qes_ans_seller'] = 'Seller_controller/pro_qes_ans_seller';
$route['update_pro_qes_ans'] = 'Seller_controller/update_pro_qes_ans';
$route['pro_qes_ans_seller_c'] = 'Seller_controller/pro_qes_ans_seller_c';


$route['customer_home'] = 'Customer_controller/customer_home';
$route['orders_customer'] = 'Customer_controller/orders_customer';
$route['view_order_customer/(:any)'] = 'Customer_controller/view_order_customer/$i';
$route['cancel_order/(:any)'] = 'Customer_controller/cancel_order/$i';
$route['order_update_customer'] = 'Customer_controller/order_update_customer';
$route['wishlist_customer'] = 'Customer_controller/wishlist_customer';
$route['delete_wishlist/(:any)'] = 'Customer_controller/delete_wishlist/$i';
$route['pro_qes_ans_customer'] = 'Customer_controller/pro_qes_ans_customer';
$route['user_chatbot'] = 'Customer_controller/user_chatbot';
$route['check_bot_msg'] = 'Customer_controller/check_bot_msg';
$route['down_invocie/(:any)'] = 'Customer_controller/down_invocie/$i';

$route['website_home'] = 'Website_controller/website_home';
$route['product_v/(:any)'] = 'Website_controller/product_v/$i';
$route['qestion_pass'] = 'Website_controller/qestion_pass';
$route['qestion_vote'] = 'Website_controller/qestion_vote';
$route['review_vote'] = 'Website_controller/review_vote';
$route['cat_v/(:any)'] = 'Website_controller/cat_v/$i';
$route['add_to_cart'] = 'Website_controller/add_to_cart';
$route['add_to_wishlist'] = 'Website_controller/add_to_wishlist';
$route['customer_cart'] = 'Website_controller/customer_cart';
$route['cart_inc_dec'] = 'Website_controller/cart_inc_dec';
$route['cart_pro_remove'] = 'Website_controller/cart_pro_remove';
$route['order_placed'] = 'Website_controller/order_placed';
$route['sub_cat_v/(:any)'] = 'Website_controller/sub_cat_v/$i';
$route['product_search'] = 'Website_controller/product_search';
$route['contact'] = 'Website_controller/contact';
$route['send_feedback'] = 'Website_controller/send_feedback';


//order reports
$route['pro_reports'] = 'Admin_controller/pro_reports';
$route['pro_reports2'] = 'Admin_controller/pro_reports2';

//delete unwanted img
$route['delete_img'] = 'Admin_controller/delete_img';

$route['default_controller'] = 'Website_controller/website_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
