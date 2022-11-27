<?php

class Bank {
  public array $rates;
  function __construct()
  {
    $this->rates = [];
  }
  function reduce(Expression $source, string $to) : Money
  {
    return $source->reduce($this,$to);
  }
  function rate(string $from, string $to) : int
  {
    $rate = fn() : int => $this->rates["$from -> $to"];
    return $rate();
  }
  function addRate(string $from, string $to, int $int) : void
  {
    $this->rates[] = [ "$from -> $to" => $int ];
  }
}
