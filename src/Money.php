<?php

class Money implements Expression {
  function __construct(protected int $ammount, protected string $currency)
  {
    $this->ammount = $ammount;
    $this->currency = $currency;
  }
  function reduce(string $to) : Money
  {
    return $this;
  }
  function plus(Money $addend) : Expression
  {
    return new Sum($this, $addend);
  }
  function currency() : String
  {
    return $this->currency;
  }
  function equals(Money $money) : bool
  {
    return $this->ammount === $money->ammount
      && $this->currency() === $money->currency();
  }
  function __toString()
  {
    return "ammount {$this->ammount} {$this->currency}";
  }
  static function dollar(int $ammount)
  {
    return new Money($ammount,"USD");
  }
  static function franc(int $ammount)
  {
    return new Money($ammount,"CHR");
  }

  function times(int $multiplier) : Money
  {
    return new Money($this->ammount * $multiplier,$this->currency);
  }

  function ammount()
  {
    return $this->ammount;
  }
}

