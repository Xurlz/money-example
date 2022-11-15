<?php

use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase {
  function testFrancMultiplication()
  {
    $five = new Franc(5);
    $this->assertTrue($five->times(2)->equals(new Franc(10)));
    $this->assertTrue($five->times(3)->equals(new Franc(15)));
  }
  function testDollarMultiplication()
  {
    $five = Money::dollar(5);
    $this->assertEquals(Money::dollar(10),$five->times(2));
    $this->assertEquals(Money::dollar(15),$five->times(3));
  }
  function testEquality()
  {
    $this->assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
    $this->assertFalse(Money::dollar(5)->equals(Money::dollar(6)));
    $this->assertTrue((new Franc(5))->equals(new Franc(5)));
    $this->assertFalse((new Franc(5))->equals(new Franc(6)));
    $this->assertFalse((new Franc(5))->equals(Money::dollar(5)));
  }
}

