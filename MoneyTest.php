<?php

use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase {
  function testReduceMoney()
  {
    $bank = new Bank;
    $result = fn() : Money => $bank->reduce( Money::dollar(1), "USD");
    $this->assertEquals(Money::dollar(1), $result());
  }
  function testReduceSum()
  {
    $sum = fn() : Expression => new Sum(Money::dollar(3),Money::dollar(4));
    $bank = new Bank;
    $result = fn() : Money => $bank->reduce($sum(),"USD");
    $this->assertEquals(Money::dollar(7),$result());
  }
  function testPlusReturnsSum()
  {
    $five = Money::dollar(5);
    $result = fn() : Expression => $five->plus($five);
    $sum = fn () : Sum => $result();
    $this->assertEquals($five, $sum()->augend);
    $this->assertEquals($five, $sum()->addend);
    
  }
  function testSimpleAddition()
  {
    $bank = new Bank;
    $five = Money::dollar(5);
    $sum = fn() : Expression => $five->plus($five);
    $reduced = $bank->reduce($sum(),"USD");
    $this->assertEquals(Money::dollar(10),$reduced);
  }
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

