<?php

namespace Framework {

    use Framework\Base as Base;
    use Framework\Exception as Exception;

    class Database extends Base {

        protected $type = 'mysqli';

        public function initialize() {
            $config = Registry::get('config');
            if ($config) {
                $config = $config->parse('database');
                $options = $config['database'];
                if (!empty($options['type'])) {
                    $type = $options['type'];
                    unset($options['type']);
                }
            }
            
            $this->type = strtolower($this->type);
            switch ($this->type) {
                case 'mysqli':
                    return new Database\Mysqli($options);
                    break;
                default:
                    echo "Khong co driver cho loai database '{$this->type}'!";
                    throw new Exception("Invalid database '{$this->type}'!");
                    break;
            }
        }

    }

}
