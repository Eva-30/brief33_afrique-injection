<?php
  define("PAGE_TITLE", "Traitement");// Création constante PAGE_TITLE du nom de Traitement
  require("inc/inc.kickstart.php");  // inclut le contenu du fichier "inc.kickstart.php"
?>

<main class="pays-creer"> 
<?php

if(isset($_POST['country_name'])&& isset($_POST['country_flag']) && isset($_POST['country_capital']) && isset($_POST['country_area'])){
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE . ";charset=utf8mb4", DB_USERNAME, DB_PASSWORD, $pdo_options);
    $cName = $_POST['country_name'];
    $cFlag = $_POST['country_flag'];
    $cCapital = $_POST['country_capital'];
    $cArea = $_POST['country_area'];
try{
    // Préparation de la requête pour protéger des injections sql
   $requete = "INSERT INTO `country` (`country_name`, `country_flag`, `country_capital`, `country_area`) 
                VALUES (:country_name, :country_flag, :country_capital, :country_area);";
   $prepare = $pdo->prepare($requete);         
   $prepare->execute(array(
    ':country_name' => $cName,
    ':country_flag' => $cFlag,
    ':country_capital' => $cCapital,
    ':country_area' => $cArea
));
// retourne le nombre de lignes affectées par la dernière requête et fait l'echo si il y a une entrée. 
  $res = $prepare->rowCount();
if ($res == 1) {
  echo "<p>L'ajout est bien dans la base de donnée</p>";
}
}catch(PDOException $e) {
     
  // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
 exit("❌🙀💀 OOPS :\n" . $e->getMessage());
}
}
// Insertion de la fonction htmlentities, qui convertit tous les caractères éligibles en entités HTML,( parade des failles de types "Cross Site Scripting" (XSS))
//// Insertion de  l'argument ENT_QUOTES qui convertit les guillemets doubles et les guillemets simples( parade des failles de types "Cross Site Scripting" (XSS))
  echo "<h3>Merci !</h3>";
  echo "<p>Voici un récapitulatif de votre contribution :</p>";
  echo "<ul>"
      ."<li>Nom du pays : " . htmlentities($_POST["country_name"], ENT_QUOTES) . "</li>"
      ."<li>Capitale du pays : " . htmlentities($_POST["country_capital"], ENT_QUOTES) . "</li>"
      ."<li>Drapeau du pays : " . htmlentities($_POST["country_flag"], ENT_QUOTES) . "</li>"
      ."<li>Superficie du pays (en km²) : " . htmlentities($_POST["country_area"], ENT_QUOTES) . "</li>"
      ."<ul>";
  echo "<a href='page-pays-liste-alpha.php'><button>Consulter la liste des pays</button></a>";

?>
</main>

<?php require("inc/inc.footer.php"); ?>