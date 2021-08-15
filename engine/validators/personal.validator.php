<?php

$currentValidator = array_merge(require __DIR__ . '/validator.php', [
    'rules' => [
        'firstname' => 'required',
        'lastname' => 'required',
        'old_password' => 'required',
        'email' => ['required', 'email'],
        'password' => 'required',
        'password_repeat' => ['required', 'repeat'],
    ],
]);

$currentValidator['ruleTypes']['repeat'] = fn($data, $key) => array_get($data, $key) === array_get($data, 'password');
$currentValidator['ruleMessages']['repeat'] = 'Пароли должны совпадать';

return $currentValidator;