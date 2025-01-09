<?php

function Color(string $classe)
{
     $color = '';
     if ($classe == "3ème") $color = '#733506'; 
     elseif ($classe == "Terminale") $color = '#2F2721';
     return $color; 
}