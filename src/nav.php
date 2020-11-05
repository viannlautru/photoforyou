<?php
session_start();

            if(isset($_COOKIE['nom_cookie'])){
              if($_COOKIE['nom_cookie']=="noir"){?>
				<script> 
				document.body.style.background = 'rgb(29,33,36)';
				</script> <?php
            }else{
				?> <script>
				document.body.style.background = 'rgb(255,255,255)';
				</script><?php
            }
          }
        ?>
		
    	<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light ">
        	
        	<a class="navbar-brand" href="index.php">PhotoForYou</a>
        	<!-- Pour passer en mode hamburger si on est sur un petit écran -->
        	<button class="navbar-toggler" type="button" data-toggle="collapse" 
        		data-target="#navbarCollapse" aria-controls="navbarCollapse" 
        		aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
        	</button>

        	<div class="collapse navbar-collapse " id="navbarCollapse">
          		<ul class="navbar-nav mr-auto ">
            	 <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Photos</a>
  						    <div class="dropdown-menu">
  							   <a class="dropdown-item" href="acheter.php">Acheter</a>
  							   <a class="dropdown-item" href="#">Vendre</a>
  							   <a class="dropdown-item" href="#">Les plus populaires</a>
  							   <a class="dropdown-item" href="#">Les nouveautés</a>
  						    </div>
					     </li>
            	 <li class="nav-item">
              			<a class="nav-link" href="index.php#tarif">Tarifs</a>
            	 </li>
          		</ul>

				      <!-- formulaire de recherche -->
          		<form class="form-inline mt-md-0">
            		<input class="form-control mr-sm-2" type="text" placeholder="Votre recherche" aria-label="rechercher">
            		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
          		</form>
                <ul class="navbar-nav mr-right">
                <?php 
                 require_once('bdd/connectserv.php');
                 $connexion=connect_bd();
                 
                if(!isset($_SESSION['Nom'])) {echo('
                <li class="nav-item">
                  <a class="nav-link btn btn-outline-light" href="inscription.php">Inscription</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link btn btn-outline-light" href="connexion.php">S\'identifier</a>
               </li>');}else{
                if($_SESSION['Nom']) {if(isset($_SESSION['idclient'])){
						
						echo('
						<li class="nav-item">
						 <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Bonjour '.$_SESSION['Nom'].' client
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="Profil.php">Profil</a>
						<a class="dropdown-item" href="clientphoto.php">Passer Photographe</a>
						
						</div>
						</li>');}
					elseif(isset($_SESSION['idphotographe'])){
						
						echo('
				<li class="nav-item">
				 <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Bonjour '.$_SESSION['Nom'].' photographe
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="Profil.php">Profil</a>
				<a class="dropdown-item" href="clientphoto.php">Passer Client</a>
				
				</div>
				</li>');}
				
					echo('
               </li>
               <li class="nav-item">
                  <a class="nav-link btn btn-outline-light" href="bdd/deconnection.php">Déconnexion</a>
               </li>');};
               
                }
                ?>  
        			
          		</ul>  
        	</div>
    	</nav>