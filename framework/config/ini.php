<?php

namespace Framework\Config {

    use Framework\Config\Driver as Driver;
    use Framework\Exception as Exception;

    class Ini extends Driver {

        public function parse($name) {
            if (empty($name)) {
                echo 'Khong nhap file cau hinh!';
                throw new Exception('Khong nhap file cau hinh!');
            }
            if (isset($this->_parsed[$name])) {
                return $this->_parsed[$name];
            }
            $config_file = APP_DIR . DS . 'configs' . DS . "{$name}.ini";
            ob_start();
            include($config_file);
            $string = ob_get_contents();
            ob_end_clean();
            $pairs = parse_ini_string($string);
            if ($pairs != false) {
                $config = array();
                foreach ($pairs as $key => $value) {
                    $config = $this->_pair($config, $key, $value);
                }
                $this->_parsed[$name] = $config;
            }
            return $this->_parsed[$name];
        }

        private function _pair($config, $key, $value) {
            if (strstr($key, ".")) {
                $parts = explode(".", $key, 2);
                if (empty($config[$parts[0]])) {
                    $config[$parts[0]] = array();
                }
                $config[$parts[0]] = $this->_pair($config[$parts[0]], $parts[1], $value);
            } else {
                $config[$key] = $value;
            }
            return $config;
        }

    }

}
