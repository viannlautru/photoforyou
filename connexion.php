<!--inclusion de l'entete-->
   <?php
    include('src/head.php'); 
?>
<body>
<header>
     <!--inclusion de la navigation-->
    <?php
    include('src/nav.php'); 
?>
    </header>

    <div class="container ">
      <div class="jumbotron">
        <h1 class="display-4">Connexion</h1>
	
      </div>
 

      <form method="POST" class=" <?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}  ?>">
      
          <div class="form-group row ">
              <div class="col-md-4 mb-3 ">
                <label for="nom"> Mail:</label>
                <input type="text" class="form-control taille" name="Nom" id="nom" placeholder="Mail" >
               
              </div>
          </div>
            <div class="form-group row">
              <div class="col-md-4 mb-3">
                <label for="nom">Mot de passe :</label>
                <input type="password" class="form-control" name="password" id="nom" placeholder="Mot de passe" >
               
              </div>
            </div>
              <div class="btn-group btn-group-toggle form-group" data-toggle="buttons">
                <label class="btn btn-info">
                  <input type="radio" name="1" id="client" value="client">
                  Client
                </label>
                <label class="btn btn-info">
                  <input type="radio" name="1" id="Photographe" value="Photographe">
                  Photographe
                </label>
              </div>
              <div class="form-group">
       <button class="btn bg-light" type="submit" name="conect"> Connexion</button>
       </div>
       
      </form>

<?php

  if(isset($_POST['conect'])){

    require_once('bdd/connectserv.php');
    $connexion=connect_bd();

      if(isset($_POST['Nom'] , $_POST['password'])){
        if(!empty($_POST['Nom'])  AND !empty($_POST['password'])AND !empty($_POST['1'])){

          $Nom = $_POST['Nom'];
          $password = md5($_POST['password']);
          $choix = $_POST['1'];
          
            $session = $connexion->prepare('SELECT * FROM utilisateur WHERE MailUtilisateur = :Nom AND MdpUtilisateur = :password ');
            $session->execute(array('Nom'=>$Nom,'password'=>$password));
            $result = $session->fetch();

            $sessions = $session->rowCount();
              if($sessions >0){
                if ($choix =="Photographe"){
                  $utilisateurphoto = $connexion->prepare('SELECT * FROM photographe,utilisateur WHERE Idutiliateurphoto = :id and IdUtilisateur =:id');
                  $utilisateurphoto->execute(array('id'=>$result['IdUtilisateur']));
                  $utipho = $utilisateurphoto->rowCount();
                  $results = $utilisateurphoto->fetch();
                  if($utipho >0){
                   
                    $_SESSION['idphotographe'] =$results['idphotographe'];
                    $_SESSION['Nom'] = $results['NomUtilisateur'];
                    $_SESSION['IdUtilisateur'] = $results['IdUtilisateur'];

                    echo '<script language="Javascript">
                    document.location.replace("index.php");
                    </script>'; 
                    $clientorphotographe='photographe';
                }else echo('<p class="text-warning"> Vous n\'avez pas de compte photographe</p>');
              }
                if ($choix =="client"){
                  $utilisateurphoto = $connexion->prepare('SELECT * FROM client,utilisateur WHERE Idutilisateurclient = :id and IdUtilisateur =:id ');
                  $utilisateurphoto->execute(array('id'=>$result['IdUtilisateur']));
                  $utipho = $utilisateurphoto->rowCount();
                  $results = $utilisateurphoto->fetch();
                  if($utipho >0){
                   
                    $_SESSION['idclient'] =$results['idclient'];
                    $_SESSION['Nom'] = $results['NomUtilisateur'];
                    $_SESSION['IdUtilisateur'] = $results['IdUtilisateur'];
                    echo '<script language="Javascript">
                    document.location.replace("index.php");
                    </script>'; 
                    $clientorphotographe='client';
                    //message erreur
                }else  echo('<p class="text-warning">Vous n\'avez pas de compte client</p>');
            
              }
            }else echo('<p class="text-warning"> Mot de passe ou mail non valide</p>');

          }else { echo('<p class="text-warning"> Veuillez tous remplire </p>');}
           //FIN message erreur
        }
      }
  
?>
 <?php
    include('src/footer.php'); 
?>
 </div>