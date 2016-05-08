<?php

namespace Framework {

    use Framework\Base as Base;

    // không hỗ trợ truyền dữ liệu qua GET
    class Validator extends Base {

        public function __construct() {
            parent::__construct();
            $this->_rules = array();
            $this->_errors = array();
            $this->input = Registry::get('input');
        }

        private $_rules = array();
        private $_errors = array();
        protected $_error_prefix = '<p>';
		protected $_error_suffix = '</p>';
        private $input;

        public function set_error_delimiters($prefix = '<p>', $suffix = '</p>') {
            $this->_error_prefix = $prefix;
            $this->_error_suffix = $suffix;
            return $this;
	}
        
        public function set_rule($field, $label = '', $rules = '') {
            $rules = strtolower($rules);
            $this->_rules += array(
                $field => array(
                    'label' => $label,
                    'rules' => $rules
                )
            );
            return $this;
        }

        public function run() {
            $result = true;
            $rules_set = array('required', 'email');
            foreach ($this->_rules as $field => $data) {
                foreach ($rules_set as $rule) {
                    if (preg_match('/'.$rule.'/', $data['rules'])) {
                        if (method_exists($this, $rule)) {
                            if (false === call_user_func_array(
                                    array($this, $rule), array($field)
                                )) {
                                $result = false;
                            }
                        }
                    }
                }
            }
            return $result;
        }

        private function set_error($string) {
            $this->_errors[] = $string;
        }
        
        public function get_errors() {
            $string = '';
            foreach ($this->_errors as $error) {
                $string .= $this->_error_prefix;
                $string .= $error;
                $string .= $this->_error_suffix;
            }
            return $string;
        }
        
        private function trim($field) {
            $value = $this->input->post($field);
            $value = trim($value);
            $this->input->set_post($field, $value);
        }

        private function required($field) {
            $value = $this->input->post($field);
            if (!isset($value) || null == $value || trim($value) == '') {
                $this->set_error('Trường ' . $this->_rules[$field]['label'] . ' không được bỏ trống!');
                return false;
            }
        }

        private function email($field) {
            $value = $this->input->post($field);
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $this->set_error('Trường '.$this->_rules[$field]['label'].' không đúng định dạng email!');
                return false;
            }
        }

    }

}
