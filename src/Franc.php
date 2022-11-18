<?php

class Franc extends Money {
  function __construct(int $ammount,string $currency)
  {
    parent::__construct($ammount,$currency);
  }
  function currency() : String
  {
    return $this->currency;
  }
  function times(int $multiplier) : Money
  {
    return new Franc($this->ammount * $multiplier,"CHR");
  }
}

