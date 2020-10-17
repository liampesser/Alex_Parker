<?php
/*
  ./noyau/fonctions.php
  Fonctions bien utiles pour notre framework
*/
namespace Noyau\Fonctions;

/**
 * Fonction de slugification à la volée
 * @param  string $str [description]
 * @return string      [description]
 */
function slugify(string $str) :string {
  return trim(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), strtolower($str)), '-');
}

function formater_date(string $date, string $format = 'D d M y') :string {
  return date_format(date_create($date), $format);
}

/**
 * [tronquer description]
 * @param  string  $chaine         [description]
 * @param  integer $nbreCaracteres [description]
 * @return string                  [description]
 */
function tronquer(string $chaine, int $nbreCaracteres = 200) :string{
  if(strlen($chaine) > $nbreCaracteres):
    $positionEspace = strpos($chaine, ' ', $nbreCaracteres);
    return substr($chaine, 0, $positionEspace);
  else:
    return $chaine;
  endif;
}
