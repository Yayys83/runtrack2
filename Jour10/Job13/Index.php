<?php
$dsn = "mysql:host=localhost;dbname=jour09;charset=utf8";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT salles.nom AS nom_salle, etage.nom AS nom_etage
            FROM salles
            INNER JOIN etage ON salles.id_etage = etage.id";
    $stmt = $pdo->query($sql);

    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr><th>nom_salle</th><th>nom_etage</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nom_salle']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom_etage']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
