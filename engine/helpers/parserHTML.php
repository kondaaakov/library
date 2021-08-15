<?php


if (!function_exists('parserHTML')) {
    function parserHTML(string $str, string $replaceWord): string {
        $parserArr = [
            '[br]' => '<br>',
        ];
        $strArr = explode(' ', $str);

        foreach ($strArr as $key => $word) {
            if ($word == array_search($replaceWord, $parserArr)) {
                $strArr[$key] = array_get($parserArr, $word);
            }
        }
        return implode(' ', $strArr);
    }
}