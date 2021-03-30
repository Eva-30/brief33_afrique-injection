<?php
  define("PAGE_TITLE", "Ajouter un nouveau pays d'Afrique"); // Création constante PAGE_TITLE du nom de "Ajouter un nouveau pays d'Afrique"
  require("inc/inc.kickstart.php");//inclut le contenu du fichier "inc.kickstart.php"
?>
<!-- Création des formulaires avec la balise <form> et l'attribut action renseigné par l'url du fichier php qui va recevoir les informations; et l'attribut method POST qui transmet les informations du formulaire de manière masquée mais non cryptée. -->
<main class="pays-creer">
  <form method="post" action="page-pays-creer--traitement.php">
    <!-- country_name -->
    <label>
      <h2>Nom du pays</h2>
      <input name="country_name" type="text" value="Wakanda" required>
    </label>
    <!-- country_capital -->
    <label>
      <h2>Capitale du pays</h2>
      <input name="country_capital" type="text" value="Jabari Town" required>
    </label>
    <!-- country_flag -->
    <label>
      <h2>Drapeau du pays</h2>
      <input name="country_flag" type="text" value="🏴" required>
    </label>
    <!-- country_area -->
    <label>
      <h2>Superficie du pays (en km²)</h2>
      <input name="country_area" type="number" value="23000" required>
    </label>
    <!-- button -->
    <input type="submit" name="submit">
  </form>
</main>

<script src="assets/app.js"></script>
<?php require("inc/inc.footer.php"); ?>