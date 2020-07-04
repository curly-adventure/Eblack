<?php


function getPrice($prixendecimal)
{
    $prix=floatval($prixendecimal)/1000;
    return number_format($prix,3,',','');
}

?>