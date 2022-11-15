<?php

class Dollar extends Money {
  function __construct(int $ammount)
  {
    parent::__construct($ammount);
  }
  function times(int $multiplier) : Money
  {
    return new Dollar($this->ammount * $multiplier);
  }
}

