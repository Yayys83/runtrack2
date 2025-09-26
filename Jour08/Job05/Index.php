<?php
session_start();

if (!isset($_SESSION['grille']) || isset($_POST['reset'])) {
    $_SESSION['grille'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['tour'] = 'X';
    $_SESSION['fin'] = false;
    $_SESSION['message'] = '';
}

if (isset($_POST['case']) && !$_SESSION['fin']) {
    $pos = explode('_', $_POST['case']);
    $row = (int)$pos[0];
    $col = (int)$pos[1];

    if ($_SESSION['grille'][$row][$col] === '-') {
        $_SESSION['grille'][$row][$col] = $_SESSION['tour'];

        $gagnant = checkWin($_SESSION['grille']);
        if ($gagnant) {
            $_SESSION['message'] = "$gagnant a gagné !";
            $_SESSION['fin'] = true;
        } elseif (isFull($_SESSION['grille'])) {
            $_SESSION['message'] = "Match nul !";
            $_SESSION['fin'] = true;
        } else {
            // Changement de tour
            $_SESSION['tour'] = ($_SESSION['tour'] === 'X') ? 'O' : 'X';
        }
    }
}

// Réinitialisation automatique après victoire ou match nul
if ($_SESSION['fin'] && !isset($_POST['reset'])) {
    $_SESSION['grille'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['tour'] = 'X';
    $_SESSION['fin'] = false;
}

function checkWin($g)
{
    for ($i = 0; $i < 3; $i++) {
        if ($g[$i][0] !== '-' && $g[$i][0] === $g[$i][1] && $g[$i][1] === $g[$i][2]) return $g[$i][0];
        if ($g[0][$i] !== '-' && $g[0][$i] === $g[1][$i] && $g[1][$i] === $g[2][$i]) return $g[0][$i];
    }
    if ($g[0][0] !== '-' && $g[0][0] === $g[1][1] && $g[1][1] === $g[2][2]) return $g[0][0];
    if ($g[0][2] !== '-' && $g[0][2] === $g[1][1] && $g[1][1] === $g[2][0]) return $g[0][2];
    return false;
}

function isFull($g)
{
    foreach ($g as $row) {
        foreach ($row as $cell) {
            if ($cell === '-') return false;
        }
    }
    return true;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Morpion PHP</title>
    <meta charset="UTF-8">
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 60px;
            height: 60px;
            text-align: center;
            font-size: 2em;
        }

        button {
            width: 100%;
            height: 100%;
            font-size: 2em;
        }
    </style>
</head>

<body>
    <h2>Jeu du Morpion</h2>
    <?php if (!empty($_SESSION['message'])): ?>
        <p><strong><?= $_SESSION['message'] ?></strong></p>
    <?php endif; ?>
    <form method="post">
        <table border="1">
            <?php for ($i = 0; $i < 3; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < 3; $j++): ?>
                        <td>
                            <?php if ($_SESSION['grille'][$i][$j] === '-'): ?>
                                <button type="submit" name="case" value="<?= $i . '_' . $j ?>"><?= $_SESSION['grille'][$i][$j] ?></button>
                            <?php else: ?>
                                <?= $_SESSION['grille'][$i][$j] ?>
                            <?php endif; ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
        <br>
        <button type="submit" name="reset">Réinitialiser la partie</button>
    </form>
    <p>Tour du joueur : <strong><?= $_SESSION['tour'] ?></strong></p>
</body>

</html>