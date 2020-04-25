

<title> Bienvenue </title>
<link rel="stylesheet" href="../../css/membre.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="../../index.php">Accueil</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="membre.php?menuMembre=modifier">Modifier mes infos</a>
    </li>
    <li class="nav-item ml-auto">
      <a class="nav-link" href="membre.php?menuMembre=rechercher">effectuer une recherche</a>
    </li>
   
  </ul>
  
</nav>

<div class="container-fluid" style="margin-top:80px">

<?

include("../header.php");

session_start();

$noami= $_SESSION["noami"] ;
 $nom =$_SESSION["nom"] ;
$prenom =$_SESSION["prenom"] ;
$telephone =$_SESSION["telephone"] ;
$photo =$_SESSION["photo"] ;
$password =$_SESSION["password"];


			
			if (isset( $_GET["menuMembre"]))
			{
				//recuperation du lien
				$lien = $_GET["menuMembre"];
							
				// traitement du choix
				switch( $lien)
				{
					case "modifier":
						include("modificationParMembre.php");
						break;
								
					case "rechercher":
					      
include("../recherche.php");
						break;
						
				}
			}
			else
				{
          echo"<div class='col-sm-8 offset-sm-2'>
          <div class='voorbeeld'>
           
    <h2>Bienvenue  $nom $prenom </h2>";
        }






?>
      </div>
    </div>

</div>

