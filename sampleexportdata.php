<?php
error_reporting(E_ALL);
require_once('wp-config.php');
global $wpdb;
$tabel_name3 = 'wp_options';

$allcoupons = $wpdb->get_results("select * from $tabel_name3 LIMIT 4");

$i = 1;
foreach ($allcoupons as $data) {

    if ($i == 1) {
        $allarray['Category Name'] = 'Covid Hospital';
        $allarray['Title'] = 'Hospital Name';
        $allarray['Bed'] = '1';
        $allarray['Bed with oxygen'] = '1';
        $allarray['Bed with ventilator'] = '1';
        $allarray['Quantity'] = '';
        $allarray['Gender'] = '';
        $allarray['Blood group'] = '';
        $allarray['Corona recover date'] = '';
        $allarray['Corona eligible date'] = '';
        $allarray['Location'] = 'Ahmedabad';
        $allarray['Contact Name'] = 'Mehul Patel';
        $allarray['Contact Number'] = '09898965411';
        $allarray['Information By'] = 'Zed';
        $allarray['Status'] = 'Available';
        // $allarray['Avaialble Date'] = '';
        $customers_data[] = $allarray;
    } else  if ($i == 2) {
        $allarray['Category Name'] = 'Remdesivir Injection';
        $allarray['Title'] = 'Hospital Name';
        $allarray['Bed'] = '';
        $allarray['Bed with oxygen'] = '';
        $allarray['Bed with ventilator'] = '';
        $allarray['Quantity'] = '1';
        $allarray['Gender'] = '';
        $allarray['Blood group'] = '';
        $allarray['Corona recover date'] = '';
        $allarray['Corona eligible date'] = '';
        $allarray['Location'] = 'Ahmedabad';
        $allarray['Contact Name'] = 'Mehul Patel';
        $allarray['Contact Number'] = '09898965411';
        $allarray['Information By'] = 'Zed';
        $allarray['Status'] = 'Available';
        // $allarray['Avaialble Date'] = '';
        $customers_data[] = $allarray;
    } else  if ($i == 3) {
        $allarray['Category Name'] = 'Plasma';
        $allarray['Title'] = 'Hospital Name';
        $allarray['Bed'] = '';
        $allarray['Bed with oxygen'] = '';
        $allarray['Bed with ventilator'] = '';
        $allarray['Quantity'] = '';
        $allarray['Gender'] = 'Male';
        $allarray['Blood group'] = 'A+';
        $allarray['Corona recover date'] = '2021-04-07';
        $allarray['Corona eligible date'] = '2021-06-30';
        $allarray['Location'] = 'Ahmedabad';
        $allarray['Contact Name'] = 'Mehul Patel';
        $allarray['Contact Number'] = '09898965411';
        $allarray['Information By'] = 'Zed';
        $allarray['Status'] = 'To be available';
        // $allarray['Avaialble Date'] = '2021-06-30';
        $customers_data[] = $allarray;
    } else  if ($i == 4) {
        $allarray['Category Name'] = 'Oxygen Cylinder';
        $allarray['Title'] = 'Hospital Name';
        $allarray['Bed'] = '';
        $allarray['Bed with oxygen'] = '';
        $allarray['Bed with ventilator'] = '';
        $allarray['Quantity'] = '1';
        $allarray['Gender'] = '';
        $allarray['Blood group'] = '';
        $allarray['Corona recover date'] = '';
        $allarray['Corona eligible date'] = '';
        $allarray['Location'] = 'Ahmedabad';
        $allarray['Contact Name'] = 'Mehul Patel';
        $allarray['Contact Number'] = '09898965411';
        $allarray['Information By'] = 'Zed';
        $allarray['Status'] = 'Not available';
        // $allarray['Avaialble Date'] = '';
        $customers_data[] = $allarray;
    }

    $i++;
}

// Filter Customer Data
function filterCustomerData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// File Name & Content Header For Download
$file_name = "covidpartner.csv";
header("Content-Disposition: attachment; filename=\"$file_name\"");
header("Content-Type: application/vnd.ms-excel");

//To define column name in first row.
$column_names = false;
// run loop through each row in $customers_data
foreach ($customers_data as $row) {
    if (!$column_names) {
        echo implode("\t", array_keys($row)) . "\n";
        $column_names = true;
    }
    // The array_walk() function runs each array element in a user-defined function.
    array_walk($row, 'filterCustomerData');
    echo implode("\t", array_values($row)) . "\n";
}

exit;
