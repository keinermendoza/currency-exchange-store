<?php
namespace Http\Validator;
use Http\Validator\ValidationException;



class SimpleValidator {
    public array $errors = [];
    public array $data = [];
    public array $cleanedData = [];


    public function isNumber(array $data, string $fieldName, $message = null) {
        if (!$this->hasErrors()) {
            if (!isset($message)) {
                $message = "El campo $fieldName debe tener un valor numérico";
            }
            if (!is_numeric($data[$fieldName])) {
                $this->errors[$fieldName] = $message;
            }
        }
    }

    public function min(array $data, int|float $min, string $fieldName, $message = null) {
        if (!$this->hasErrors()) {
            if (!isset($message)) {
                $message = "El valor de $fieldName no puede ser menor que $min";
            }
            $number = (float) $data[$fieldName];
            if ($number < $min) {
                $this->errors[$fieldName] = $message ;
            }
        }
    }

    public function max(array $data, int|float $max, string $fieldName, $message = null) {
        if (!$this->hasErrors()) {
            if (!isset($message)) {
                $message = "El valor de $fieldName no puede ser mayor que $max";
            }
            $number = (float) $data[$fieldName];
            if ($number > $max) {
                $this->errors[$fieldName] = $message; 
            }
        }
    }

    public function notEquals(array $data, string $fieldA, string $fieldB, $message = null) {
        if (!$this->hasErrors()) {
            if (!isset($message)) {
                $message = "El campo $fieldB no puede ser igual a $fieldA";
            }
            if ($data[$fieldA] === $data[$fieldB]) {
                $this->errors[$fieldB] = $message;
            }
        }
    }

    public function notEmptyNorBlank(array $data, string $fieldName, string $message = null) {
        if (!$this->hasErrors()) {
            if (!isset($message)) {
                $message = "El campo $fieldName no puede estar vacío";
            }
            if (!isset($data[$fieldName]) || trim($data[$fieldName]) === '') {
                $this->errors[$fieldName] = $message;
            }
        }
    }

    public function allowEmptyNotBlank(array $data, string $fieldName, string $message = null) {
        if (!$this->hasErrors()) {    
            if (!isset($message)) {
                $message = "El campo $fieldName es obligatorio";
            }
            if (isset($data[$fieldName])) {
                if (trim($data[$fieldName]) === '') {
                    $this->errors[$fieldName] = $message;
                }
            }
        }
    }

    public function notEmpty(array $data, string $fieldName, string $message = null) {
        if (!$this->hasErrors()) {    
            if (!isset($message)) {
                $message = "Proporcione un valor para el campo $fieldName o no lo incluya";
            }
            if (!isset($data[$fieldName])) {
                $this->errors[$fieldName] = $message;
            }
        }
    }

    public function minLen(array $data, int $min, string $fieldName, $message = null) {
        if (!$this->hasErrors()) {    
            if (!isset($message)) {
                $message = "El campo $fieldName debe tener al menos $min caracteres";
            }
            if (strlen($data[$fieldName]) < $min) {
                $this->errors[$fieldName] = $message;
            }
        }
    }

    public function maxLen(array $data, int $max, string $fieldName, $message = null) {
        if (!$this->hasErrors()) {
            if (!isset($message)) {
                $message = "El campo $fieldName no puede tener más de $max caracteres";
            }
            if (strlen($data[$fieldName]) > $max) {
                $this->errors[$fieldName] = $message;
            }
        }
    }

    public function validate() {
        if ($this->hasErrors()) {
            throw new ValidationException($this->getErrors());
        }
    }

    // Métodos para obtener errores y verificar si hay errores
    public function getErrors(): array {
        return $this->errors;
    }

    public function addError($field, $message) {
        $this->errors[$field] = $message;    
    }

    public function hasErrors(): bool {
        return !empty($this->errors);
    }

    public function getData() {
        return $this->data;
    }

    public function appendImage(string $fieldName, string $imagePath) {
        $this->data[$fieldName] = $imagePath;
    }


    public function getCleanedData ($keys) {

        foreach ($keys as $key) {
            if (array_key_exists($key, $this->data)) {
                $this->cleanedData[$key] = $this->data[$key];
            }
        }
        return $this->cleanedData;
    }
}




// CREATE TABLE posts (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     title VARCHAR(50) NOT NULL UNIQUE,
//     excerpt VARCHAR(100) NULL,
//     show_in_home TINYINT(1) DEFAULT 0,
//     image VARCHAR(300) NULL,
//     body TEXT NULL
// );

?>