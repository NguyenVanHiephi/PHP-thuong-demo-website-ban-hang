<?php

require("../../model/database.php");
require("../../model/category_db.php");
require("../../model/product_db.php");
require("../../model/cart.php");
require("../../model/ncc.php");
require("../../model/tk.php");


ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_lifetime', 0); // Hết hạn khi đóng trình duyệt
ini_set('session.cookie_samesite', 'Strict');

// Start the session after setting the ini settings
session_start();

// Tạo lại session ID sau mỗi đăng nhập thành công
session_regenerate_id();

$cart_sl = 0;
    
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'dh';
    }
}

if($action == 'dh'){
    if(isset($_SESSION['user']) && $_SESSION['user'] != null ){
        $user = $_SESSION['user'];
        $dhs = all_donhang_user($user['id']);
        $cart_sl = lay_sl_giohang($user['id']);
        $total = tong_id_user($user['id']);
        $ten_tk = $user['Names'];
        include ("purchase.php");
    }else{
        header("Location: ../../login");
    }
}
elseif ($action == 'ct_dh'){
    if(isset($_SESSION['user']) && $_SESSION['user'] != null ){
        $user = $_SESSION['user'];
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $dh = lay_donhang_id($id);
        $statuss = all_dh_status_id($id);
        $max = max(array_column($statuss, 'Id_statuss'));
        $ten_ncc = lay_ten_ncc($dh['id_ncc']);
        $sp = lay_san_pham_productid($dh['id_sp']);
        $addres = lay_address_id($dh['id_address']);
        $ten_tk = $user['Names'];
        include ("purchase_ct.php");
    }else{
        header("Location: ../../login");
    }
}




?>