<?php

function Color(string $classe)
{
     $color = '';
     if ($classe == "3ème") $color = '#062C87'; 
     elseif ($classe == "Terminale") $color = '#5C2906';
     return $color; 
}