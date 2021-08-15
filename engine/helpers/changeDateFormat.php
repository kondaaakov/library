<?php

if (!function_exists('changeDateFormat')) {
    /** Функция изменения одного формата даты и времени на другой.
     * @param $currentDate - предлагаемая строка даты;
     * @param $neededFormat - нужный шаблон строки даты.
     * @param $currentTemplate - шаблон текущей строки даты;
     * @return string
     */
    function changeDateFormat(string $currentDate, string $neededFormat = "d.m.Y G:i", string $currentTemplate = "Y-m-d H:i:s"): string
    {
        $str = date_create_from_format($currentTemplate, $currentDate);
        return date_format($str, $neededFormat);
    }
}