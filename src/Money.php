<?php

class Money {
  function __construct(protected int $ammount)
  {
    $this->ammount = $ammount;
  }
  function times(int $multiplier)
  {
    return new Money($this->ammount * $multiplier);
  }
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

