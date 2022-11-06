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
    $franc = $object;
    return $this->ammount === $franc->ammount();
  }
  function ammount()
  {
    return $this->ammount;
  }
}

