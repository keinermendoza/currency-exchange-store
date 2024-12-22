<?php 

return [
    'title' => [
        ['rule' => 'string', 'message' => 'Title is required and must to have between 1 a 200 charcaters', 'params' => [20, 200]]
    ],
    'body' => [
        ['rule' => 'string', 'message' => 'Body is required and must to have between 1 a 1000 charcaters', 'params' => [1, 1000]]
    ],
];

