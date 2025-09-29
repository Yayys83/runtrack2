<?php
$mysqli = new mysqli("localhost", "root", "", "jour09");

if ($mysqli->connect_error) {
    die("Échec de la connexion : " . $mysqli->connect_error);
}

$sql = "SELECT * FROM etudiants";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    echo "<thead><tr>";
    while ($fieldinfo = $result->fetch_field()) {
        echo "<th>" . $fieldinfo->name . "</th>";
    }
    echo "</tr></thead>";

    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";

    echo "</table>";
} else {
    echo "Aucun résultat trouvé.";
}

$mysqli->close();
