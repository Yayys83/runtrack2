<?php
$dsn = "mysql:host=localhost;dbname=jour09;charset=utf8";
$username = "root";
$password = "";
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * 
            FROM etudiants 
            WHERE TIMESTAMPDIFF(YEAR, naissance, CURDATE()) < 18";
    $stmt = $pdo->query($sql);

    $columnCount = $stmt->columnCount();

    echo "<table border='1' cellspacing='0' cellpadding='5'>";

    echo "<tr>";
    for ($i = 0; $i < $columnCount; $i++) {
        $colMeta = $stmt->getColumnMeta($i);
        echo "<th>" . htmlspecialchars($colMeta['name']) . "</th>";
    }
    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
