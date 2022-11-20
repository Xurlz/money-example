<?php

use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase {
  function testCurrency()
  {
    $this->assertEquals("USD",Money::dollar(1)->currency());
    $this->assertEquals("CHR",Money::franc(1)->currency());
  }
  function testFrancMultiplication()
  {
    $five = Money::franc(5);
    $this->assertEquals(Money::franc(10),$five->times(2));
    $this->assertEquals(Money::franc(15),$five->times(3));
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
    $this->assertFalse(Money::franc(5)->equals(Money::franc(6)));
  }
}

