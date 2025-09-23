<?php

function leetSpeak($str)
{
    $leet = [
        'A' => '4',
        'a' => '4',
        'B' => '8',
        'b' => '8',
        'E' => '3',
        'e' => '3',
        'G' => '6',
        'g' => '6',
        'L' => '1',
        'l' => '1',
        'S' => '5',
        's' => '5',
        'T' => '7',
        't' => '7'
    ];
    return strtr($str, $leet);
}
echo leetSpeak("Salut les amis !");
