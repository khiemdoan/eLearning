<?php

namespace Framework {

    use Framework\Exception as Exception;

    class Base {

        public function __construct($options = array()) {
            if (is_array($options) || is_object($options)) {
                foreach ($options as $key => $value) {
                    $method = 'set' . ucfirst($key);
                    $this->$method($value);
                }
            }
        }

        public function __get($name) {
			echo $name;
            $function = 'get' . ucfirst($name);
            return $this->$function();
        }

        public function __set($name, $value) {
            $function = 'set' . ucfirst($name);
            return $this->$function($value);
        }

        public function __call($name, $arguments) {
            if (method_exists($this, $name)) {
                echo "Ban khong the truy cap phuong thuc '{$name}' trong class '" . get_class($this) . "'!";
                throw new Exception("You can't access method '{$name}' in class '" . get_class($this) . "'!");
            } else {
                echo "Phuong thuc '{$name}' khong ton tai trong class '" . get_class($this) . "'!";
                throw new Exception("Method '{$name}' is not found in class '" . get_class($this) . "'!");
            }
        }

    }

}
