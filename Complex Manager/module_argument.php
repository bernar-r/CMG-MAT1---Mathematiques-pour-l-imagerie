<?php
// module_argument.php for MATHS in /var/www/html/MATHS
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Wed Nov 16 10:08:37 2016 REUTER Faustine
// Last update Thu Nov 17 14:11:20 2016 GENDARME Thibaut
//

function module($reel, $imaginaire)
{
  $mod = sqrt($reel * $reel + $imaginaire * $imaginaire);
  return ($mod);
}

function argument($reel, $imaginaire)
{
  if ($reel != 0)
    $arg = atan($imaginaire / $reel);
  if ($reel == 0 && $imaginaire > 0)
    $arg = '&pi;/2, soit environ 1.57079632679';
  if ($reel == 0 && $imaginaire < 0)
    $arg = '3&pi;/2, soit environ 4.71238898038';
  if ($reel == 0 && $imaginaire == 0)
    $arg = FALSE;
  return ($arg);
}

function expo($reel, $imaginaire)
{
  $mod = sqrt($reel * $reel + $imaginaire * $imaginaire);
  if ($reel != 0)
    $arg = atan($imaginaire / $reel);
  if ($reel == 0 && $imaginaire > 0)
    $arg = 1.57079632679;
  if ($reel == 0 && $imaginaire < 0)
    $arg = 4.71238898038;
  return ($mod."e^(".$arg."i)");
}