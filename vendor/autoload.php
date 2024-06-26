<?php

spl_autoload_register(function ($class) {
    $prefix = 'Project\\';
    $base_dir = __DIR__ . '/../src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

require_once __DIR__ . '/../src/Config/database.php';
require_once __DIR__ . '/../src/Model/User.php';
require_once __DIR__ . '/../src/Model/Transaction.php';
require_once __DIR__ . '/../src/Repository/UserRepository.php';
require_once __DIR__ . '/../src/Repository/TransactionRepository.php';
require_once __DIR__ . '/../src/Controller/UserController.php';

?>