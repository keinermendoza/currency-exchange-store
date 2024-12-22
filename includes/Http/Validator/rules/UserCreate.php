<?php

// this supports multiple validation per field
return [
    'username' => [
        ['rule' => 'string', 'message' => 'Username is required and must to have between 2 a 200 charcaters', 'params' => [3, 200]]
    ],
    'email' => [
        ['rule' => 'email', 'message' => 'Email is required']
    ],
    'password' => [
        ['rule' => 'string', 'message' => 'Password is required and must to have between 6 a 24 charcaters', 'params' => [6, 24]]
    ],
];

