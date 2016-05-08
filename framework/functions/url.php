<?php

// tạo đường dẫn
if (!function_exists('base_url')) {
    function base_url($uri = '') {
        $config = Framework\Registry::get('config');
        $config = $config->parse('constant');
        $url = $config['constant']['base_url'];
        $url = rtrim($url, '/');
        $uri = trim($uri, '/');
        return $url . '/' . $uri;
    }
}

// chuyển hướng trang web
if (!function_exists('redirect')) {
    function redirect($uri = '', $method = 'location', $http_response_code = 302) {
        switch ($method) {
            case 'refresh' : header("Refresh:0;url=" . $uri);
                break;
            default : header("Location: " . $uri, TRUE, $http_response_code);
                break;
        }
        exit;
    }
}

// lấy đường dẫn hiện tại
if (!function_exists('current_url')) {
    function current_url() {
        return 'http' . (empty($_SERVER['HTTPS']) ? '' : 's') . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    }
}
