<?php
  define("PAGE_TITLE", "Liste alphabétique des pays d'Afrique");
  require("inc/inc.kickstart.php");
?>

<main class="pays-liste">
<?php
  
  $tableau = [];
  $requete = "SELECT * FROM `country` ORDER BY `country_name`";
  try {
    $etape = $pdo->prepare($requete);
    $etape->execute();
    $nbreResultat = $etape->rowCount();
    if ($nbreResultat) $tableau = $etape->fetchAll();
    else echo "<pre>✖️ La requête SQL ne retourne aucun résultat</pre>";
  } catch (PDOException $e) {
    echo "<pre>✖️ Erreur liée à la requête SQL :\n" . $e->getMessage() . "</pre>";
  }
// Insertion de la fonction htmlentities, qui convertit tous les caractères éligibles en entités HTML( parade des failles de types "Cross Site Scripting" (XSS))
// Insertion de  l'argument ENT_QUOTES qui convertit les guillemets doubles et les guillemets simples( parade des failles de types "Cross Site Scripting" (XSS))
foreach ($tableau as $pays) {
    echo "<section>";
    echo "<h1>" . htmlentities($pays["country_name"], ENT_QUOTES) . "</h1>";
    echo "<h2>" . htmlentities($pays["country_flag"], ENT_QUOTES) . "</h2>";
    echo "<div>" . htmlentities(number_format($pays["country_area"], 0, ',', ' '), ENT_QUOTES) . " km²</div>";
    echo "<div>" . htmlentities($pays["country_capital"], ENT_QUOTES) . "</div>";
    echo "</section>";
  }

?>
</main>

<?php require("inc/inc.footer.php"); ?>