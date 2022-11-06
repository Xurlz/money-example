<?php

use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase {
  function testFrancMultiplication()
  {
    $five = new Franc(5);
    $this->assertTrue($five->times(2)->equals(new Dollar(10)));
    $this->assertTrue($five->times(3)->equals(new Dollar(15)));
  }
  function testDollarMultiplication()
  {
    $five = new Dollar(5);
    $this->assertTrue($five->times(2)->equals(new Dollar(10)));
    $this->assertTrue($five->times(3)->equals(new Dollar(15)));
  }
  function testEquality()
  {
    $this->assertTrue((new Dollar(5))->equals(new Dollar(5)));
    $this->assertFalse((new Dollar(5))->equals(new Dollar(6)));
    $this->assertTrue((new Franc(5))->equals(new Franc(5)));
    $this->assertFalse((new Franc(5))->equals(new Franc(6)));
    $this->assertFalse((new Franc(5))->equals(new Dollar(5)));
  }
}

