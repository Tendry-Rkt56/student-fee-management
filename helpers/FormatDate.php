<?php

function formatDate(string $date)
{
     $format = new \DateTime($date);
     $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
     return $formatter->format($format);
}