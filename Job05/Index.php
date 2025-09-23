<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Job 5</title>
    <?php
    if (isset($_POST['style'])) {
        $style = $_POST['style'];
        if (in_array($style, ['style1', 'style2', 'style3'])) {
            echo '<link rel="stylesheet" href="' . $style . '.css">';
        }
    }
    ?>
</head>

<body>
    <form method="post">
        <label for="style">Choisissez un style :</label>
        <select name="style" id="style">
            <option value="style1" <?php if (isset($_POST['style']) && $_POST['style'] == 'style1') echo 'selected'; ?>>Style 1</option>
            <option value="style2" <?php if (isset($_POST['style']) && $_POST['style'] == 'style2') echo 'selected'; ?>>Style 2</option>
            <option value="style3" <?php if (isset($_POST['style']) && $_POST['style'] == 'style3') echo 'selected'; ?>>Style 3</option>
        </select>
        <button type="submit">Valider</button>
    </form>
</body>

</html>