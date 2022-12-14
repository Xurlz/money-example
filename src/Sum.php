<?php

class Sum implements Expression {
  function __construct(Expression $augend,Expression $addend)
  {
    $this->augend = $augend;
    $this->addend = $addend;
  }
  function times(int $multiplier) : Expression
  {
    return new Sum(
      $this->augend->times($multiplier),
      $this->addend->times($multiplier)
    );
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

