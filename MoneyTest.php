<?php

use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase {
  // No livro, este teste, na verdade, os testes (o exercício) foi implementado em java, onde teste tipo de teste eque considte na comparação netre dois arrays com o mesmo valor , este teste, falha , isso não ocorre no php. Além disso, no nos exercícios , apoś essa falaha descrita eantes,, é (está falha) é contoranada pela criação de um novo objeto. A criação deste novo objeto aparenta sere necessário no cenário nonde está se implementando em php . pórem, ára fins de imitar os passos do livro (mesmo utilizando uma linugagem diferente , item criar um novo objeto de acordo com o livro.
  function testArrayEquals()
  {
    $this->assertEquals(['abc'],['abc']);
  }
  function testReduceMoneyDifferentCurrency()
  {
    $bank = new Bank;
    $bank->addRate("CHF","USD",2);
    $result = fn() : Money => $bank->reduce(Money::franc(2),"USD");
    $this->assertEquals(Money::dollar(1), $result());
  }
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

