<?php

class Pendu {

  public function initGame() {
    // qui va chercher les mots
    $motATrouver = $this->getMot();
    $_SESSION['mot'] = $motATrouver;
    $_SESSION['motAfficher'] = str_repeat('_', strlen($motATrouver));
    $_SESSION['lettres'] = [];
    $_SESSION['nbErreur'] = 0;
    $_SESSION['partieTerminer'] = false;
  }

  private function getMot() {
      // recupérer un mot dans le fichier mot.txt
      $mots = ['pendu', 'perdu', 'victoire', 'toto', 'maison'];
      return $mots[array_rand($mots)];
  }
}