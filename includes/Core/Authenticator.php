<?php

namespace Core;
use Core\Database;
use Core\App;
use Core\Session;

class Authenticator {
    public static function attempt($email, $password): bool {
        $db = App::resolve(Database::class);
        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ])->fetch();

        if($user) {
            $validPassword = password_verify($password, $user["password"]);

            if($validPassword) {
                static::login($user);
                return true;
            }
        }
        return false;
    }

    public static function login($user) {
        Session::put("user", [
            "id" => $user["id"],
            "email" => $user["email"]
        ]);
        
        session_regenerate_id(true);
    }
    
    public static function logout() {
        Session::destroy();
    }

}