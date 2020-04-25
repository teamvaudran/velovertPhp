
<?

include("./header.php");
?>
<title>Inscription</title>
</head>
<body>
<?php
			
				if ( isset($_POST["ok"]) )
				{
               
					// 1) recuperation
               $nom = $_POST["nom"];
              
					$prenom = $_POST["prenom"];
					$telephone = $_POST["telephone"];
					$photo = $_POST["photo"];
					$c_password = $_POST["c_password"];
               $password = $_POST["password"];
               
               if($password == $c_password){

                  $idMembre = substr($nom, 0, 3).substr($prenom, 0, 1);
                  echo $idMembre;
                  echo $nom;
                  echo $prenom;
                  echo $photo;
                  echo $telephone;
                 
               
                  // 2) connexion avec la BDD
                  include("connexionMysql.php");
                  
               
                  // 3) requete SQL
                  $insertQuery = "insert into AMIS values( '$idMembre', '$nom ', '$prenom', '$telephone', '$photo','$password');";
                  
                  $query = mysqli_query($openBDD, $insertQuery);
               
                  // 4) analyse et affichage
                  $nombre = mysqli_affected_rows($openBDD);
                  
                  if( $nombre > 0 )
                  header("location:login.php");
                  else
                     echo " <br/> <h2> insertion echec, OK!!!!! </h2> ";
               
                  // 5) fermeture de la BDD
                  //mysqli_close();
               }else{
                  echo"<h1>les mots de passes ne concordent pas ressayez svp</h1>";
               }
					
				}
			
			?>
<section>
<form method = "post">
				
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Inscription Membre </h1>
              <p class="text-h3"> etre membre de la compagnie Velovert est un privielege. </p>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col mt-4">
              <input type="text" class="form-control" name="nom" placeholder="NOM" required>
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="text" class="form-control" name="prenom" placeholder="PRENOM" required>
            </div>
          </div>


          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="text" class="form-control" name="telephone" placeholder="TELEPHONE" required>
            </div>
          </div>

          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="text"  name="photo" class="form-control" placeholder="PHOTO" required>
            </div>
          </div>



          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="password" name="password" class="form-control" placeholder="MOT DE PASSE" required>
            </div>
            <div class="col">
              <input type="password"  name="c_password" class="form-control" placeholder="CONFIRMER MOT DE PASSE"required>
            </div>
          </div>
          <div class="row justify-content-start mt-4">
            <div class="col">
                
              

              <button class="btn btn-primary mt-4" type="submit" name="ok">INSCRIPTION</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </section>
</body>
</html>