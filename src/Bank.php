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
    if($from === $to) return 1;
    foreach($this->rates as $rate) {
      if($rate["name"] == "$from -> $to") return $rate["value"];
    }
  }
  function addRate(string $from, string $to, int $int) : void
  {
    $this->rates[] = ["name" => "$from -> $to","value" => $int ];
  }
}
