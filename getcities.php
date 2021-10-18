<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$categoryId = $_POST['categoryId'];
$type = $_POST['type'];

$cat = $wpdb->get_results("SELECT * FROM wp_covidcategories WHERE id='$categoryId' LIMIT 1", ARRAY_A);

if ($type=='link') {    
    $catname = $cat[0]['title'];
    $results1 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='$categoryId' AND `location` != 'PAN india' group by `location`", ARRAY_A);
    $results2 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='$categoryId' AND `location` = 'PAN india' group by `location`", ARRAY_A);
}else{
    $catname = $cat[0]['title'].'1';
    $results1 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='$categoryId' AND `location` != 'PAN india' group by `location`", ARRAY_A);
    $results2 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='$categoryId' AND `location` = 'PAN india' group by `location`", ARRAY_A);
}

if (!empty($results1) && !empty($results2)) {
    $results = aasort($results1, 'location');
    $results = array_merge($results2, $results1);
}else if(empty($results1) && !empty($results2)){
    $results = $results2;
}else{
    $results = aasort($results1, 'location');
}
$select = '';
if (!empty($results)) {
    if ($type=='link') {
        $select .= '<select class="js-example-basic-multiple-limit form-control" onchange="openCity(event, this.value)">';
    }else{
        $select .= '<select class="js-example-basic-multiple-limit form-control" onchange="openCity1(event, this.value)">';
    }
    $select .= '<option value="0">Select City</option>';
    foreach ($results as $h) {
        $location = $h['location'];
        $select .= '<option value="'.$location.'-'.$catname.'">'.$location.'</option>';
    }
    $select .= '</select>';
    echo $select;
} else {
    if ($type=='link') {
        $select .= '<select class="js-example-basic-multiple-limit form-control" onchange="openCity(event, this.value)">';
    }else{
        $select .= '<select class="js-example-basic-multiple-limit form-control" onchange="openCity1(event, this.value)">';
    }
    $select .= '<option value="0">Select City</option>';
    $select .= '</select>';
    echo $select;
}
exit;