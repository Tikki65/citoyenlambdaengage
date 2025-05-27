<?php
spl_autoload_register(function ($class) {
    $prefix = 'PHPMailer\\PHPMailer\\';
    $base_dir = __DIR__ . '/PHPMailer/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // Ce n'est pas une classe PHPMailer
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
?>
