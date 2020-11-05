<link href="css/formulaire.css" rel="stylesheet" type="text/css"



<!--je crée un "container" permettant l'identification de cette zone de formulaire-->
<div id="form_container">
<?php
if(isset($_POST['submit'])){ 
$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$text = $_POST['text'];
$titre = $_POST['Titre'];
$email = $_POST['Adresse_mail'];
$Numero = $_POST['Numero'];

//CONNEXION A LA BDD
    $bdd = mysqli_connect('localhost', 'root', '', 'inscription');
//REQUETE
        $envoyer="INSERT INTO articles (Nom, Prenom, Texte, Titre,Email) VALUES ('$Nom','$Prenom','$text','$titre','$email')";
        mysqli_query($bdd, $envoyer) or die('Erreur SQL !'.mysqli_error($bdd));
		echo "Message envoyé";

}
 ?>
 <center>
<form id="form_1" class="pixlines" method="POST" action="">

<h2><a>Formulaire</a></h2>
<input type="hidden" name="form_id" value="1" />
<div class="form_description">

</br>
</div>
<ul>
<li id="li_1" > 
<label class="description" for="element_1">Nom </label>
<div>
<input id="nom" name="Nom" class="element text medium" type="text" maxlength="255" />
</div>

<li id="li_2" >
<label class="description" for="element_2">Prenom </label>
<div>
<input id="prenom" name="Prenom" class="element text medium" type="text" maxlength="255"
value=""/>
</div>


<li id="li_3" >
<label class="description" for="element_2">Numero </label>
<div>
<input id="numero" name="Numero" class="element text medium" type="tel" maxlength="255"
value=""/>
</div>

<li id="li_4" >
<label class="description" for="element_4">Email </label>
<div>
<input id="Email" name="Adresse_mail" class="element text medium" type="email" maxlength="25"
value=""/>
<li id="li_5" > 
<div>
<label class="description" for="element_4">Titre </label>
<div>
<input id="Titre" name="Titre" class="element text medium" type="text" maxlength="70"
value=""/>
</div>
</br>
<li id="li_6" > 

<textarea name="text" rows="8" cols=60" required></textarea> 
</li>
</br>
<li class="buttons">
<input id="saveForm" class="button_text" type="submit" name="submit" value="Envoyer" />
</li>
</ul>
</form>
</center>