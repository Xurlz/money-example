<?php

abstract class Money {
  function __construct(protected int $ammount, protected string $currency)
  {
    $this->ammount = $ammount;
    $this->currency = $currency;
  }
  static function dollar(int $ammount)
  {
    return new Dollar($ammount,"USD");
  }
  static function franc(int $ammount)
  {
    return new Franc($ammount,"CHR");
  }
  abstract function currency() : String;
  abstract function times(int $multiplier);
  function equals(Money $money)
  {
    return $this->ammount === $money->ammount()
      && get_class($this) === get_class($money);
  }
  function ammount()
  {
    return $this->ammount;
  }
}

