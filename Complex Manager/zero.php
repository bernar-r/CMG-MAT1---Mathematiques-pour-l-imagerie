<?php
// zero.php for maths in /var/www/html/MATHS
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Fri Oct 28 14:46:01 2016 REUTER Faustine
// Last update Thu Nov  3 13:46:40 2016 REUTER Faustine
//
function del_zero($str)
{
  $moins = "0";
  $ok = 0;
  if ($str[0] == "-")
    {
      $moins = "-";
      $str=substr($str, 1);
    }
  if ($str[0] == 0 && isset($str[1]) && $str[1] >= 1 && $str[1] <= 9)
    $str=substr($str, 1);
  while ($str[0] == "0" && isset($str[1]) && $str[1] ==! ".")
    {
      $str=substr($str, 1);
      $ok = 1;
    }
  if ($str[1] == ".")
    $ok = 0;
  if ($str[0] == "0" && $ok == 1)
    {
      $str=substr($str, 1);
    }
  $size = strlen($str);
  if ($str[$size - 1] == "0" && strstr($str, '.') != false)
    $str = delnext_zero($str);
  if ($str == '')
    $str = 0;
  if ($moins == "0")
    return $str;
  else
    return $moins . $str;
}

function delnext_zero($str)
{
  $size = strlen($str);
  $i = 1;
  while ($str[$size - $i] == 0)
    {
      $i = $i + 1;
    }
  $str=substr($str, 0, -$i+1);
  if (strlen($str) == ".")
    $str=substr($str, 1);
  return $str;
}