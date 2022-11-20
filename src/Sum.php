<?php

class Sum implements Expression {
  function __construct(Money $augend,Money $addend)
  {
    $this->augend = $augend;
    $this->addend = $addend;
  }
}
