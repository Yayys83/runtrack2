<?php
$str = "I'm sorry Dave I'm afraid I can't do that";
$vowels = ['a', 'e', 'i', 'o', 'u', 'y', 'A', 'E', 'I', 'O', 'U', 'Y'];
for ($i = 0; $i < strlen($str); $i++) {
    if (in_array($str[$i], $vowels)) {
        echo $str[$i];
    }
}
