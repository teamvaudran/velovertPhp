
<?

echo"<div class='col-sm-8 offset-sm-2'>
<div class='voorbeeld'>
 
<h2>Bienvenue  ADMINISTRATEUR  </h2>";

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
    <th>modifier</th>
    <th> suprimer</th>
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
       
       
        
        // 2 autres facons dafficher en php: print, printf
        
        
        echo " <tr>
        <td>$novelo</td>
        <td>$marque</td>
        <td>$prix $</td>
        <td><img src = '../../Images/".$photo."' style = 'height: 150px; width: 300px'/>  </td>
        <td><a class='btn btn-warning' href='administration.php?modifier=$novelo'>Modifier </a></td>
        <td><a class='btn btn-danger' href='administration.php?suprimer=$novelo'>Supprimer </a></td>
      </tr>"; 
        
}

echo"  </tbody>
</table>";


}

      if (isset( $_GET["modifier"]))
			{
				//recuperation du lien
				$lien = $_GET["modifier"];
							
        echo "modifier",$lien;

        echo "<form method='post'>
        <div class='modal-body'>
          <div class='form-group'>
            <label for='marque'>id</label>
            <input type='text' class='form-control' id='id' name ='lien' value=$lien aria-describedby='marque' readonly>
           
          </div>
          <div class='form-group'>
            <label for='prix'>PRIX</label>
            <input type='text' class='form-control' id='prix' name ='prix' placeholder='PRIX'>
          </div>
          <div class='form-group'>
            <label for='MARQUE'> MARQUE </label>
            <input type='text' class='form-control' name='marque' id='marque' placeholder='ENTRER LA marque '>
          </div>
        </div>
        <div class='modal-footer border-top-0 d-flex justify-content-center'>
          <button type='submit' name='update' class='btn btn-success'>MODIFIER VELO</button>
        </div>
      </form>";

    
      }


      if ( isset($_POST["update"]) )
{

    // 1) recuperation


    $marque = $_POST["marque"];
    $prix = $_POST["prix"];
$lien =$_POST["lien"];
    


 
 

  // 2) connexion avec la BDD
include("../connexionMysql.php");
  

  // 3) requete SQL
  
  $insertQuery = "update VELO set marque = '$marque', prix = '$prix' where novelo = '$lien';";

  
  $query = mysqli_query($openBDD, $insertQuery);

  // 4) analyse et affichage
  $nombre = mysqli_affected_rows($openBDD);
  
  $message ="";
  if( $nombre > 0 )
  $message = "MISE A JOUR REUSSI";

  else{
    $message = "ERREUR INSERTION ";
  }
  echo "<script type='text/javascript'>alert('$message');</script>";

  header("location:administration.php");

  // 5) fermeture de la BDD
  //mysqli_close();

    
} 

      if (isset( $_GET["suprimer"]))
			{
				//recuperation du lien
        $lien = $_GET["suprimer"];
          // 2) connexion avec la BDD
include("../connexionMysql.php");
        //echo $lien;
        $requete = mysqli_query($openBDD, "delete from VELO where novelo='$lien';");
        //header("location:administration.php");
							
		echo "suprimer", $lien;
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
