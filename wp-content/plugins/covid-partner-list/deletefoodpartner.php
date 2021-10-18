<?php
	require_once( dirname( dirname( dirname( dirname( __FILE__ )))) . '/wp-load.php' );
	extract($_POST);
	echo $_POST['fileid']; exit;
	global $wpdb;
	$table_name1 = "wp_covidlistdetails";
	$wpdb->delete( $table_name1, array( 'id' => $_POST['fileid'] ) );
?>