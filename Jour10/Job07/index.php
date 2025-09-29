<?php
$dsn = "mysql:host=localhost;dbname=jour09;charset=utf8";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT SUM(superficie) AS superficie_totale FROM etage";
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr><th>superficie_totale</th></tr>"; // en-tête
    echo "<tr><td>" . htmlspecialchars($row['superficie_totale']) . "</td></tr>";
    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
