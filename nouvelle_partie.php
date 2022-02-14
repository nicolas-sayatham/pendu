<?php

function nouvelle_partie()
{
    session_start();
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if (!empty($_SESSION)) {
        header('location: pendu.php');
    }

    ?>

</body>

</html>