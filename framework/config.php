<?php

namespace Framework {

    use Framework\Base as Base;

    class Config extends Base {

        private $type = 'ini';

        public function setType($type) {
            $this->type = $type;
        }

        public function initialize() {
            $this->type = strtolower($this->type);
            switch ($this->type) {
                case 'ini':
                    return new Config\Ini();
                    break;
                default:
                    echo "Khong co driver cho loai config: '{$this->type}'!";
                    throw new Exception("Invalid config '{$this->type}'!");
                    break;
            }
        }

    }
}
    