<?php

// this supports multiple validation per field
return [
    'email' => [
        ['rule' => 'string', 'message' => 'Por favor ingrese su usuairo', 'params' => [1, 200]]
    ],
    'password' => [
        ['rule' => 'string', 'message' => 'Por favor ingrese su contraseña', 'params' => [1, 200]]
    ],
];

