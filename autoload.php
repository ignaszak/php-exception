<?php

spl_autoload_register(function ($class) {

    $psr4_dir = array(
        'Ignaszak\\Exception\\' => __DIR__ . '/src/',
        'Test\\' => __DIR__ . '/tests/'
    );

    foreach ($psr4_dir as $key => $dir) {

        $isFound = @strpos($class, $key);

        if ($isFound !== false || $key == '') {
            $classDir = str_replace($key, '', $class);
            $classDir = $dir . str_replace('\\', DIRECTORY_SEPARATOR, $classDir) . '.php';

            require_once $classDir;
        }

    }

});
