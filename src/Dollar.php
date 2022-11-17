<?php

class Dollar extends Money {
  function __construct(int $ammount)
  {
    parent::__construct($ammount);
    $this->currency = "USD";
  }
  function currency() : String
  {
    return $this->currency;
  }
  function times(int $multiplier) : Money
  {
    return new Dollar($this->ammount * $multiplier);
  }
}

