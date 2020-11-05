<!DOCTYPE html>
<html>
<head>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
	<style>
		.carousel-item
		{
			width: 100%;
			height: auto;
			background-color:#5f666d;
			color:white;
		}
	</style>
</head>

<body>

      <?php
    include('src/nav.php'); 
?>


  
	<div  class="container text-center">
	<!--Va chercher le cookie pour change le fond en blanc logo -->
		<div id="text" class="py-5 text-center <?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}  ?> ">
     		 <img  id="logo1"class="d-block mx-auto mb-2" src="<?php if($_COOKIE['nom_cookie']=="noir"){echo "images/profile.png";}else{echo "images/profile.jpg";} ?>"  alt="logo photoforyou" width="170" height="115">
    		 <h1  class="display-5">PhotoForYou</h1>
     		 <p class="lead">Des pros au service des professionnels de la communication.</p>
			<form method="POST" >
			<div class="btn-group btn-group-toggle form-group float-right  " data-toggle="buttons">
				<button  type="submit" id="dark"name="couleur" class="btn btn-dark " >dark</button >
			
				<button  type="submit" id="light"name="couleur" class="btn btn-light" >light</button > 
				
			</div>
			</form>
		</div>
		<script> 
		document.getElementById("light").onclick = function changeblanc(){
    //javascript changement fond en blanc
			document.cookie ='nom_cookie=blanc;path=chemin;';
			document.body.style.background = 'rgb(255,255,255)';
			document.getElementById("text").style.color = 'rgb(29,33,36)';
            document.getElementById("text1").style.color = 'rgb(29,33,36)';
            document.getElementById("text2").style.color = 'rgb(29,33,36)';
			document.getElementById("logo1").src = 'images/profile.jpg';
			
		}
			document.getElementById("dark").onclick = function change(){
    //javascript changement fond en noir
			document.cookie ='nom_cookie=noir;path=chemin;';
			document.body.style.background = 'rgb(29,33,36)';
			document.getElementById("text").style.color = 'rgb(255,255,255)';
            document.getElementById("text1").style.color = 'rgb(255,255,255)';
            document.getElementById("text2").style.color = 'rgb(255,255,255)';
			document.getElementById("logo1").src = 'images/profile.png';
}  </script> 


		<!-- Carrousel -->
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img class="d-block w-100" src="images/carrousel/carrousel1.png" alt="First slide">
				</div>
				<div class="carousel-item">
				  <img class="d-block w-100" src="images/carrousel/carrousel2.png" alt="Second slide">
				</div>
				<div class="carousel-item">
				  <img class="d-block w-100" src="images/carrousel/carrousel3.png" alt="Third slide">
				</div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
		
		<div class="jumbotron ">
    		<p class="lead">Moins de temps à chercher. Plus de résultats.</p>
				<p class="lead">Découvrez les images qui vous aideront à vous démarquer.</p>
				<p><a class="btn btn-primary btn-lg" href="inscription.php" role="button">Inscrivez vous !</a></p>
		</div>

		<div class="row">
			<div class="col mt-4">
				<div class="card-deck" >
					<div class="card bg-warning border-dark">
						<img class="card-img-top" src="images/paysages.jpg" alt="paysages"/>
						<div class="card-img-overlay">
						    <h5 class="card-title">Paysages</h5>
						</div>
						<div class="card-body">
							<h5 class="card-title">Les paysages</h5>
							<p class="card-text">Une collection de photos extraordinaires réalisées par des photographes professionnels. Redecouvrez la planète terre ! </p>
							<a href="#" class="btn btn-primary">Je veux voir...</a>
						</div>
						<div class="card-footer">
							<small>Dernière mise à jour 1 Septembre 2019</small>
						</div>
					</div>
					<div class="card bg-success border-dark">
						<img class="card-img-top" src="images/portraits.jpg" alt="Elit Amet">
						<div class="card-img-overlay">
						    <h5 class="card-title">Portraits</h5>
						</div>
						<div class="card-body">
							<h5 class="card-title">Les portraits</h5>
							<p class="card-text">Toutes les expressions, tous les visages du sourire aux larmes. Vous trouverez le portrait qu'il vous faut pour vos publications.</p>
							<a href="#" class="btn btn-primary">Je veux voir...</a>
						</div>
						<div class="card-footer">
							<small>Dernière mise à jour 23 Aout 2019</small>
						</div>
					</div>
					<div class="card bg-danger border-dark">
						<img class="card-img-top" src="images/evenements.jpg" alt="Sollicitudin Ornare Malesuada">
						<div class="card-img-overlay">
						    <h5 class="card-title">Evènements</h5>
						</div>
						<div class="card-body">
							<h5 class="card-title">Les évenements</h5>
							<p class="card-text">Que ce soit les mariages, férias, soirées DJ. Vous trouverez la photo pour mettre en valeur votre évènement.</p>
							<a href="www.google.fr" class="btn btn-primary">Je veux voir...</a>
						</div>
						<div class="card-footer">
							<small>Dernière mise à jour 20 Juillet 2019</small>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="text1" class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center <?php if($_COOKIE['nom_cookie']=="noir"){echo "text-light";}else{echo "text-dark";}?> ">
      		<h1 id="tarif" class="display-4">Tarifs</h1>
      		<p class="lead">Une tarification flexible.</p>
    	</div>
		<div class="card-deck mb-3 text-center">
			
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Essai</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mois</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>5 photos offertes</li>
              <li>Usage privé</li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Faire un essai</button>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Formule Découverte</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">9 € <small class="text-muted">/ mois</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>20 crédits</li>
              <li>20 % de remise sur les photos</li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Acheter</button>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Formule pro</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">19 € <small class="text-muted">/ mois</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>60 crédits</li>
              <li>30 % de remise sur les photos</li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Acheter</button>
          </div>
        </div>
		</div>

		<?php
    include('src/footer.php'); 
?>
	</div>
<!-- Les liaisons aux scripts -->
</body>
</html>