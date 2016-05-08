<?php

namespace Framework {

    use Framework\Base as Base;
    use Framework\Registry as Registry;

    class Model extends Base {

        public function __construct() {
            parent::__construct();
            $this->database = Registry::get('database');
            if ($this->database !== null) {
                $this->database->connect();
            }
            $this->session = Registry::get('session');
            $this->cookie = Registry::get('cookie');
            $this->input = Registry::get('input');
        }

        protected $database;
        protected $session;
        protected $cookie;
        protected $input;

    }

}
