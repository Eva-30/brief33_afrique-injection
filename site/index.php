<?php
  define("PAGE_TITLE", "Bienvenue"); //Création constante pour créer le titre de la page d'accueil
  require("inc/inc.kickstart.php");  //inclut le contenu du fichier "inc.kickstart.php" appelé
?>

  <main class="accueil">
   <a href="page-pays-liste-alpha.php">liste alphabétique des pays d'Afrique</a>  <!-- balise <a> qui créé le lien suivi de l'attribut href qui pointe vers quelle page se diriger, ici "page-pays-liste-alpha.php"-->
   <a href="page-pays-creer.php">ajouter un pays africain</a> <!--idem -->
  </main>

 <?php require("inc/inc.footer.php"); ?> <!--inclut le contenu du fichier "inc.footer.php" appelé -->