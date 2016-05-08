<?php

// kiểm tra đã đăng nhập hệ thống chưa
if (!function_exists('check_login')) {
    function check_login() {
        $session = Framework\Registry::get('session');
        if ($session->get('user_id') != null) {
            return true;
        } else {
            return false;
        }
    }
}
