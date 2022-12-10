<?php

class Sum implements Expression {
  function __construct(Expression $augend,Expression $addend)
  {
    $this->augend = $augend;
    $this->addend = $addend;
  }
  function plus(Expression $addend) : Expression
  {
    return new Sum($this,$this->addend);
  }
  function reduce(Bank $bank,string $to) : Money
  {
    $ammount = fn() : int =>
      $this
        ->augend
        ->reduce($bank,$to)->ammount() +
      $this
        ->addend
        ->reduce($bank,$to)->ammount();

    return new Money($ammount(),$to);
  }
}

