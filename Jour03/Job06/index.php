<?php
$str = "Les choses que l'on possède finissent par nous posséder.";
for ($i = strlen($str) - 1; $i >= 0; $i--) {
    echo $str[$i];
}
