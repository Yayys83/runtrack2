<?php
$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";
$len = strlen($str);
for ($i = 0; $i < $len; $i += 2) {
    echo $str[$i];
}
