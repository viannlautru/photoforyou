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
        <h1 class="display-4">Changement de compte</h1>
      </div>
 

      <form method="POST" class=" text-light ">
    
              <div class=" btn-group-toggle form-group" data-toggle="buttons">
                <label class="btn btn-info col-md-4 mb-3 ">
                  <input type="radio" name="1" id="client" value="client"  onchange="aff_cach_input('client')">
                  Client
                </label>
                <label class="btn btn-info col-md-4 mb-3 float-right">
                  <input type="radio" name="1" id="Photographe" value="Photographe" onchange="aff_cach_input('Photographe')">
                  Photographe
                </label>
              </div>
              <?php 
             
              
              ?>
       
      
            <!-- Partie client -->
            <div id="blockPhoto">
                <?php
                if(isset($_SESSION['idphotographe'])){
                ?>
                    <div class="form">
                        <h2  class="<?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}  ?>">Déja connecté  en tant que photographe</h2>
                        
                    </div>
                    
                    
                <?php }else{ ?>
                    <div class="form">
                        <h2  class="<?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}  ?>">Ce connecter en tant que photographe</h2>
                        
                    </div>   <?php 
                    //changement de client à photographe
                    require_once('bdd/connectserv.php');
                                $connexion=connect_bd();
                                $idutilisateurclient=$_SESSION['idclient'];
                                $idutilisateur=$_SESSION['IdUtilisateur'];
                                $utilisatclient = $connexion->prepare('SELECT * FROM client WHERE idclient =:id');
                                    $utilisatclient->execute(array('id'=> $idutilisateurclient));
                                    $clientid = $utilisatclient->fetch();

                                    $utilisateurphoto = $connexion->prepare('SELECT * FROM photographe,utilisateur WHERE Idutiliateurphoto = :id and IdUtilisateur =:id ');
                                    $utilisateurphoto->execute(array('id'=>$clientid['Idutilisateurclient']));
                                    $utipho = $utilisateurphoto->rowCount();
                                    $results = $utilisateurphoto->fetch();
                                
                                    if($utipho >0){?>
                    <div class="form-row  ">
                 
                    <button class="btn bg-warning " name="connectionphoto" type="submit">Connection</button>
                    </div>
                    <?php 
                            if(isset($_POST['connectionphoto'])){
                                
                               //ouverture session 
                                        $_SESSION['idphotographe'] =$results['idphotographe'];
                                        $_SESSION['Nom'] = $results['NomUtilisateur'];
                                        $_SESSION['IdUtilisateur'] = $results['IdUtilisateur'];
                                         //on enleve la session client 
                                        unset($_SESSION['idclient']);
                                        echo '<script language="Javascript">
                                        document.location.replace("index.php");
                                        </script>'; 
                                    }
                                    }else{?>
                                    <p  class="<?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}?>">pas de compte Photographe</p>
                                    
                                    <div class="form-row">
                                        <button class="btn bg-success " name="creationphotographe" type="submit">Ce créer un compte Photographe</button>
                                        </div>
                                    
                                    <?php  if(isset($_POST['creationphotographe'])){
                                            $photog = $connexion->prepare('INSERT INTO photographe (Idutiliateurphoto) VALUES(:utilisateur)');
                                            $photog->execute(array('utilisateur'=>$idutilisateur));
                                            
                                            echo '<script language="Javascript">
                                           document.location.replace("clientphoto.php");
                                            </script>'; 
                                            }
                                        }
                                
                        }
                    ?> 
                     </div> 
                  
                    <!-- Partie photographe -->
                    <div id="blockclient">

                    <?php
                        if(isset($_SESSION['idclient'])){
                        ?>
                    <div class="form" >
                        <h2  class="<?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}  ?>">Déja connecté en tant que client</h2>
                        
                    </div>
                    
                    
                <?php }else{ ?>
                    <div class="form">
                        <h2  class="<?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}  ?>">Ce connecter en tant que client</h2>
                        
                    </div>
                    <?php    require_once('bdd/connectserv.php');
                        $connexion=connect_bd();
                         //changement de photographe à client
                        $idutilisateurphotos=$_SESSION['idphotographe'];
                        $idutilisateur=$_SESSION['IdUtilisateur'];
                        $utilisatphoto = $connexion->prepare('SELECT * FROM photographe WHERE idphotographe =:id');
                            $utilisatphoto->execute(array('id'=> $idutilisateurphotos));
                            $photographeid = $utilisatphoto->fetch();

                            $utilisateurclient = $connexion->prepare('SELECT * FROM client,utilisateur WHERE Idutilisateurclient = :id and IdUtilisateur =:id ');
                            $utilisateurclient->execute(array('id'=>$photographeid['Idutiliateurphoto']));
                            $uticli = $utilisateurclient->rowCount();
                            $resultas = $utilisateurclient->fetch();
                            
                            if($uticli >0){?>
                    <div class="form-row">
                    
                    <button class="btn bg-warning " name="connectionclient" type="submit">Connection</button>
                    </div>
                   


                    <?php 
                    if(isset($_POST['connectionclient'])){

                            //ouverture session 
                                $_SESSION['idclient'] =$resultas['idclient'];
                                $_SESSION['Nom'] = $resultas['NomUtilisateur'];
                                $_SESSION['IdUtilisateur'] = $resultas['IdUtilisateur'];
                                //on enleve la session photographe 
                                unset($_SESSION['idphotographe']);
                                echo '<script language="Javascript">
                                document.location.replace("index.php");
                                </script>'; 
                            }
                            }else{ ?>
                            <p  class="<?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}?>">pas de compte client</p>
                            <div class="form-row">
                    
                                <button class="btn bg-success " name="creationclient" type="submit">Ce créer un compte client</button>
                                </div><?php 
                            if(isset($_POST['creationclient'])){
                                $photog = $connexion->prepare("INSERT INTO client (Idutilisateurclient) VALUES(:utilisateurs)");
                                $photog->execute(array('utilisateurs'=>$idutilisateur));
                                
                                echo '<script language="Javascript">
                                document.location.replace("clientphoto.php");
                                </script>';          



                             }
                            }
                     }
                    ?>
                 </div> 
                    

                    <script>
                            aff_cach_input('Photographe');
                    </script>
            </div>
 </form>