<script>
  (function() {
    "use strict"
    window.addEventListener("load", function() {
      var form = document.getElementById("form")
      form.addEventListener("submit", function(event) {
        if (form.checkValidity() == false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add("was-validated")
      }, false)
    }, false)
  }())
  </script>

<!--inclusion de l'entete-->
   <?php
    include('src/head.php'); 
?>
<body >
<header>
		 <!--inclusion de la navigation-->
    <?php
    include('src/nav.php'); 
?>
    </header>
  <div class="container ">
    <div class="jumbotron">
      <h1 class="display-4">Inscription</h1>
      <p class="lead">Merci de remplir ce formulaire d'inscription.</p>
      <hr class="my-4">
      <p>👍 Nous te voulons dans notre équipe inscris toi vite !!!!☺☻☺☻☺♥👍</p>
    </div>
	
	
    <form class="<?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}  ?> " oninput='motdepasse2.setCustomValidity(motdepasse2.value != motdepasse1.value ?  "Mot de passe non identique" : "")' method="POST" id="form" novalidate>
      <div class="form-group row ">
        <div class="col-md-4 mb-3">
          <label for="prenom">Prénom</label>
          <input type="text" class="form-control"  name="Prenom" id="prenom" placeholder="Votre prénom" required>
          <div class="invalid-feedback">
            Le champ prénom est obligatoire
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="nom">Nom</label>
          <input type="text" class="form-control" name="Nom" id="nom" placeholder="Votre nom" required>
          <div class="invalid-feedback">
            Le champ nom est obligatoire 
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="email">Adresse électronique</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
          <small id="emailHelp" class="form-text text-muted">Nous ne partagerons votre email.</small>
          <div class="invalid-feedback">
            Vous devez fournir un email valide.
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="motDePasse1">Votre mot de passe</label>
          <input type="password" class="form-control" placeholder="Mot de passe" name= "motDePasse1" required>
			<div name="message" class="invalid-feedback">
            Mot de passe invalide
			</div>
		</div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="motDePasse2">Confirmation du mot de passe</label>
          <input type="password" class="form-control" placeholder="Confirmation" name= "motdepasse2" required>
          <div name="message" class="invalid-feedback">
            Les mots de passe ne sont pas identiques
          </div>
        </div>
      </div>

      <!-- Choix entre Client ou Photographe -->
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
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
        <div class="form-check">
          <input class="form-check-input" name="pub" type="checkbox" value="1" id="emailPromo">
          <label class="form-check-label" for="emailPromo">
            Oui, je veux recevoir des sources d’inspiration visuelles, des offres spéciales et autres communications par e-mail. 
          </label>
        </div>
      </div>
	 
    <button class="btn bg-light" type="submit" name="submit"> Envoyer</button>

    </form>
    
         <?php
       if (isset ($_POST['submit']))
       {
        
      require_once('bdd/connectserv.php');
              $connexion=connect_bd();
            
            
              if(isset($_POST['Prenom'] , $_POST['Nom'],$_POST['email'] , $_POST['motDePasse1'] )){
                if(!empty($_POST['Prenom']) AND !empty($_POST['Nom'])AND !empty($_POST['email']) AND !empty($_POST['motDePasse1'])AND !empty($_POST['1']))
                  {
                    //inissialisation de variable
                    $Nom = $_POST['Nom'];
                    $Prenom = $_POST['Prenom'];
                    $password = $_POST['motDePasse1'];
                    $email = $_POST['email'];
                    $choix = $_POST['1'];
                    if(!empty($_POST['pub'])){
                      $pub = 1;
                    }else{
                      $pub = 0;
                    }
                    //on verifie si le mail n'est pas deja pris
                    $veriffication = $connexion->query("SELECT * FROM utilisateur WHERE MailUtilisateur = '$email'");
                    $combient = $veriffication->fetch();
                    
                    echo $pub;
                    //on virifie dans la base photographe
                    $utilisateurphoto = $connexion->prepare('SELECT * FROM photographe WHERE Idutiliateurphoto = :id ');
                    $utilisateurphoto->execute(array('id'=>$combient['IdUtilisateur']));
                    $utipho = $utilisateurphoto->rowCount();
                    //on virifie dans la base client
                    $utilisateurclient = $connexion->prepare('SELECT * FROM client WHERE Idutilisateurclient = :id  ');
                    $utilisateurclient->execute(array('id'=>$combient['IdUtilisateur']));
                    $uticlient = $utilisateurclient->rowCount();
                    //verifie s'il a un compte photographe et client
                      if($uticlient < 1 OR  $utipho < 1){
                        //verifie s'il a un compte client
                          if($uticlient <1 ){
                          //verifie s'il a un compte photographe
                            if($utipho <1 ){
                                  $password= md5($password);
                              if ($choix =="Photographe"){
                              $verif = $connexion->query("SELECT * FROM utilisateur,photographe WHERE NomUtilisateur = '$Nom' and PrenomUtilisateur = '$Prenom' and MailUtilisateur = '$email'and	Idutiliateurphoto=(select IdUtilisateur from utilisateur where NomUtilisateur = '$Nom' and PrenomUtilisateur = '$Prenom' and MailUtilisateur = '$email')");
                              $count = $verif->fetchColumn();
                              if($count == 0)
                                {
                                  $password= md5($password);
                                       
                                  $ins = $connexion->prepare('INSERT INTO utilisateur (PrenomUtilisateur,NomUtilisateur,MailUtilisateur,MdpUtilisateur,actu) VALUES(:prenom,:nom,:email,:mdp,:actu)');
                                  $ins->execute(array('nom'=>$Nom,'prenom'=>$Prenom,'email'=>$email, 'mdp'=>$password, 'actu'=>$pub));
                                   //insertion dans la base photographe
                                  $photog = $connexion->prepare("INSERT INTO photographe (Idutiliateurphoto) SELECT IdUtilisateur FROM utilisateur WHERE NomUtilisateur = '$Nom' and PrenomUtilisateur = '$Prenom' and MailUtilisateur = '$email'  Order by IdUtilisateur DESC limit 1");
                                  $photog->execute();
                                    echo '<script language="Javascript">
                                    document.location.replace("connexion.php");
                                    </script>';                   
                                        
                                } 
                                else {echo "Vous êtes déja photographe";}

                            }elseif($choix =="client") 
                            {  
                              $verif2 = $connexion->query("SELECT * FROM utilisateur,client WHERE NomUtilisateur = '$Nom' and PrenomUtilisateur = '$Prenom'  and MailUtilisateur = '$email'and Idutilisateurclient=(select IdUtilisateur from utilisateur where NomUtilisateur = '$Nom' and PrenomUtilisateur = '$Prenom'and MailUtilisateur = '$email' )");
                              $count2 = $verif2->fetchColumn();
                              if($count2 == 0)
                                {
                                  $password= md5($password);
                                       
                                  $ins2 = $connexion->prepare('INSERT INTO utilisateur (PrenomUtilisateur,NomUtilisateur,MailUtilisateur,MdpUtilisateur,actu) VALUES(:prenom,:nom,:email,:mdp,:actu)');
                                  $ins2->execute(array('nom'=>$Nom,'prenom'=>$Prenom,'email'=>$email, 'mdp'=>$password, 'actu'=>$pub));
                                  
                                   //insertion dans la base client
                                  $photog2 = $connexion->prepare("INSERT INTO client (Idutilisateurclient) SELECT IdUtilisateur FROM utilisateur WHERE NomUtilisateur = '$Nom' and PrenomUtilisateur = '$Prenom' and MailUtilisateur = '$email' Order by IdUtilisateur DESC  limit 1");
                                  $photog2->execute();
                                    echo '<script language="Javascript">
                                    document.location.replace("connexion.php");
                                    </script>';                   
                                        //les messages d'erreurs
                                }else {echo "Vous êtes déja client";}
                              }

                        }else {echo "Mail déja en temps que photographe! Incris toi à partir de ton compte photographe";}

                      }else {echo "Mail déja en temps que client!Incris toi à partir de ton compte client";}

                 }else {echo "Ce mail possède déja tous les comptes photographe et client!";}

                  }else {echo "Veuillez saisir tous les champs !";}
                        //FIN messages d'erreurs
                }
         }
                    ?> 
                    <?php
    include('src/footer.php'); 
?>
  </div>

  

</body>
</html>