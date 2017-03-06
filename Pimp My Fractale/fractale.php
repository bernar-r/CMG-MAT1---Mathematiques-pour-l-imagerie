<?php
// fractale.php for fractale in /var/www/html/fractale
// 
// Made by GENDARME Thibaut
// Login   <gendar_t@etna-alternance.net>
// 
// Started on  Tue Nov 22 13:55:30 2016 GENDARME Thibaut
// Last update Wed Nov 30 12:09:32 2016 BERNARD Robin
//
session_start();

/* Gestion de la vue sur l'image */

$x_min = -2;
$x_max = 1.2;
$y_min = -1.2;
$y_max = 1.8;

/* Taille de l'image */

$width = 700;
$height = 700;

/* Iteration et degres */

$iteration = $_SESSION['iteration'];
$degres = $_SESSION['degres'];

$image = imagecreatetruecolor($width, $height);
$blanc = imagecolorallocate($image, 255, 255, 255);
$noir  = imagecolorallocate($image, 0, 0, 0);
imagefill($image, 0 ,0 , $blanc);

/* Calcule du zoom */

$zoom_x = $width / ($x_max - $x_min);
$zoom_y = $height / ($y_max - $y_min);

/* Curseurs de l'image */

$x = 0;
$y = 0;

while ($x < $width)
  {
    $y = 0;
    while ($y < $height)
      {
	$z_r = 0;
	$z_i = 0;
	$c_r = $x / $zoom_x + $x_min;
	$c_i = $y / $zoom_y + $y_min;
	$i = 0;
	while (($z_r * $z_r + $z_i * $z_i) < 4 && $i < $iteration)
	  {
	    set_time_limit(1);
	    $tmp = $z_r;
	    $coeff_Zr = cos($degres * atan2($z_i, $tmp));
	    $coeff_Zi = sin($degres * atan2($z_i, $tmp));
	    $z_r = pow(($tmp * $tmp + $z_i * $z_i), ($degres / 2)) * $coeff_Zr + $c_r;
	    $z_i = pow(($tmp * $tmp + $z_i * $z_i), ($degres / 2)) * $coeff_Zi + $c_i;
	    $i++;
	  }
	if ($i == $iteration)
	  imagesetpixel($image, $x, $y, $noir);
	else
	  imagesetpixel($image, $x, $y, imagecolorallocate($image, 255-$i*$width/255, 255-$i*$width/255,255-$i*$width/255));
	$y++;
      }
    $x++;
  }

header('Content-type: image/png');
imagepng($image);
