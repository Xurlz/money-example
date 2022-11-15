<?php

class Franc extends Money {
  function __construct(int $ammount)
  {
    parent::__construct($ammount);
  }
  function times(int $multiplier) : Money
  {
    return new Franc($this->ammount * $multiplier);
  }
}

