<?php
function calcule($a, $operation, $b)
{
    switch ($operation) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            if ($b != 0) {
                return $a / $b;
            } else {
                return "Erreur : division par zéro";
            }
        case '%':
            if ($b != 0) {
                return $a % $b;
            } else {
                return "Erreur : division par zéro";
            }
        default:
            return "Opération non reconnue";
    }
}
echo calcule(10, '+', 5);
