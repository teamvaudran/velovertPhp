
<?php
// Start the session
session_start();
?>

<?

include("./header.php");
?>
<title>login Membre</title>
<link rel="stylesheet" href="../css/login.css">
</head>
<body>

<?php  
                if( isset ($_POST["noami"]))
				{
					// 1) recuperation des donnees
					if( !empty($_POST["noami"]) && !empty($_POST["password"]) )
					{
						$noamiM =  trim($_POST["noami"]);
						$passwordM =  trim($_POST["password"]);
						
						// 1) open a connexion  to mysql
						include("connexionMysql.php");
						//$connect = connexionBDD();
						
						// 2) requete SQL
						$selectQuery = "select * from AMIS where noami = '$noamiM' and password = '$passwordM';";
					
						// 3) requete insert
						$query = mysqli_query($openBDD, $selectQuery);
				
						// 3)analyse et affichage des resultats de la requete
						$nombre = mysqli_affected_rows($openBDD);
						
						if( $nombre == 1 )
						{
							while( $data = mysqli_fetch_row($query) )
							{
								$noami = $data[0];
								$nom = $data[1];
								$prenom = $data[2];
								$telephone = $data[3];
								$photo = $data[4];
								$password = $data[5];
								
							}
							
							$_SESSION["noami"] = $noami;
							$_SESSION["nom"] = $nom;
                     $_SESSION["prenom"] = $prenom;
                     $_SESSION["telephone"] = $telephone;
                     $_SESSION["photo"] = $photo;
							$_SESSION["password"] = $password;
                            
							header("location:MEMBRE/membre.php");
							
							echo " <br/> connexion reussi MEMBRE <br/> ";
						}
						else
							echo " <br/> erreur de connexion du membre <br/> entrer le login et/ou le mot de passe. <br/> ";
					}
                    else
                        echo"<br/> Entrez login et/ou mot de passe ";
				}
            
            

          
                
        ?>

<div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Connexion à Velovert</h3>
		<div class="card-text">
			
			<form method = "post">
				
				<div class="form-group">
					<label for="exampleInputEmail1">Numero Ami</label>
					<input type="text" class="form-control form-control-sm" name="noami" id="noami" aria-describedby="textHelp" required>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Mot de passe</label>
					<a href="./loginAdmin.php" style="float:right;font-size:12px;">Connexion Admin?</a>
					<input type="password" class="form-control form-control-sm" id="password" name="password" required>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Se connecter</button>
				
				<div class="sign-up">
					Nouveau Membre ? <a href="./inscription.php">S'inscrire</a>
				</div>
			</form>
		</div>
	</div>
</div>
</div>


</body>
</html>