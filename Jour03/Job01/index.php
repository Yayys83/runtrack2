<?php
$numbers = [200, 204, 173, 98, 171, 404, 459];
foreach ($numbers as $number) {
    if ($number % 2 === 0) {
        echo "$number est paire<br />";
    } else {
        echo "$number est impaire/br />";
    }
}
