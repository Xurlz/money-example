<?php

class Sum implements Expression {
  function __construct(Money $augend,Money $addend)
  {
    $this->augend = $augend;
    $this->addend = $addend;
  }
  function plus(Money $addend) : Expression
  {
    return new Sum($this->augend,$this->addend);
  }
  function reduce(Bank $bank,string $to) : Money
  {
    $ammount = fn() : int =>
      $this->augend->ammount() + $this->addend->ammount();
    return new Money($ammount(),$to);
  }
}
