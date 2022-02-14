<?php

if(empty($_SESSION))
{
    echo '<p>Bienvenue sur le jeu du PENDU</p>';
    echo '<a href="nouvelle_partie.php">Commencer une nouvelle partie</a>';
}
    
else
{
    echo '<a href="deconexion.php">Nouvelle partie</a>';
    echo '<a href="index.php">Accueil</a>';

}
