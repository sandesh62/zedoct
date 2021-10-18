<?php
	require_once( dirname( dirname( dirname( dirname( __FILE__ )))) . '/wp-load.php' );
	extract($_POST);
	global $wpdb;
	$table_name1 = "wp_covidlistdetails";
	$wpdb->delete( $table_name1, array( 'id' => $fileid ) );
?>