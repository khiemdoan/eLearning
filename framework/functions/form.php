<?php

// trả về thông báo lỗi của validator
if (!function_exists('validation_errors')) {
    function validation_errors() {
        $validator = Framework\Registry::get('validator');
        return $validator->get_errors();
    }
}

if (!function_exists('set_value')) {
    function set_value($field = '', $default = '') {
        $input = Framework\Registry::get('input');
        if (!empty($input->post($field))) {
            $str = $input->post($field);
        } else {
            $str = $default;
        }
        $str = htmlspecialchars($str);
        return $str;
    }
}
