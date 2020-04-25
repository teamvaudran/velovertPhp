
<?

include("./web/header.php");
?>
<title>acceuil</title>
</head>

<body>

<br>
<div class="container">
<div class="row">

<div class="col-sm-3"></div>
<div class="col-sm-2">

<a href="./web/login.php" class="btn btn-info" role="button"> Login</a>
</div>
<div class="col-sm-2"></div>
<a href="./web/inscription.php" class="btn btn-danger" role="button">Incription</a>
<div class="col-sm-3"></div>
</div>
<div class="row">


<?php


// connexion avec la BDD
include("./web/connexionMysql.php");
//$connect = connexionBDD();	

// 2) requete SQL
$sqlSelect = "select * from VELO ORDER BY novelo DESC LIMIT 3 ;";

// 3) on lance la requête (mysqli_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$query = mysqli_query($openBDD, $sqlSelect) or die(" <br/> Erreur2 de connexion avec la BDD velovert");


echo " <br/> <h1 align='center'> la liste de velo </h1> ";
echo " <table class='table table-striped'>
<thead>
  <tr>
    <th>No velo</th>
    <th>Marque</th>
    <th>Prix</th>
    <th>Image</th>
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
        <td><img src = './Images/".$photo."' style = 'height: 150px; width: 300px'/>  </td>
      </tr>"; 
        
}
echo"  </tbody>
</table>";


   ?> 
   </div>

</div>
</body>
</html>