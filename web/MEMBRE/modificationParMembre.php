<?

echo "
<form method = 'post'>
				
    <div class='container'>
      <div class='row justify-content-center'>
        <div class='col-12 col-md-8 col-lg-8 col-xl-6'>
          <div class='row'>
            <div class='col text-center'>
              <h1>Modification de mes infos  </h1>
              <p class='text-h3'> etre membre de la compagnie Velovert est un privielege. </p>
            </div>
          </div>
       

          
          <div class='row align-items-center mt-4'>
          
            <div class='col'>
              <input type='text' class='form-control' name='telephone' placeholder='TELEPHONE' value=$telephone >
            </div>
          </div>
          <span class='label label-warning'>Telephone</span>
         


         
          <div class='row align-items-center mt-4'>
            <div class='col'>
              <input type='text' name='password' class='form-control' value=$password placeholder='MOT DE PASSE' >
            </div>
            <div class='col'>
              <input type='text'  name='c_password' class='form-control'  value=$password placeholder='CONFIRMER MOT DE PASSE'>
            </div>
          </div>
          <span class='label label-warning'>Entrez <b>le NOUVEAU</b> mot de passe et confirmez le svp </span>
          <div class='row justify-content-start mt-4'>
            <div class='col'>
                
              

              <button class='btn btn-primary mt-4' type='submit' name='ok'>MODIFIER</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </section>
";

if ( isset($_POST["ok"]) )
{

    // 1) recuperation

    $telephones = $_POST["telephone"];
  
    $c_passwords = $_POST["c_password"];
$passwords = $_POST["password"];

if($passwords == $c_passwords){

  
 

  // 2) connexion avec la BDD
  include("../connexionMysql.php");
  

  // 3) requete SQL
  $insertQuery = "update AMIS set telephone = '$telephones', password = '$passwords' where noami = '$noami';";
  $query = mysqli_query($openBDD, $insertQuery);

  // 4) analyse et affichage
  $nombre = mysqli_affected_rows($openBDD);
  
  if( $nombre > 0 )
  echo " <br/> <h2>  SUCCES MODIFICATION, OK!!!!! </h2> ";
  else
     echo " <br/> <h2>  echec MODIFICATION, OK!!!!! </h2> ";

  // 5) fermeture de la BDD
  //mysqli_close();
}else{
  echo"<h1>les mots de passes ne concordent pas ressayez svp</h1>";
}
    
}
  ?>
