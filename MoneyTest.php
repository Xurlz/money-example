<?php

use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase {
  function testSumTimes()
  {
    $fiveBucks = fn() : Expression => Money::dollar(5);
    $tenFrancs = fn() : Expression => Money::franc(10);

    $bank = new Bank;
    $bank->addRate("CHF","USD",2);

    $sum = fn() : Expression
      => (new Sum($fiveBucks(),$tenFrancs()))->times(2);

    $result = fn() : Money => $bank->reduce($sum(),"USD");
    $this->assertEquals(Money::dollar(20),$result());
  }
  function testSumPlusMoney()
  {
    $fiveBucks = fn() : Expression => Money::dollar(5);
    $tenFrancs = fn() : Expression => Money::franc(10);
    $bank = new Bank;
    $bank->addRate("CHF", "USD", 2);

    $sum = fn() : Expression
      => (new Sum($fiveBucks(), $tenFrancs()))
        ->plus($fiveBucks());

    $result = fn() : Money => $bank->reduce($sum(),"USD");
    $this->assertEquals(Money::dollar(15),$result());
  }
  function testMixedAddition()
  {
    $fiveBucks = fn() : Expression => Money::dollar(5);
    $tenFrancs = fn() : Expression => Money::franc(10);
    $bank = new Bank();
    $bank->addRate("CHF","USD",2);
    $result = $bank->reduce(
      $fiveBucks()->plus($tenFrancs()),
      "USD"
    );
    $this->assertEquals(Money::dollar(10),$result);
  }
  function testIdentityRate()
  {
    $bank = new Bank;
    $bank->addRate("USD","USD",3); // Para "sabotar" a regra de negócio
    $this->assertEquals(1,$bank->rate("USD","USD"));
  }
  /*
   * No livro, este exercício foi implementado em Java. O teste
   * abaixo é composto pela comparação entre dois arrays com o
   * mesmo valor. Este teste passa no php, mas falha no Java.
   * Nos exercícios, esta falha é contornada com uma série de
   * implementações. Este contorno não aparenta ser necessário
   * no php. Esta parte do exercício irá ser pulada.
   */
  function testArrayEquals()
  {
    $this->assertEquals(['abc'],['abc']);
  }
  function testReduceMoneyDifferentCurrency()
  {
    $bank = new Bank;
    $bank->addRate("CHF","USD",2);

    $result = fn() : Money
      => $bank->reduce(Money::franc(2),"USD");

    $this->assertEquals(Money::dollar(1), $result());
  }
  function testReduceMoney()
  {
    $bank = new Bank;
    $result = fn() : Money =>
      $bank->reduce( Money::dollar(1), "USD");

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
    $this->assertEquals("CHF",Money::franc(1)->currency());
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

