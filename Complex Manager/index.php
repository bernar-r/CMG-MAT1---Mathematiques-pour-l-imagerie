<?php
// index.php for maths in /var/www/html/MATHS
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Fri Oct 28 13:08:02 2016 REUTER Faustine
// Last update Fri Nov 18 15:08:59 2016 GENDARME Thibaut
//
?>
<html>
  <head>
   <link rel="stylesheet" href="ressources/style_index.css">
   <title>PHP Test</title>
  </head>
 <body>
  <br>
  <h2>NOMBRES COMPLEXES</h2>
   <div class="formulaire">
  <form action="#" method="post" id="formulaire">
   <h4>Soit un nombre complexe de la forme: <br>z = a + ib</h4>
   <h5>Entrez a</h5>
  <input type="number" required step="any" name="reel"><br>
   <h5>Entrez b</h5>
   <input type="number" required step="any" name="imaginaire"><br>
   <br> <button type="submit" form="formulaire" value="Submit">Ok</button>
   </div>
   <?php
   if (isset($_POST['reel']) && isset($_POST['imaginaire']))
     {
       require('zero.php');
       require('nombre_complexe.php');
       require('module_argument.php');
       nombre($_POST['reel'], $_POST['imaginaire']);
       $_POST['reel'] = del_zero($_POST['reel']);
       $_POST['imaginaire'] =del_zero($_POST['imaginaire']);

       echo "<div class=\"articles\"><p>NOMBRE REEL :<br>" . $_POST['reel'] . "<br><br>NOMBRE IMAGINAIRE :<br>" . $_POST['imaginaire'] . "<br></p></div>";
       echo "<div class =\"articles\"><p>FORME ALGEBRIQUE :<br>" . algebrique($_POST['reel'], $_POST['imaginaire']) . "</p></div>";
       echo "<div class =\"articles\"><p>CONJUGUE :<br>" . conjugue($_POST['reel'], $_POST['imaginaire']) . "</p></div>";
       echo "<div class =\"articles\"><p>MODULE :<br>" . module($_POST['reel'], $_POST['imaginaire']) . "</p></div>";
       if (argument($_POST['reel'], $_POST['imaginaire']) != NULL)
	 echo "<div class =\"articles\"><p>ARGUMENT :<br>" . argument($_POST['reel'], $_POST['imaginaire']) . "</p></div>";
              if (($_POST['reel'] == 0) && ($_POST['imaginaire'] == 0))
	 {
	   echo "<div class =\"articles\"><p>FORME TRIGONOMETRIQUE : <br>indefini";
	 }
	 else
	   echo "<div class =\"articles\"><p>FORME TRIGONOMETRIQUE  :<br>" . module($_POST['reel'], $_POST['imaginaire']) . " (cos(" . argument2($_POST['reel'], $_POST['imaginaire']) . ") i*sin(" . argument2($_POST['reel'], $_POST['imaginaire']) . "))</p></div>";

       if (($_POST['reel'] == 0) && ($_POST['imaginaire'] == 0))
	 {
	   echo "<div class =\"articles\"><p>INVERSE: <br>indefini</div>";
	 }
       else
	 echo "<div class =\"articles\"><p>INVERSE :<br>" . inverse($_POST['reel'], $_POST['imaginaire']) . "</p></div>";
       if (($_POST['reel'] == 0) && ($_POST['imaginaire'] == 0))
	 {
	   echo "<div class =\"articles\"><p>Forme exponentielle: <br>indefini</div>";
	 }
       else
	 echo "<div class =\"articles\"><p>Forme Exponentielle: <br>" . expo($_POST['reel'], $_POST['imaginaire']) . "</p></div>";
       /* GRAPH */
       $a = $_POST['reel'];
       $b = $_POST['imaginaire'];
       ?>
       <canvas id="graph" width="900" height="900">
       <script>
       function Draw() {
	 /* initialisation des methode */
	 var c = document.getElementById("graph");
	 var ctx = c.getContext("2d");
	 /* Remplissage en noir */
	 ctx.beginPath();
	 ctx.rect(0, 0, 900, 900);
	 ctx.fillStyle = "black";
	 ctx.fill();
	 /* Tracer des axes */
	 ctx.translate(450,450)
	 ctx.beginPath();
	 ctx.moveTo(0,-450);
	 ctx.lineTo(0,450);
	 ctx.strokeStyle = '#ffffff';
	 ctx.stroke();
	 ctx.beginPath();
	 ctx.moveTo(-450,0);
	 ctx.lineTo(450,0);
	 ctx.strokeStyle = '#ffffff';
	 ctx.stroke();
	 /* BONUS : Echelle */
	 var a = <?php echo $a;?>;
	 var a_bis = a;
	 var a_lenght = 1;
	 while (a_bis > 10 || a_bis < -10) /* on compte le nombre de chiffre dans a et b*/
	   {
	     a_lenght++;
	     a_bis = a_bis /10;
	   }
	 var b = <?php echo $b;?>;
	 var b_bis = b;
	 var b_lenght =1;
	 while (b_bis > 10 || b_bis < -10)
	   {
	     b_lenght++;
	     b_bis = b_bis /10;
	   }
	 if (a_lenght >= b_lenght)
	   {
	     var nbr = a_lenght;
	   }
	 else
	   {
	     var nbr = b_lenght;
	   }
	 var nbr_bis = nbr;
	 var grad = graduation/10 *2;
	 var coeff = 42;
	 if (grad < 0)
	   {
	     grad = grad *-1;
	   }
	 while (nbr_bis > 1)
	   {
	     coeff = coeff / 10;
	     nbr_bis--;
	   }
	 /* graduation horizotale */
	 var i = 10;
	 var graduation = -1
	 var nbr_bis = nbr;
	 while (nbr_bis > 0)
	   {
	     graduation = graduation *10;
	     nbr_bis--;
	   }
	 var espacement = -420;
	 var grad = graduation/10 *2;
	 if (grad < 0)
	   {
	     grad = grad *-1;
	   }
	 while (i >= 0)
	   {
	     if (i != 5)
	       {
		 ctx.beginPath();
		 ctx.moveTo(espacement,5);
		 ctx.lineTo(espacement,-5);
		 ctx.strokeStyle = '#ffffff';
		 ctx.stroke();
		 ctx.font = "10px Arial";
		 ctx.fillStyle = 'white';
		 ctx.fillText(graduation,espacement-6,15);
	       }
	     if (i == 5)
	       {
		 ctx.font = "10px Arial";
		 ctx.fillStyle = 'white';
		 ctx.fillText("0",-10,10);
	       }
	     espacement = espacement + 84;
	     i--;
	     graduation = graduation + grad;
	   }
	 /* Graduation Verticale */
	 var i = 10;
	 var graduation = -1
	 var nbr_bis = nbr;
	 while (nbr_bis > 0)
	   {
	     graduation= graduation *10;
	     nbr_bis--;
	   }
	 var espacement= 420;
	 while (i >= 0)
	   {
	     if (i != 5)
	       {
		 ctx.beginPath();
		 ctx.moveTo(-5,espacement);
		 ctx.lineTo(5,espacement);
		 ctx.strokeStyle = '#ffffff';
		 ctx.stroke();
		 ctx.font = "10px Arial";
		 ctx.fillStyle = 'white';
		 ctx.fillText(graduation,15,espacement);
	       }
	     espacement= espacement - 84;
	     graduation = graduation + grad;
	     i--;
	   }
	 /* Affichage du point */
	 ctx.beginPath();
	 ctx.moveTo(a*coeff-6,-b*coeff);
	 ctx.lineTo(a*coeff+6,-b*coeff);
	 ctx.strokeStyle = '#ff0000';
	 ctx.stroke();
	 ctx.beginPath();
	 ctx.moveTo(a*coeff,-b*coeff+6);
	 ctx.lineTo(a*coeff,-b*coeff-6);
	 ctx.strokeStyle = '#ff0000';
	 ctx.stroke();
	 ctx.font = "15px Arial";
	 ctx.fillStyle = 'red';
	 ctx.fillText('M',a*coeff+5,-b*coeff-5);
       }
       </script>
       <script type="text/javascript">Draw();</script>
       <?php   
     }
   ?>
 </body>
</html>