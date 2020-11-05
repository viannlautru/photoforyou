<?php
if(isset($_POST['submit'])){ 
$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$text = $_POST['text'];
$titre = $_POST['Titre'];
$email = $_POST['Adresse_mail'];
$Numero = $_POST['Numero'];
if(!isset($Nom)){
//CONNEXION A LA BDD
    $bdd = mysqli_connect('localhost', 'root', '', 'inscription');
//REQUETE
$envoyer="INSERT INTO articles (Nom, Prenom, Texte, Titre,Email) VALUES ('$Nom','$Prenom','$text','$titre','$email')";
                            mysqli_query($bdd, $envoyer) or die('Erreur SQL !'.mysqli_error($bdd));
}else{
	echo"Veuillez saisir un nom !";
}
}
 ?>