<?php 

return [
    'domain' => [
        ['rule' => 'url', 'message' => 'Proporcione una url valida'],
    ],
    'email' => [
        ['rule' => 'email', 'message' => 'Proporcione un email valido']
    ],
    'whatsapp_number' => [
        ['rule' => 'string', 'message' => 'El numero de whatsapp no puede ocupar mas de 20 caracteres', 'params' => [1, 20]]
    ]
   
];

