<?php

class Franc extends Money {
  function __construct(int $ammount,string $currency)
  {
    parent::__construct($ammount,$currency);
  }
}

