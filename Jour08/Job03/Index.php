<?php
session_start();
if (isset($_POST['reset'])) {
    $_SESSION['prenoms'] = [];
}
if (isset($_POST['submit']) && !empty($_POST['prenom'])) {
    $_SESSION['prenoms'][] = htmlspecialchars($_POST['prenom']);
}
if (!isset($_SESSION['prenoms'])) {
    $_SESSION['prenoms'] = [];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Liste des prénoms</title>
</head>

<body>
    <form method="post">
        <input type="text" name="prenom" placeholder="Entrez un prénom" required>
        <button type="submit" name="submit">Ajouter</button>
        <button type="submit" name="reset">Reset</button>
    </form>
    <h2>Liste des prénoms :</h2>
    <ul>
        <?php foreach ($_SESSION['prenoms'] as $prenom): ?>
            <li><?= $prenom ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>