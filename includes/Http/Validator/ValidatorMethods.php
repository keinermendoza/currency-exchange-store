<?php 
namespace Http\Validator;

class ValidatorMethods {
    public static function string(string $text, int $min = 1, $max = INF): bool {
        $textLen = mb_strlen(trim($text));
        return $min <= $textLen && $textLen <= $max;
    } 

    public static function email(string $email): bool | string {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function min($strNumber, int |float $min): bool {
        $number = (float)$strNumber;
        return $number >= $min;
    }

    public static function max($strNumber, int | float $max): bool {
        $number = (float)$strNumber;
        return $number <= $max;
    }
}