<?php
$duree = time() + 3600;
if (isset($_COOKIE['nbvisites'])) {
    $nbvisites = $_COOKIE['nbvisites'] + 1;
} else {
    $nbvisites = 1;
}
if (isset($_POST['reset'])) {
    $nbvisites = 0;
}
setcookie("nbvisites", $nbvisites, $duree);
echo "Nombre de visites (cookie) : " . $nbvisites;
?>
<form method="post">
    <button type="submit" name="reset">Reset</button>
</form>