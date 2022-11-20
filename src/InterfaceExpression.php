<?php

interface Expression {
  function reduce(string $to) : Money;
  function plus(Money $addend) : Expression;
}

