<?php
$boolVar = true;
$intVar = 7;
$strVar = "LaPlateforme";
$floatVar = 3.14;

$variables = [
    ['boolean', 'boolVar', $boolVar ? 'true' : 'false'],
    ['entier', 'intVar', $intVar],
    ['chaîne', 'strVar', $strVar],
    ['flottant', 'floatVar', $floatVar]
];
?>

<table border="1">
    <thead>
        <tr>
            <th>Type</th>
            <th>Nom</th>
            <th>Valeur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($variables as $var): ?>
            <tr>
                <td><?= $var[0] ?></td>
                <td><?= $var[1] ?></td>
                <td><?= $var[2] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
