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
  function equals(object $object)
  {
    $money = $object;
    return $this->ammount === $money->ammount();
  }
  function ammount()
  {
    return $this->ammount;
  }
}

