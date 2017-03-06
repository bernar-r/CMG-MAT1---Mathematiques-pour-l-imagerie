<?php
// nombre_complexe.php for maths in /root
// 
// Made by GENDARME Thibaut
// Login   <gendar_t@etna-alternance.net>
// 
// Started on  Fri Oct 28 13:30:04 2016 GENDARME Thibaut
// Last update Wed Nov 16 16:49:31 2016 BERNARD Robin
//

function nombre($reel, $imaginaire)
{
  $str = $reel;

  if ($imaginaire[0] == "-")
    {
      $str = $str . $imaginaire . "";
      return ($str);
    }
  else
    {
      $str = $str . "+" . $imaginaire. "";
      return ($str);
    }
}

function conjugue($reel, $imaginaire)
{
  $str = $reel;

  if ($reel == 0 && $imaginaire == 0)
    {
      $str = 0;
      return ($str);
    }
  if ($reel == 0 && $imaginaire > 0)
    {
      $str = "-".$imaginaire."i";
      return ($str);
    }
  if ($reel == 0 && $imaginaire < 0)
    {
      $imaginaire[0] = "";
      $str = $imaginaire."i";
      return ($str);
    }
  if ($reel != 0 && $imaginaire == 0)
    {
      $str = $reel;
      return ($str);
    }
  if ($reel < 0 && $imaginaire < 0)
    {
      $imaginaire[0] = "+";
      $str = $reel . $imaginaire."i";
      return ($str);
    }
  if ($reel < 0 && $imaginaire > 0)
    {
      $str = $reel ."-". $imaginaire."i";
      return ($str);
    }
  if ($reel > 0 && $imaginaire > 0)
    {
      $str = $reel ."-". $imaginaire."i";
      return ($str);
    }
  if ($reel > 0 && $imaginaire < 0)
    {
      $imaginaire[0] = "+";
      $str = $reel . $imaginaire."i";
      return ($str);
    }
  
}

function algebrique($reel, $imaginaire)
{

  
  if ($reel == 0 && $imaginaire == 0)
    {
      $str = 0;
      return ($str);
    }
  if ($reel == 0 && $imaginaire != 0)
    {
      $str = $imaginaire."i";
      return ($str);
    }
  if ($reel != 0 && $imaginaire == 0)
    {
      $str = $reel;
      return ($str);
    }
  if ($reel < 0 && $imaginaire < 0)
    {
      $str = $reel . $imaginaire."i";
      return ($str);
    }
  if ($reel < 0 && $imaginaire > 0)
    {
      $str = $reel ."+". $imaginaire."i";
      return ($str);
    }
  if ($reel > 0 && $imaginaire > 0)
    {
      $str = $reel ."+". $imaginaire."i";
      return ($str);
    }
  if ($reel > 0 && $imaginaire < 0)
    {
      $str = $reel . $imaginaire."i";
      return ($str);
    }
  

}
function inverse($reel, $imaginaire)
{
  $str = $reel;
  
  if ($reel == 0 && $imaginaire == 0)
    {
      $str = 0;
      return ($str);
    }
  if ($reel == 0 && $imaginaire > 0)
    {
      $str = "(i".$imaginaire.") / (".$imaginaire.")²";
      return ($str);
    }
  if ($reel > 0 && $imaginaire == 0)
    {
      $str = "(".$reel.") / (".$reel.")²";
      return ($str);
    }
  if ($imaginaire[0] != "-")
    {
      $str = "(".$reel." - i".$imaginaire.") / (".$reel.")² + (".$imaginaire.")²";
      return ($str);
    }
  if ($imaginaire[0] == "-")
    {
      $imaginaire[0] = "";
      $str = "(".$reel." + i".$imaginaire.") / (".$reel.")² + (-".$imaginaire.")²";
      return ($str);
    }
}

function argument2($reel, $imaginaire)
{
  if ($reel != 0)
    $arg = atan($imaginaire / $reel);
  if ($reel == 0 && $imaginaire > 0)
    $arg = '&pi;/2';
  if ($reel == 0 && $imaginaire < 0)
    $arg = '3&pi;/2';
  if ($reel == 0 && $imaginaire == 0)
    $arg = FALSE;
  return ($arg);
}