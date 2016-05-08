<?php

namespace Framework {

    // class lưu trữ instance của các class khác
    class Registry {

        private static $_instances = array();

        // ẩn phương thức khởi tạo, không cho tạo ínstances của class này
        private function __construct() {
        }

        private function __clone() {
        }

        // lấy instance, đầu vào là tên instance
        public static function get($key, $default = null) {
            if (isset(self::$_instances[$key])) {
                return self::$_instances[$key];
            } else {
                return $default;
            }
        }

        // lưu instance với tên truyền vào $key
        public static function set($key, $instance = null) {
            self::$_instances[$key] = $instance;
        }

        // xoá instance
        public static function erase($key) {
            unset(self::$_instances[$key]);
        }

    }

}

