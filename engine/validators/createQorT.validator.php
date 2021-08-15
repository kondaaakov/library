<?php

$currentValidator = array_merge(require __DIR__ . '/validator.php', [
    'rules' => [
        'number' => 'required',
        'title' => 'required',
        'body' => 'required',
    ],
]);

return $currentValidator;