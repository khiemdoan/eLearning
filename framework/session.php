<?php

namespace Framework {

    use Framework\Base as Base;

    class Session extends Base {

        public function __construct() {
            parent::__construct();
            @session_start();
        }
        
        private function __clone() {
        }

        public static function set($newdata = array(), $value = '') {
            if (is_array($newdata)) {
                foreach ($newdata as $key => $val) {
                    $_SESSION[$key] = $val;
                }
            } else {
                $_SESSION[$newdata] = $value;
            }
        }

        public static function get($name, $default = '') {
            if (isset($_SESSION[$name])) {
                return $_SESSION[$name];
            }
            return $default;
        }

        public static function delete($name) {
            if (isset($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
        }

        public static function delete_all() {
            session_unset();
        }

        public static function destroy() {
            return @session_destroy();
        }
        
        public static function set_flashdata($newdata, $value = '') {
            $_SESSION['flashdata'.$newdata] = $value;
        }
        
        public static function flashdata($name) {
            $value = '';
            if (isset($_SESSION['flashdata'.$name])) {
                $value = $_SESSION['flashdata'.$name];
                unset($_SESSION['flashdata'.$name]);
            }
            return $value;
        }

    }

}
