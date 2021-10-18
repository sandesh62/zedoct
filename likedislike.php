<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$userId = $_POST['userId'];
$usefullDataId = $_POST['usefullDataId'];
$type = $_POST['type'];
$isLike = $_POST['isLike'];

$results = $wpdb->get_results("SELECT * FROM wp_usefull_data_likedislike WHERE userId = '$userId' AND usefullDataId = '$usefullDataId' AND `type` = '$type'");

if (empty($results)) {
    $wpdb->insert('wp_usefull_data_likedislike', array(
        'userId' => $userId,
        'usefullDataId' => $usefullDataId,
        'type' => $type,
        'isLike' => $isLike,
        'createdAt' => date("Y-m-d H:i:s"),
    ));    

    $tot = $wpdb->get_results("SELECT * FROM wp_usefull_data_likedislike WHERE usefullDataId = '$usefullDataId' AND `type` = '$type' AND isLike = '$isLike'");

    if($type == 'link'){
        if($isLike == '1'){
            $data =array(
                'like_count' => count($tot)
            );
        }else{
            $data =array(
                'dislike_count' => count($tot)
            );
        }
        $wherecondition=array(
            'id'=>$usefullDataId
        );
        $wpdb->update('wp_usefull_links', $data, $wherecondition);
    }else{
        if($isLike == '1'){
            $data =array(
                'like_count' => count($tot)
            );
        }else{
            $data =array(
                'dislike_count' => count($tot)
            );
        }
        $wherecondition=array(
            'id'=>$usefullDataId
        );
        $wpdb->update('wp_usefull_contacts', $data, $wherecondition);
    }
    echo count($tot);
} else {
    $tot = $wpdb->get_results("SELECT * FROM wp_usefull_data_likedislike WHERE usefullDataId = '$usefullDataId' AND `type` = '$type' AND isLike = '$isLike'");
    if($type == 'link'){
        if($isLike == '1'){
            $data =array(
                'like_count' => count($tot)
            );
        }else{
            $data =array(
                'dislike_count' => count($tot)
            );
        }
        $wherecondition=array(
            'id'=>$usefullDataId
        );
        
        $wpdb->update('wp_usefull_links', $data, $wherecondition);
    }else{
        if($isLike == '1'){
            $data =array(
                'like_count' => count($tot)
            );
        }else{
            $data =array(
                'dislike_count' => count($tot)
            );
        }
        $wherecondition=array(
            'id'=>$usefullDataId
        );
        $wpdb->update('wp_usefull_contacts', $data, $wherecondition);
    }

    echo 'failed';
}
exit;