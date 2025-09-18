<?php
$str = "Certaines choses changent, et d'autres ne changeront jamais.";
$newStr = "";
$len = strlen($str);
for ($i = 0; $i < $len - 1; $i++) {
    $newStr .= $str[$i + 1];
}
$newStr .= $str[0];
echo $newStr;
