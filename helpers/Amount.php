<?php

function amount(mixed $amount, mixed $ecolage)
{
     return $ecolage - $amount;
}

function status(mixed $amount, mixed $ecolage)
{
     $rest = $ecolage - $amount;
     return $rest > 0 ? "Incomplet" : "Complet";
}
