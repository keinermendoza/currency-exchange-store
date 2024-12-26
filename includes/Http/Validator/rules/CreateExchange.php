<?php 

return [
    'base_amount' => [
        ['rule' => 'min', 'message' => 'El valor de la moneda base debe ser postivo', 'params' => [0.000001]],
        ['rule' => 'max', 'message' => 'El valor de la moneda base es demasiado alto', 'params' => [999999999999]]
    ],
    'base_currency' => [
        ['rule' => 'min', 'message' => 'Seleccione una moneda base', 'params' => [1]]
    ],
    'target_amount' => [
        ['rule' => 'min', 'message' => 'El valor de la moneda de destino debe ser postivo', 'params' => [0.000001]],
        ['rule' => 'max', 'message' => 'El valor de la moneda de destino es demasiado alto', 'params' => [999999999999]]
    ],
    'target_currency' => [
        ['rule' => 'min', 'message' => 'Seleccione una moneda de destino', 'params' => [1]]
    ],
];

