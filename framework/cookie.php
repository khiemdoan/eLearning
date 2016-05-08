<?php

namespace Framework {

    use Framework\Base as Base;

    class Cookie extends Base {

        public function __construct() {
        }
        
        private function __clone() {
        }

        public static function set($newdata = array(), $time = 3600, $path = '/') {
            if (is_array($newdata)) {
                foreach ($newdata as $key => $val) {
                    setcookie($key, $val, time() + $time, $path);
                }
            }
        }

        public static function get($name, $default = '') {
            if (isset($_COOKIE[$name])) {
                return $_COOKIE[$name];
            }
            return $default;
        }

        public static function delete($name) {
            setcookie($name, '', time() - 3600);
        }

        public static function delete_all() {
            foreach($_COOKIE as $name => $value) {
                setcookie($name, '', time() - 3600);
            }
        }

    }

}
