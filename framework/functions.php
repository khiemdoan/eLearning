<?php

namespace Framework {

    use Framework\Base as Base;
    
    class Functions extends Base {

        public function initialize() {
            
            // load các hàm trong framework
            $dir = ROOT_DIR . DS . 'framework' . DS . 'functions';
            foreach (glob($dir.DS.'*.php') as $file) {
                include_once $file;
            }
            
            // load các hàm người dùng tự tạo trong thư mục application
            $dir = APP_DIR . DS . 'functions';
            foreach (glob($dir.DS.'*.php') as $file) {
                include_once $file;
            }
        }

    }

}
