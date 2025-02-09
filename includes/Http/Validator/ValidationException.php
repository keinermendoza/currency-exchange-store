<?php
namespace Http\Validator;
use Exception;

class ValidationException extends Exception {
    protected array $errors;

    public function __construct(array $errors, $message = "Errores de validación", $code = 0, Exception $previous = null) {
        $this->errors = $errors;
        parent::__construct($message, $code, $previous);
    }

    public function getErrors() {
        return $this->errors;
    }
}