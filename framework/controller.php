<?php

namespace Framework {

    use Framework\Base as Base;
    use Framework\Registry as Registry;

    class Controller extends Base {

        public function __construct() {
            parent::__construct();
            $this->session = Registry::get('session');
            $this->cookie = Registry::get('cookie');
            $this->input = Registry::get('input');
            $this->validator = Registry::get('validator');
        }

        protected $session;
        protected $cookie;
        protected $input;
        protected $validator;
        protected $models;

        public function load_view($view, $data = array()) {
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    ${$key} = $value;
                }
            }
            include(VIEWS_DIR . DS . $view . '.php');
        }

        public function load_model($model) {
            $model = strtolower($model);
            include_once (MODELS_DIR . DS . $model . '.php');
            if (class_exists($model)) {
                return $this->models[$model] = new $model;
            } else {
                return null;
            }
        }

    }

}
