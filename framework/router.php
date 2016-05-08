<?php

namespace Framework {

    use Framework\Base as Base;

    class Router extends Base {

        protected $url;
        protected $extension;
        protected $controller = 'index';
        protected $action = 'index';
        protected $routes = array();

        public function dispatch() {
            $controller = 'home';
            $action = 'index';
            $parameters = null;
			
            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');    // loại bỏ ký tự '/' cuối cùng
                $url = explode('/', $url);

                // chọn controller
                if (file_exists(APP_DIR . DS . 'controllers' . DS . $url[0] . '.php')) {
                    $controller = $url[0];
                    unset($url[0]);
                }

                // chọn action cho controller
                if (isset($url[1])) {
                    $action = $url[1];
                    unset($url[1]);
                }

                // truyền parameters cho action
                $parameters = $url ? array_values($url) : array();
            }
            
            // gọi controller với action và các tham số
            $this->pass($controller, $action, $parameters);
        }

        // gọi action của controller
        private function pass($controller, $action, $parameters = array()) {
            $name = ucfirst($controller);
            if (class_exists($name)) {
                $instance = new $name;
                if (method_exists($instance, $action)) {
                    call_user_func_array(
                            array($instance, $action), is_array($parameters) ? $parameters : array()
                    );
                } else {
                    include(APP_DIR . DS . 'errors' . DS . 'error_404.php');
                }
            } else {
                include(APP_DIR . DS . 'errors' . DS . 'error_404.php');
            }
        }

    }

}
