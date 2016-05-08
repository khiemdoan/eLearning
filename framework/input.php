<?php

namespace Framework {
    
    use Framework\Base as Base;

    class Input extends Base {

        public function __construct() {
            parent::__construct();
        }

        private function __clone() {
        }

        public static function get($key, $default = '') {
            if (isset($_GET[$key])) {
                return $_GET[$key];
            } else {
                return $default;
            }
        }

        public static function post($key, $default = '') {
            if (isset($_POST[$key])) {
                return $_POST[$key];
            } else {
                return $default;
            }
        }

    }

}

