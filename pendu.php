<?php

function afficher_lettre()
{
    var_dump($_SESSION['mot']);

    // je convertie $_SESSION['mot'] qui est en string en int pour vérifier la condition de victoire
    $_SESSION['nombre_lettre_mot'] = (int)strlen($_SESSION['mot']);
    $_SESSION['lettretrouvé'] = 0;
    
    
    if (isset($_POST['alphabet'])) {

        $lettre = $_POST['alphabet'];

        // je stock les lettre joué dans un tableau
        $_SESSION['lettreJoué'][] = $lettre;
        
        // Parcourir chaque lettre du mot mystère:
        for ($i = 0, $j = strlen($_SESSION['mot']); $i < $j; $i++) {

            // Si la lettre actuelle du mot mystère est présente dans les lettres proposées par le joueur:
            if (array_search($_SESSION['mot'][$i], $_SESSION['lettreJoué']) !== false) {

                $_SESSION['lettretrouvé']++;
                echo $_SESSION['mot'][$i];
            } 
            
            else
            {
                // Ajouter la lettre suivie d'un " _" au mot en construction.
                echo " _";
            }
        }
    }
    
}

function partieGagné()
{
    // SI le nombre total de lettre trouvé corresponds au nombre de total de lettre alors victoire 
    if ($_SESSION['lettretrouvé']  === $_SESSION['nombre_lettre_mot']) {

        echo " Victoire";
    }
    var_dump($_SESSION['lettretrouvé']);
}

function partiePerdu()
{
}
function verificationLettre()
{
    echo "Lettre déjà joué :";

        for($i= 0;isset($_SESSION['lettreJoué'][$i]); $i++)
        {
            
            echo " " . $_SESSION['lettreJoué'][$i] ;
        }

}

function main_pendu()
{
    session_start();

    afficher_lettre();
    partieGagné();
    partiePerdu();
    verificationLettre();
}

main_pendu();


?>

    <form method="POST" action="pendu.php">
        <?php
        /* Parcourir les lettres de l'alphabet: Si la lettre a déjà été proposée ou si la partie est terminée, désactiver cette dernière. */
        foreach (range("a", "z") as $alphabet) {

        ?> 
        <input type="submit" name="alphabet" value="<?= $alphabet ?>"

        <?php
        }
        ?>

    </form>