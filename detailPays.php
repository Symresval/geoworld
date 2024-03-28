<?php
/**
 * Fragment Header HTML page
 *
 * PHP version 7
 *
 * @category  Page_Fragment
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */
?><!doctype html>
<html lang="fr" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Homepage : GeoWorld</title>
<?php
require_once 'manager-db.php';
if(isset($_GET['id']) & !empty($_GET['id'])){
    $id = $_GET['id'];
    $requete = ("SELECT * FROM Country where id=$id");
    }
   else
    $requete = ("SELECT * FROM country ");
    if ( !($result = mysqli_query($conn,$requete) ) )
    die("Erreur dans la requete: " . mysqli_error($conn));
   
    echo "<table border = 2>";
    ?>
 <?php
 //On teste si la requete retourne des résultats
if (mysqli_num_rows($result) > 0) {
 // On exploite chaque ligne de résultat
 while( $row = mysqli_fetch_array($result) ) {
 //print_r($row);
 $id = $row['id'];
 $nom = utf8_encode($row['Name']);
 $continent = utf8_encode($row['Continent']);
 $region = utf8_encode($row['Region']);
 $surface = utf8_encode($row['SurfaceArea']);
 $indep = utf8_encode($row['IndepYear']);
 $popu = utf8_encode($row['Population']);
 $vie = utf8_encode($row['LifeExpenctancy']);
 $surnom = utf8_encode($row['LocalName']);
 $gouv = utf8_encode($row['GouvenmentForm']);
 $chef = utf8_encode($row['headOfState']);
 }
} else {
 echo "0 résultat";
}
mysqli_close($conn);

?>

<ul class="list-group">
  <li class="list-group-item active">Détails</li>
  <li class="list-group-item">Titre : <?php echo $region; ?> </li>
  <li class="list-group-item">Realisateur : <?php echo $nom; ?> </li>
  <li class="list-group-item">Prenom : <?php echo $continent; ?> </li>
  <li class="list-group-item">Genre : <?php echo $surface; ?> </li>
  <li class="list-group-item">Date de sortie : <?php echo $indep; ?> </li>
  <li class="list-group-item">Recettes en millions: <?php echo $popu; ?> </li>
</ul>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
