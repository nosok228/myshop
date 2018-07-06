<?php

spl_autoload_register(function($class) {
        if(file_exists(DIR.'/'.strtr($class, '\\', '/').'.php')) {
            include_once DIR.'/'.strtr($class, '\\', '/').'.php';
    }
});