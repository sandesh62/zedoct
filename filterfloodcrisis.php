<?php
require_once('wp-config.php');
global $wpdb;

$id = ltrim(rtrim($_POST['id'], ','), ',');
$type = $_POST['type'];
if ($type == 'category') {
    if ($id) {
        $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}flood_crisis_data WHERE categoryId IN (" . $id . ") AND `status` != '2'", ARRAY_A);
    } else {
        $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}flood_crisis_data WHERE `status` != '2'", ARRAY_A);
    }
}else{
    if ($id) {
        $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}flood_crisis_data WHERE `status` IN (" . $id . ")", ARRAY_A);
    } else {
        $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}flood_crisis_data WHERE `status` != '2'", ARRAY_A);
    }
}

$userId = get_current_user_id();
$new_user_data = get_user_meta($userId);
if (isset($new_user_data['xoo_ml_phone_no'][0])) {
    $loginPhoneNumber = $new_user_data['xoo_ml_phone_no'][0];
} else {
    $loginPhoneNumber = $new_user_data['phone_number'][1];
}
$user = wp_get_current_user();
$emailid = $user->user_email;

$adminEmails = get_users('role=Administrator');        
$isLoggedInUserAdmin = false;
foreach ($adminEmails as $admin) {
    if($admin->user_email == $emailid) {
        $isLoggedInUserAdmin = true;
        break;          
    }
}

$admin_email = get_option( 'admin_email' );

$alldata = array();
$i = 0;
foreach ($resultscc as $res) {
    $pid = $res['id'];
    $title = $res['name'];
    $mobileNumber = $res['mobileNumber'];
    $supporter_id = $res['supporter_id'];
    $emailAddress = $res['email'];
    $categoryId = $res['categoryId'];
    $status = $res['status'];
    $cats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidcategories WHERE id = '".$categoryId."' LIMIT 1", ARRAY_A);
    $categoryName = $cats[0]['title'];
    $categoryName = '<span style="color:#2EC4F7 !important; float: left; margin-top:10px;">' . $categoryName . '</span>';

    $results_supports = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}support_them WHERE floodCrisisId = '".$pid."'", ARRAY_A);

    $results_change_status = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}support_change_status WHERE floodCrisisId = '".$pid."'", ARRAY_A);

    $zed_verified = $res['zed_verified'];

    $last_status_updated_id = $res['last_status_updated_id'];
    
    $results2 = $wpdb->get_results("SELECT * FROM wp_status_update_users WHERE id = '$last_status_updated_id' LIMIT 1", ARRAY_A);
    if(!empty($results2)){
        if ($zed_verified == 1) {
            $verified_by = ' | Updated By: <b>'.$results2[0]['name'].'</b> <br><b class="top-left">ZED verified</b> Yes' ;
        }else{
            $verified_by = ' | Updated By: <b>'.$results2[0]['name'].'</b>' ;
        }
    }else{
        if ($zed_verified == 1) {
            $verified_by = '<br><b class="top-left">ZED verified</b>';
        }else{
            $verified_by = '';
        }
    }

    $supportDetails = '';
    if (!empty($results_supports)) {
        if (!empty($results_supports[0]['organization_name'])) {
            $supportDetails = '<br>Supporter Info:<br>Name: <b>'.$results_supports[0]['organization_name'].'</b><br>Contact: <b>'.$results_supports[0]['mobile_number'].'</b><br>Description: <b>'.$results_supports[0]['supportDetails'].'</b>';
        }else{
            $supportDetails = '<br>Supporter Info:<br>Name: <b>'.$results_supports[0]['name'].'</b><br>Contact: <b>'.$results_supports[0]['mobile_number'].'</b><br>Description: <b>'.$results_supports[0]['supportDetails'].'</b>';
        }

        if(!empty($results_change_status)){
            $supportDetails .= '<br><br>Change Status Info:<br>Name: <b>'.$results_change_status[0]['name'].'</b><br>Contact: <b>'.$results_change_status[0]['mobileNumber'].'</b><br>Description: <b>'.$results_change_status[0]['supportDetails'].'</b>';
        }

        if ( ($supporter_id == $userId && $userId != '0') || ($userId != '0' && $userId == $res['userId'] ) || ($emailid == $emailAddress) || ($emailid == $results_supports[0]['email']) || ($userId == '1') || $isLoggedInUserAdmin) {
            if ($status == '0' || $status == '3') {
                $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopup('.$pid.');">Change Status</button>';
            }else{
                $chnageStatusBtn = '';
            }
        }else{
            if ($status == '0') {
                if ($loginPhoneNumber != $mobileNumber) {
                    $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopupSupportThem('.$pid.','.$status.');">Support Them</button>';
                }else{
                    $chnageStatusBtn = '';
                }
            }else{
                $chnageStatusBtn = '';
            }
        }
    }else{
        $results_supports = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}support_change_status WHERE floodCrisisId = '".$pid."'", ARRAY_A);
        if (!empty($results_supports)) {
            $supportDetails = '<br>Supporter Info:<br>Name: <b>'.$results_supports[0]['name'].'</b><br>Contact: <b>'.$results_supports[0]['mobileNumber'].'</b><br>Description: <b>'.$results_supports[0]['supportDetails'].'</b>';
        }
        if ($status == '0') {
            if( (($userId == $res['userId']) && $userId != 0) || ($emailid == $emailAddress) || ($userId == '1') || $isLoggedInUserAdmin){
                $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopup('.$pid.','.$userId.');">Change Status</button>';
            }else if ($loginPhoneNumber != $mobileNumber) {
                $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopupSupportThem('.$pid.','.$status.','.$userId.');">Support Them</button>';
            } else if($userId == 0){
                $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopupSupportThem('.$pid.','.$status.','.$userId.');">Support Them</button>';
            }else{
                $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopup('.$pid.','.$userId.');">Change Status</button>';
            }

        }else{
            $chnageStatusBtn = '';
        }
    }

    $mstatus = $res['status'];
    
    $cc = '<a href="tel:' . $res['mobileNumber'] . '">' . $res['mobileNumber'] . '</a>';
    $lastUpdated = '<span style="color:black !important; font-size: 14px;">Last Updated: ' . date("d M Y h:i A", strtotime("+330 minutes", strtotime($res['updatedAt']))) . $verified_by . '</span>';
    //$dhtml = '<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;">' . $categoryName . '<br><br>' . $title . '<br><br>Location: ' . $res['address'] . '<br><br>Contact: ' . $cc . '</div>';
    $link="https://zedaid.org/i-need/?id=".$pid;
    $dhtml = '<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;">'. $categoryName.' <br><br>'.$title .'<br><br>Location: '. $res['address'] .' <br>Contact: '. $res['mobileNumber']. ' <br>Description: '. $res['description'] . ' <br><br> '.$lastUpdated. '<br> '. $supportDetails.$chnageStatusBtn.'</div><br><br>Share via :
    <a target="_blank" href="https://api.whatsapp.com/send?text='.$link.'"class="bn"><i class="fa fa-whatsapp wp"></i></a><a target="_blank" href="https://www.facebook.com/sharer.php?u='.$link.'" class="bn"><i class="ti-facebook fb"></i></a><a target="_blank" href="http://twitter.com/share?text='.$link.'" class="bn"><i class="ti-twitter-alt tw"></i></a></div><br><br>';
    
    $alldata[$i][] = $dhtml;
    $alldata[$i][] = $res['latitude'];
    $alldata[$i][] = $res['longitude'];
    $alldata[$i][] = $res['categoryId'];
    $alldata[$i][] = $mstatus;
    $alldata[$i][] = '15';
    $i++;
}

echo json_encode($alldata);
exit;
