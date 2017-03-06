<?php
// index.php for fractale in /var/www/html/fractale
// 
// Made by GENDARME Thibaut
// Login   <gendar_t@etna-alternance.net>
// 
// Started on  Thu Nov 24 14:42:23 2016 GENDARME Thibaut
// Last update Mon Nov 28 10:12:04 2016 REUTER Faustine
//
?>

<html>
  <head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <title>The Mandelbrot Fractal</title>
  </head>
  <body>
   <form action="#" method="post" class="formulaire">

   <div class="boite">
      <div class="option">
<br><hr>
	<h4>The Mandelbrot Fractal</h4>
<hr>
   Nombre d&apos;itération : <br><input type="text" value="50" name="iteration"><br>
	Degré : <br><input type="text" value="2" name="degres"><br>
	<br><button type="submit">Valider</button><br><br>
    </form>
    </div></div>
   <?php if ($_POST['iteration'] && $_POST['degres'])
{
  session_start();
  $_SESSION['degres'] = $_POST['degres']; 
    $_SESSION['iteration'] = $_POST['iteration']; ?>
<div class="fractale">
<img src="./fractale.php">
</div>
<?php }
   ?>
  </body>
</html>
