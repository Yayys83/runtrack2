<?php
$dsn = "mysql:host=localhost;dbname=jour09;charset=utf8";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT prenom, nom, naissance FROM etudiants WHERE sexe = 'Femme'";
    $stmt = $pdo->query($sql);
    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr><th>prenom</th><th>nom</th><th>naissance</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['naissance']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
