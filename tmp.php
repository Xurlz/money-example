<?php

$a = array(
  "Sherlock",
  "Lupin",
  "Isidore",
  "Charles"
);

$neddle = null;

foreach($a as $item) {
  if(isTarget("Lupin",$item)) $neddle = $item;
}

function isTarget($target,$item)
{
  return $item === $target;
}

var_dump($neddle);


