<?php 
namespace Http\Validator;
class OptionalValidator {
    protected $errors = [];
    protected $data = [];

    public function __construct($data) {
        $this->data = $data;
    }

    public function validateOptionalField(string $key, callable $test, string $errorMessage, callable | null $proccessValue = null) {
        if (array_key_exists($key, $this->data)) {

            if (trim($this->data[$key] != "")) {
                if ($test($this->data[$key])) {
                    if ($proccessValue) {
                        return $proccessValue($this->data[$key]);
                    } else {
                        return htmlspecialchars($this->data[$key]);
                    }

                } else {
                    $this->addError($key, $errorMessage);
                }
            }
        }
        return '';
    }
    
    public function getErrors() {
        return $this->errors;    
    }
    public function addError($field, $message) {
        $this->errors[$field] = $message;    
    }

    public function hasErrors() {
        return !empty($this->errors);
    }
}