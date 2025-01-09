<?php

function FormatDate(string $date)
{
     $format = new \DateTime($date);
     return $format->format('d F Y');
}