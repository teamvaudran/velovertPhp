
<?

include("./header.php");
?>
<title>login Admin</title>
<link rel="stylesheet" href="../css/login.css">
</head>
<body>

<?php  
              
            
            

            if( isset ($_POST["login"]) )
				{
					// 1) recuperation des donnees
					if( !empty($_POST["login"]) && !empty($_POST["password"]) )
					{
						$loginA =  $_POST["login"];
						$passwordA =  $_POST["password"];
						
						// 1) open a connexion  to mysql
						include("connexionMysql.php");
						//$connect = connexionBDD();
						
						// 2) requete SQL
						$selectQuery = "select * from ADMIN where login = '$loginA' and password = '$passwordA';";
					
						// 3) requete 
						$query = mysqli_query($openBDD, $selectQuery);
				
						// 3)analyse et affichage des resultats de la requete
						$nombre = mysqli_affected_rows($openBDD);
						
						if( $nombre == 1 )
						{
							while( $data = mysqli_fetch_row($query) )
							{
								$login = $data[0];
								$password = $data[1];
							}
							
							$_SESSION["login"] = $loginA;
							$_SESSION["password"] = $passwordA;
                            
							header("location:ADMIN/administration.php");
							
							echo " <br/> connexion reussi ADMIN <br/> ";
						}
						else
							echo " <br/> erreur de connexion du admin <br/> entrer le login et/ou le mot de passe. <br/> ";
					}
                    else
                        echo"<br/> Entrez login et/ou mot de passe ";
            }
                
        ?>

<div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Connexion ADMIN </h3>
		<div class="card-text">
			
			<form method = "post">
				
				<div class="form-group">
					<label for="exampleInputEmail1">Login</label>
					<input type="text" class="form-control form-control-sm" name="login" id="login" aria-describedby="textHelp" required>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Mot de passe</label>
					<a href="./login.php" style="float:right;font-size:12px;">Je suis membre?</a>
					<input type="password" class="form-control form-control-sm" id="password" name="password" required>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Se connecter</button>
				
				<div class="sign-up">
					Nouveau Membre ? <a href="./inscriptionAdmin.php">S'inscrire</a>
				</div>
			</form>
		</div>
	</div>
</div>
</div>


</body>
</html>