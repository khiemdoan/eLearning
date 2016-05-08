<?php

namespace Framework\Config {

    use Framework\Base as Base;

    class Driver extends Base {
        protected $_parsed = array();
        
        public function get_config($name = '') {
            if (isset($this->_parsed[$name])) {
                return $this->_parsed[$name];
            } else {
                return null;
            }
        }
    }

}
