<?php 

/*
Plugin Name: Multisite Data
Plugin URI: https://demo.aristasystems.in
Description: This is the plugin for multisite
version: 1.0.0
Author: Arista Systems
Author URI: https://www.aristasystems.in
License: GPL2
*/


//ob_start();

//session_start();

//error_reporting(0);







//security







defined('ABSPATH') or die('No script please!');







//languagefile







load_plugin_textdomain('multi-data', false, basename(dirname(__FILE__)).'/languages');







//load amin menu















include('admin-menu.php');















//insert data view







































add_action('publish_post','post_publish_function'); //publish_post event is called hook its can be action or filter hook







function mdw_create_plugin_database_table()



{



    global $table_prefix, $wpdb;







   



$table_name = $wpdb->prefix . 'weblist';



   $sql = "CREATE TABLE $table_name (



		weblist_id mediumint(9) NOT NULL AUTO_INCREMENT,



		weblist_title varchar(100) NOT NULL,



		weblist_apiurl varchar(100) NOT NULL,



		weblist_status text NOT NULL,



		consumer_key varchar(100) NOT NULL,



		consumer_secret varchar(100) NOT NULL,



		PRIMARY KEY  (weblist_id)



	);";







     



        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );



        dbDelta($sql);



   



}







 register_activation_hook( __FILE__, 'mdw_create_plugin_database_table' );







require_once('myaccountwoo.php');































?>