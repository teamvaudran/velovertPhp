

<title> Bienvenue Admin </title>
<link rel="stylesheet" href="../../css/membre.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="../../index.php">Accueil</a>
  <ul class="navbar-nav">
    
  </ul>
  
</nav>

<div class="container-fluid" style="margin-top:80px">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form">
   ajouter un velo
  </button>  


<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">AJOUT D'UN NOUVEAU VELO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="marque">MARQUE</label>
            <input type="text" class="form-control" id="marque" name ="marque" aria-describedby="marque" placeholder="Enter la marque">
           
          </div>
          <div class="form-group">
            <label for="prix">PRIX</label>
            <input type="text" class="form-control" id="prix" name ="prix" placeholder="PRIX">
          </div>
          <div class="form-group">
            <label for="password1"> PHOTO</label>
            <input type="text" class="form-control" name="photo" id="photo" placeholder="ENTRER LA PHOTO ">
          </div>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" name="creer" class="btn btn-success">AJOUTER VELO</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?

include("../header.php");



if ( isset($_POST["creer"]) )
{

    // 1) recuperation


    $marque = $_POST["marque"];
    $prix = $_POST["prix"];
    $photo = $_POST["photo"];
    


 
 

  // 2) connexion avec la BDD
  include("../connexionMysql.php");
  

  // 3) requete SQL
  $insertQuery = "insert into VELO values( null, '$marque ', '$prix', '$photo');";
  
  $query = mysqli_query($openBDD, $insertQuery);

  // 4) analyse et affichage
  $nombre = mysqli_affected_rows($openBDD);
  
  $message ="";
  if( $nombre > 0 )
  $message = "INSERTION REUSSI";

  else{
    $message = "ERREUR INSERTION ";
  }
  echo "<script type='text/javascript'>alert('$message');</script>";

  // 5) fermeture de la BDD
  //mysqli_close();

    
} 
include("../rechercheAdmin.php");

?>