<?php
$dsn = "mysql:host=localhost;dbname=jour09;charset=utf8";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT AVG(capacite) AS capacite_moyenne FROM salles";
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr><th>capacite_moyenne</th></tr>";
    echo "<tr><td>" . htmlspecialchars($row['capacite_moyenne']) . "</td></tr>";
    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
