
<?
echo"<div class='col-sm-8 offset-sm-2'>
<div class='voorbeeld'>
 
<h2>Bienvenue  $nom $prenom  </h2>";

if(isset($_POST["search"]))
{
 //recuperation par post
 $recherche=$_POST["search"];

echo $recherche;


// connexion avec la BDD
include("../connexionMysql.php");
//$connect = connexionBDD();	

// 2) requete SQL
$sqlSelect = "select * from VELO where  novelo like '%$recherche%' or marque like '%$recherche%';";

	
					
// 3) on lance la requête (mysqli_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$query = mysqli_query($openBDD, $sqlSelect) or die(" <br/> Erreur de la requete avec la BDD velovert");

$nombre =0;
$sommeTotal =0;
echo " <table class='table table-striped'>
<thead>
  <tr>
    <th>No velo</th>
    <th>Marque</th>
    <th>Prix</th>
    <th>Image</th>
    <th>taxes</th>
    <th> total</th>
  </tr>
</thead>
<tbody>";

// 4) analyse et/ou affichage des resultats
while( $data = mysqli_fetch_row($query) ) // prend la requete et decompose la en lignes
{

        $novelo = $data[0];
        $marque = $data[1];
        $prix = $data[2];
        $photo = $data[3];
        $taxe =0.15 * $prix;
        $total =$taxe + $prix;
        $nombre +=1;
        $sommeTotal +=$prix;
       
        
        // 2 autres facons dafficher en php: print, printf
        
        
        echo " <tr>
        <td>$novelo</td>
        <td>$marque</td>
        <td>$prix $</td>
        <td><img src = '../../Images/".$photo."' style = 'height: 150px; width: 300px'/>  </td>
        <td>$taxe $</td>
        <td>$total $</td>
      </tr>"; 
        
}
if ($nombre > 1) {
    $total_taxe = 0.15 * $sommeTotal;
    $prixFinal = $total_taxe +$sommeTotal;
 
    echo "<tr>
    <td> TOTAL :</td><td> $sommeTotal $</td>

 </tr>";
    echo "<tr>
    <td> TOTAL TAXES:</td><td> $total_taxe $</td>

 </tr>";
 echo "<tr>
 
 <td> PRIX TOTAL :</td><td>$prixFinal $</td>
</tr>";
}
echo"  </tbody>
</table>";


}
?>

<form method="post"> 
  <div class="input-group">
    <input type="text" class="form-control" name ="search" placeholder="Rechercher par novelo ou la marque">
    <div class="input-group-btn">
      <button class="btn btn-danger" type="submit">
        rechercher
      </button>
    </div>
  </div>
</form>
