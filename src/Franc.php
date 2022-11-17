<?php

class Franc extends Money {
  function __construct(int $ammount)
  {
    parent::__construct($ammount);
    $this->currency = "CHR";
  }
  function currency() : String
  {
    return $this->currency;
  }
  function times(int $multiplier) : Money
  {
    return new Franc($this->ammount * $multiplier);
  }
}

