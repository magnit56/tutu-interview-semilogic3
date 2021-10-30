<?php

const BRACKETS = ['(', ')', '<', '>', '[', ']', '{', '}'];

function getClownEditedPhrase($phrase) {
    $arr = str_split($phrase);
    $isPreviousBracket = false;
    $filteredArr = array_filter($arr, function($symbol) use (&$isPreviousBracket) {
        if ($isPreviousBracket) {
            if (isSymbolBracket($symbol)) {
                $isPreviousBracket = true;
                return false;
            } else {
                $isPreviousBracket = false;
                return true;
            }
        } else {
            $isPreviousBracket = isSymbolBracket($symbol);
            return true;
        }
    });
    return implode('', $filteredArr);
}

function isSymbolBracket($symbol) {
    return in_array($symbol, BRACKETS);
}

$phrase = trim(fgets(STDIN));
print_r(getClownEditedPhrase($phrase));
