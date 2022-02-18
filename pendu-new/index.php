<?php
session_start();
$mots = ['pendu', 'perdu', 'victoire', 'toto', 'maison'];
$alphabet = range('A', 'Z');
if (isset($_GET['newgame'])) {
    session_destroy();
    header('Location: index.php');
}

if (isset($_SESSION['mot'])) {
    $motATrouver = $_SESSION['mot'];
    if (!empty($_POST)) {
        $lettreSelectionner = current($_POST);
        $lettretrouve = false;
        foreach (str_split($motATrouver) as $index => $lettre) {
            if (strtoupper($lettre) === $lettreSelectionner) {
                $lettretrouve = true;
                $_SESSION['motAfficher'][$index] = $lettre;
            }
        }
        $_SESSION['lettres'][$lettreSelectionner] = $lettretrouve;
        if ($motATrouver === $_SESSION['motAfficher']) {
            $_SESSION['partieTerminer'] = true;
        } else {
            if (!$lettretrouve) {
                $_SESSION['nbErreur']++;
                if ($_SESSION['nbErreur'] === 8) {
                    $_SESSION['partieTerminer'] = true;
                }
            }
        }
    }
} else {
    $motATrouver = $mots[array_rand($mots)];
    $_SESSION['mot'] = $motATrouver;
    $_SESSION['motAfficher'] = str_repeat('_', strlen($motATrouver));
    $_SESSION['lettres'] = [];
    $_SESSION['nbErreur'] = 0;
    $_SESSION['partieTerminer'] = false;
}
$partieTerminer = $_SESSION['partieTerminer'];
$motAfficher = $_SESSION['motAfficher'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if ($_SESSION['nbErreur'] > 0) : ?>
        <img src="images/pendu_<?= $_SESSION['nbErreur'] ?>.png" />
    <?php endif; ?>
    <p style="letter-spacing: 2px"><?= $motAfficher ?></p>

    <p> <?= $motATrouver ?></p>
    <div style="height: 50px;"></div>
    <form method="POST">
        <?php foreach ($alphabet as $lettre) : ?>
            <input name="<?= $lettre ?>" value="<?= $lettre ?>" type="submit" <?= array_key_exists($lettre, $_SESSION['lettres']) || $_SESSION['partieTerminer'] ? 'disabled' : '' ?>>
        <?php endforeach; ?>
    </form>
    <a href="?newgame=true">New game</a>

</body>

</html>