<?php

// this supports multiple validation per field
return [
    'email' => [
        ['rule' => 'email', 'message' => 'Please provide a valid email']
    ],
    'password' => [
        ['rule' => 'string', 'message' => 'Password is required']
    ],
];

