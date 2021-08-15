<?php

if(!function_exists('writeLogDB')) {
    /** Функция логирования в базу данных.
     * @param string $category - категория, которую нужно выбрать среди (users, db, upload, access)
     * @param string $message - сообщение.
     * @return mysqli_result
     */
    function writeLogDB(string $category, string $message) {
        $categories = [
            'users' => 'Пользователи',
            'db' => 'База данных',
            'upload' => 'Загрузка файлов',
            'access' => 'Доступ к страницам'
        ];

        $sql = "INSERT INTO logs (category, log) VALUES ('". dbEscape(array_get($categories, $category)) ."', '". dbEscape($message) ."');";
        return dbQuery($sql);
    }
}