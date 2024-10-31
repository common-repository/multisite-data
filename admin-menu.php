<?php





// Hook for adding admin menus



add_action('admin_menu', 'multi_site_data_my_menu_pages');







// action function for above hook







function multi_site_data_my_menu_pages() {







    // Add a new top-level menu ( ):



    add_menu_page(__('Multi Data','multi_data'), __('Multi Data','multi_data'), 'manage_data', 'md_view_multi_data', 'vieworder_mgmt', plugin_dir_url( __FILE__ ) . 'images/snumber.png' );

    $hook_campus =   add_submenu_page('md_view_multi_data', __('Dashboard','multi_data'), __('Dashboard','mdw_dashboard'), 'manage_options', 'managedata_dashboard', 'mdw_dashboard');

   $hook_campus =   add_submenu_page('md_view_multi_data', __('View Websites','multi_data'), __('View Websites','mdw_weblist'), 'manage_options', 'managedata_websitelist', 'mdw_weblist');



 $hook_campus =   add_submenu_page('md_view_multi_data', __('Add Websites','multi_data'), __('Add Websites','mdw_addweblist'), 'manage_options', 'managedata_addwebsitelist', 'mdw_addweblist');

    $hook_campus =   add_submenu_page('md_view_multi_data', __('View All Products','multi_data'), __('View All Products','mdw_allproductlist'), 'manage_options', 'managedata_allproductlist', 'mdw_allproductlist');







 $hook_campus =   add_submenu_page('md_view_multi_data', __('Order List','multi_data'), __('Order List','mdw_orderedproductlist'), 'manage_options', 'mdw_orderedproductlist', 'mdw_orderedproductlist');





 $hook_campus =   add_submenu_page('md_view_multi_data', __('Customer List','multi_data'), __('Customer List','mdw_customerlist'), 'manage_options', 'mdw_customerlist', 'mdw_customerlist');





 $hook_campus =   add_submenu_page('md_view_multi_data', __('Monthly Sales Report','multi_data'), __('Monthly Sales Report','mdw_salesreportlist'), 'manage_options', 'mdw_salesreportlist', 'mdw_salesreportlist');



 $hook_campus =   add_submenu_page('md_view_multi_data', __('Order Status','multi_data'), __('Order Status','mdw_ordertotals'), 'manage_options', 'mdw_ordertotals', 'mdw_ordertotals');





 $hook_campus =   add_submenu_page('md_view_multi_data', __('Advance Search Order','multi_data'), __('Advance Search Order','mdw_orderedproductlist_advsrch'), 'manage_options', 'mdw_orderedproductlist_advsrch', 'mdw_orderedproductlist_advsrch');





 $hook_campus =   add_submenu_page('md_view_multi_data', __('Upgrade to Pro','multi_data'), __('Upgrade to Pro','mdw_registration'), 'manage_options', 'mdw_registration', 'mdw_registration');





 $hook_campus =   add_submenu_page('md_view_multi_data', __('Help','multi_data'), __('Help','mdw_help'), 'manage_options', 'mdw_help', 'mdw_help');





require_once('mdw_dashboard.php');
require_once('mdw_weblist.php');
require_once('mdw_allproductlist.php');
require_once('mdw_orderedproductlist.php');
require_once('mdw_customerlist.php');
require_once('mdw_salesreportlist.php');
require_once('mdw_ordertotals.php');
require_once('mdw_orderedproductlist_advsrch.php');
require_once('mdw_addweblist.php');
require_once('mdw_registration.php');
require_once('mdw_help.php');





































}























?>