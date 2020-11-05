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

    <div class="jumbotron">
        <h1 class="display-4 text-center">Acheter</h1>
	
      </div>
    <div class="container ">
                  <!--Affichage de toute les photos-->
                 <h2  class="text-center <?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}  ?>">Les photos en stocke</h2>
                 <?php 
                 $lesphoto = $connexion->prepare('SELECT * FROM photo');
                  $lesphoto->execute();
                  foreach ($lesphoto as $donnees ) 
                  {
                  ?>
                 
                 <figure class="figure">
                   <a href="<?php echo $donnees['Nomphoto'];?>"><img class="d-block mx-auto mb-2 img-fluid float-left" src=<?php echo $donnees['Nomphoto'];?> width="170" height="115"></a>
                   <div class="text-center">
                   <figcaption><button class="btn bg-danger " name="<?php echo $donnees['id_photo'];?>" type="submit">Acheter</button></figcaption>
                  
                   </div>
                   </figure>
    
            <?php
                     }
                    
      ?>
                  
            
         </div>