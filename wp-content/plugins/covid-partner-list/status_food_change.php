<?php 
	require_once( dirname( dirname( dirname( dirname( __FILE__ )))) . '/wp-load.php' );
	extract($_POST);
	global $wpdb;
	$table_name1 = $wpdb->prefix . "disribution_partner_list";
	
	echo $wpdb->update(
	$table_name1, 
    array( 
        'DP_Site_Active' => $deals_status,  // string
    ),
    array( 'Id' =>$deals_code )
	);
?>