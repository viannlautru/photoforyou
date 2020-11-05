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


 <script>  
            function changeColorfond(fond) { 
                document.body.style.background = fond;
                    
            }
            function changeColortext(text) { 
                document.getElementById("text").style.color = text;
                 document.getElementById("text1").style.color = text;
                  document.getElementById("text2").style.color = text;

            }

        </script> 
  <script>
        function aff_cach_input(action){ //la fonction JS
            if (action == "Photographe") //on regarde si tu veux afficher ou cacher le input
            {
                document.getElementById('blockPhoto').style.display="inline"; //Si oui, on l'affiche
                document.getElementById('blockclient').style.display="none"; 
            }
            else if (action == "client")
            {
                document.getElementById('blockPhoto').style.display="none"; 
                document.getElementById('blockclient').style.display="inline"; 
            }
                  return true;
        }
        function confirmer(){
    var res = confirm("Êtes-vous sûr de vouloir supprimer?");
    if(res){
        // Mettez ici la logique de suppression
    }
}
    </script>
</head>