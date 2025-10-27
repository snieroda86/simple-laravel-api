<?php

// Truncate text
function sn_truncate(string $text, int $words = 15): string
{
    $textArray = explode(' ', strip_tags($text));
    if (count($textArray) <= $words) {
        return $text; 
    }

    $truncated = implode(' ', array_slice($textArray, 0, $words)) . '...';
    return $truncated;
}
