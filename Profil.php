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
        <h1 class="display-4">Votre Profil</h1>
        <h2>   <?php echo  $_SESSION['Nom'];?>     </h2>
        <?php
        //si photographe affiche
                if(isset($_SESSION['idphotographe'])){
                  $idutilisateurphotos=$_SESSION['idphotographe'];
                        
                  $utilisatphoto = $connexion->prepare('SELECT * FROM photographe WHERE idphotographe =:id');
                      $utilisatphoto->execute(array('id'=> $idutilisateurphotos));
                      $photographeid = $utilisatphoto->fetch();
                      $utilisateurphoto = $connexion->prepare('SELECT * FROM photographe,utilisateur WHERE Idutiliateurphoto = :id and IdUtilisateur =:id ');
                            $utilisateurphoto->execute(array('id'=>$photographeid['Idutiliateurphoto']));
                            $results = $utilisateurphoto->fetch();
                            //son profil photographe
                       echo $results['Credit'].' Crédits ';
                       echo $results['Photo'].' Photos';
                ?>
                    <div class="form">
                        <h2  class="text-dark">photographe</h2>
                        
                    </div>
                    
                     <!-- si client affiche -->
                <?php }elseif (isset($_SESSION['idclient'])){
                   $idutilisateurclient=$_SESSION['idclient'];
                   
                   $utilisatclient = $connexion->prepare('SELECT * FROM client WHERE idclient =:id');
                       $utilisatclient->execute(array('id'=> $idutilisateurclient));
                       $clientid = $utilisatclient->fetch();
                       $utilisateurphoto = $connexion->prepare('SELECT * FROM client,utilisateur WHERE Idutilisateurclient = :id and IdUtilisateur =:id ');
                       $utilisateurphoto->execute(array('id'=>$clientid['Idutilisateurclient']));
                       $results = $utilisateurphoto->fetch();
                        //son profil client
                       echo $results['Credit'].' Crédit ';?>
                       
                  <div class="form">
                        <h2  class="text-dark">Client</h2>
                        
                    </div>
                    <?php }?>
      </div>
      <!-- Partie photographe -->
      <?php 
      if(isset($_SESSION['idphotographe'])){?>
      <form method="POST" class=" text-light " enctype="multipart/form-data" >
    
              <div class=" btn-group-toggle form-group" data-toggle="buttons">
                <label class="btn btn-info col-md-4 mb-3 ">
                  <input type="radio" name="1" id="client" value="client"  onchange="aff_cach_input('client')">
                  Poster une photo
                </label>
                <label class="btn btn-info col-md-4 mb-3 float-right">
                  <input type="radio" name="1" id="Photographe" value="Photographe" onchange="aff_cach_input('Photographe')">
                  Voire mes photos
                </label>
              </div>
              <div id="blockPhoto">
                 
                      <h2  class="<?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}  ?>">Mes photos</h2>
                      <?php 
                      //voir toute ses photo postée
                      $laphoto = $connexion->prepare('SELECT * FROM photo WHERE id_photographe = :id');
                       $laphoto->execute(array('id'=>$idutilisateurphotos));
                       foreach ($laphoto as $donnees ) 
                       {
                       ?>
                      
                      <figure class="figure">
                        <a href="<?php echo $donnees['Nomphoto'];?>"><img class="d-block mx-auto mb-2 img-fluid float-left" src=<?php echo $donnees['Nomphoto'];?> width="170" height="115"></a>
                        <div class="text-center">
                        <figcaption><button class="btn bg-danger " name="<?php echo $donnees['id_photo'];?>" type="submit">Supprimer</button></figcaption>
                        <?php
                        
                         if (isset($_POST[$donnees['id_photo']])){
                          
                          $supp = $connexion->prepare('DELETE FROM `photo` WHERE Nomphoto = :photo');
                          $supp->execute(array('photo'=>$donnees['Nomphoto']));
                          $photog = $connexion->prepare("UPDATE photographe set Photo=Photo-1 where idphotographe=$idutilisateurphotos");
                          $photog->execute();
                          unlink($donnees['Nomphoto']);
                          }
                        
                         
           ?>
                        </div>
                        </figure>
         
                 <?php
                          }
                         
           ?>
                       
                 
              </div>

                  <div id="blockclient" class="<?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}  ?>">
                  <label for="fichier_a_uploader">Envoyer le fichier :</label>
                   <input type="file"  id="fichier" name="fichier" />
                   <div class="form-row  ">
                    <button class="btn bg-warning " name="photo" type="submit">Télécharger</button>
                    </div>
                  <?php 
              if (isset($_POST["photo"]))
              {
                //Mettre une image sur son profil
                  $envoy="lesphotos/"; #dossier dans la quelle va les images
                  $fichier =$envoy . basename($_FILES["fichier"]["name"]);#extrait le nom du fichier du chemin complet

                  $type = array('.png', '.gif', '.jpg', '.tif', '.JPG');#On demande d'avoir que c'est type de fichier
                  $types = strrchr($_FILES['fichier']['name'], '.');#va cherche la dernier occurence d'un caractère dans une chaîne  

                  if ($_FILES["fichier"]["size"] > 2000000) {#si supérieur à 2MO 
                                                            #PB:ne fonctionne pas avec 2MO et les fichiers trop vons directe en echec 
                                                            #avec 1MO cela fonctionne 
                      echo "désoler, ton fichier est trop gros max 2MO";#erreur
                    
                  }
                  else{
                      if(!in_array($types, $type)) #A partir d'un tableau il va vérifier le type 
                      {
                          echo 'Il n\'y à que les fichiers de type png, gif, jpg, tif qui sont pris en conte';#erreur
                      }
                      else{
                        if(strlen($fichier)<50)
                        {
                          $verif = $connexion->query("SELECT * FROM photo WHERE Nomphoto='$fichier' ");
                          $count = $verif->fetchColumn();
                          if($count == 0)
                          {
                            if(move_uploaded_file($_FILES["fichier"]["tmp_name"],$fichier))#déplacement d'un fichier 
                            {
                           
                              echo 'Téléchargement effectué ';#message comme quoi c'est bien envoyé 
                              $taille=$_FILES["fichier"]["size"];
                              $ins = $connexion->prepare('INSERT INTO photo (Nomphoto,taillephoto,id_photographe) VALUES(:nom,:taille,:photographe)');
                              $ins->execute(array('nom'=>$fichier,'taille'=>$taille,'photographe'=>$idutilisateurphotos));
                              $photog = $connexion->prepare("UPDATE photographe set Photo=Photo+1 where idphotographe=$idutilisateurphotos");
                              $photog->execute();
                              echo '<script language="Javascript">
                              document.location.replace("Profil.php");
                              </script>'; 
                            } 
                            else{echo "Echec du téléchargement";}
                           
                            }
                            else{echo "Ce nom est déjà pris";}
                          }
                          else{echo"veuillez renomer votre photo";}
                         
                      }
                  }
              }
              
              ?>
                 
                   

                  </div>
                   
                  <?php ;}





                  //<-- Partie client -->
              elseif(isset($_SESSION['idclient'])){?>
                <form method="POST" class=" text-light " enctype="multipart/form-data">
    
                <div class=" btn-group-toggle form-group " data-toggle="buttons">
                  <label class="btn btn-info col-md-4 mb-3 ">
                    <input type="radio" name="1" id="client" value="client"  onchange="aff_cach_input('client')">
                    Les achats
                  </label>
                   <div id="blockclient">
                   <h2  class="<?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}  ?>">Les photos achetées</h2>
                   </div>
                    <?php }?>
         </div>






                    <script>
                            aff_cach_input('Photographe');
                    </script>
            </div>
            
 </form>