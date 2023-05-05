<?php

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);
require_once 'router.php';

if (file_exists(__DIR__ . '/' . $_SERVER['REQUEST_URI'])) {
    return false; // serve the requested resource as-is
} else {
    include_once 'index.php';
}
