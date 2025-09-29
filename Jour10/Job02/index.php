<?php
$dsn = "mysql:host=localhost;dbname=jour09;charset=utf8";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT nom, capacite FROM salles";
    $stmt = $pdo->query($sql);

    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr><th>nom</th><th>capacite</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . htmlspecialchars($row['nom']) . "</td><td>" . htmlspecialchars($row['capacite']) . "</td></tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur de connexion ou de requête : " . $e->getMessage();
}
