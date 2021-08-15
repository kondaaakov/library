<?php

$currentValidator = array_merge(require __DIR__ . '/validator.php', [
    'rules' => [
        'title' => 'required',
        'authors' => 'required',
        'year' => 'required',
        'description' => 'required',
        'pages' => 'required',
    ],
]);
$currentValidator['validate'] = function(array $data) use($currentValidator) : array {

    $errors = [];

    foreach ($currentValidator['rules'] as $key => $value) {
        if(!array_get($data, $key)){
            $errors[$key] = 'Поле обязательно для заполнения';
        }
    }
    return $errors;
};

return $currentValidator;