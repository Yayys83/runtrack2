<?php
if (isset($_POST['connexion']) && !empty($_POST['prenom'])) {
    setcookie('prenom', htmlspecialchars($_POST['prenom']), time() + 3600); // cookie valable 1h
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
if (isset($_POST['deco'])) {
    setcookie('prenom', '', time() - 3600); // expire le cookie
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$prenom = $_COOKIE['prenom'] ?? null;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Connexion avec cookie</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php if ($prenom): ?>
        <h2>Bonjour <?= htmlspecialchars($prenom) ?> !</h2>
        <form method="post">
            <button type="submit" name="deco">Déconnexion</button>
        </form>
    <?php else: ?>
        <form method="post">
            <input type="text" name="prenom" placeholder="Entrez votre prénom" required>
            <button type="submit" name="connexion">Connexion</button>
        </form>
    <?php endif; ?>
</body>

</html>