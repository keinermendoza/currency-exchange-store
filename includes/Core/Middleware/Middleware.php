<?php
namespace Core\Middleware;
use Core\Middleware\Admin;
use Core\Middleware\Guest;
use Exception;

class Middleware {
    const MAP = [
        GUEST => Guest::class,
        ADMIN => Admin::class
    ];

    public static function resolve($key) {
        if (!$key) return; 

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) throw new Exception("not middleware found for key {$key}");
        
        (new $middleware)->handle();
    }
}