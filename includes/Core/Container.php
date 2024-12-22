<?php 

namespace Core;
use Exception;

class Container {
    private array $bindings = [];

    public function bind(string $key, callable $resolver) {
        $this->bindings[$key] = $resolver;  
    }

    public function resolve(string $key) {
        if(!array_key_exists($key, $this->bindings)) {
            throw new Exception("coulden't find binding for the key {$key}");
        }
        
        return call_user_func($this->bindings[$key]);
    }
}