<?php

namespace Framework {

    use Framework\Exception as Exception;

    class Core {

        private static $_paths = array(
			DIRECTORY_SEPARATOR . 'application' .DIRECTORY_SEPARATOR .'controllers',
			''	// current folder
		);

        // thiết lập autoload cho toàn bộ hệ thống
        public static function initialize() {
            $paths = array_map(function($item) {
                return ROOT_DIR . $item;
            }, self::$_paths);
            $paths[] = get_include_path();
            $paths = join(PATH_SEPARATOR, $paths);
            set_include_path($paths);
            spl_autoload_register(__CLASS__ . '::autoload');
        }

        // hàm dùng để load các class
        private static function autoload($class) {
            $class = trim($class, '\\');
            $file = strtolower(str_replace("\\", DIRECTORY_SEPARATOR, $class)) . '.php';
            $paths = explode(PATH_SEPARATOR, get_include_path());
            foreach ($paths as $path) {
                $combined = $path . DIRECTORY_SEPARATOR . $file;
                if (file_exists($combined)) {
                    require_once($combined);
                    return;
                }
            }
            throw new Exception("Class {$class} not found!");
        }

    }

}
