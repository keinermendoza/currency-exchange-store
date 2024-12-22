<?php

namespace Http\Validator;

use Exception;
use Http\Validator\ValidatorMethods;

class Validator {
    protected $data = [];
    protected $errors = [];
    protected $rules = [];
    protected $validator = ValidatorMethods::class;
    protected $validationExcetuted = false;

    public function __construct($data, $rules) {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function validate() {
        foreach ($this->rules as $field => $ruleSet) {
            foreach ($ruleSet as $rule) {
                $method = $rule['rule'];
                $message = $rule['message'] ?? 'Error en el campo ' . $field;

                if (method_exists($this->validator, $method)) {
                    $value = $this->data[$field] ?? '';
                    $params = $rule['params'] ?? [];
                    $valid = $this->validator::$method($value, ...$params);

                    if (!$valid) {
                        $this->errors[$field] = $message;
                    }
                }
            }
        }
        $this->validationExcetuted = true;
        return empty($this->errors);
    }

    public function getErrors() {
        if(!$this->validationExcetuted) {
            throw new Exception("You must to call validate method before access the errors"); 
        } 
        return $this->errors;    
    }

    public function addError($field, $message) {
        if(!$this->validationExcetuted) {
            throw new Exception("You must to call validate method before appending errors"); 
        } 

        $this->errors[$field] = $message;    
    }

    



    // public static function validate($data, $rules, $validatorClass = Validator::class) {
    //     $validator = new static($data, $rules, $validatorClass);
    //     return $validator->executeValidation();
    // }
   
}

