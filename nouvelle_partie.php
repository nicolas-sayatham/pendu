<?php

function nouvelle_partie()
{
    session_destroy();
    session_start();
    header('Location: ./index.php?etat=jouer');
    $fichier = file("mots.txt");

    // Je choisi un mot au hasard -> array_rand
    $rand_keys = array_rand($fichier);

    // Supression des espaces pour avoir le bon nombre de caractère avec la fonction -> /trim
    $motChoisi = trim($fichier[$rand_keys]);

    var_dump($motChoisi);

    $_SESSION['mot'] = $motChoisi;



    var_dump($_SESSION['mot']);
}

nouvelle_partie();

?>

<?php

if (!empty($_SESSION)) {
    header('location: pendu.php ');
}

?>