<?php

namespace Framework\Database {

    use Framework\Database\Connector as Connector;
    use Framework\Exception as Exception;

    class Mysqli extends Connector {

        protected $service;
        protected $host = 'localhost';
        protected $user = 'root';
        protected $password = '';
        protected $dbname = '';
        protected $port = '3306';
        protected $charset = 'utf8';
        protected $engine = "InnoDB";
        
        function setHost($host) {
            $this->host = $host;
        }

        function setUser($user) {
            $this->user = $user;
        }

        function setPassword($password) {
            $this->password = $password;
        }

        function setDbname($dbname) {
            $this->dbname = $dbname;
        }

        function setPort($port) {
            $this->port = $port;
        }

        function setCharset($charset) {
            $this->charset = $charset;
        }
        
        function setEngine($engine) {
            $this->engine = $engine;
        }

        protected function checkService() {
            if ($this->service instanceof \MySQLi) {
                return true;
            } else {
                return false;
            }
        }

        public function connect() {
            if (!$this->checkService()) {
                $this->service = new \MySQLi(
                    $this->host,
                    $this->user,
                    $this->password,
                    $this->dbname,
                    $this->port
                );
                $this->service->set_charset($this->charset);                
            }
        }
        
        protected function escape_string($string) {
            return $this->service->real_escape_string($string);
        }

        protected function execute($sql) {
            return $this->service->query($sql);
        }
        
        public function get($sql = '') {
            parent::get($sql);
            $results = array();
            while ($result = $this->query->fetch_assoc()) {
                $results[] = $result;
            }
            return $results;
        }
        
        public function count_all_results($sql = '') {
            parent::get($sql);
            return $this->query->num_rows;
        }

    }

}
