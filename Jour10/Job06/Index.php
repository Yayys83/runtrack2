<?php
$dsn = "mysql:host=localhost;dbname=jour09;charset=utf8";
$username = "root";
$password = "";

try {

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT COUNT(*) AS nb_etudiants FROM etudiants";
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr><th>nb_etudiants</th></tr>"; // en-tête
    echo "<tr><td>" . htmlspecialchars($row['nb_etudiants']) . "</td></tr>";
    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
