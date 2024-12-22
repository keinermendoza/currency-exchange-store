<?php

namespace Core;
class App {
    protected static $container;

    public static function setContainer($container) {
        static::$container = $container;
    }

    public static function container() {
        return static::$container;
    }

    public static function resolve(string $key) {
        return static::container()->resolve($key);
    }

    public static function bind(string $key, callable $resolver) {
        return static::container()->bind($key, $resolver);
    }
}