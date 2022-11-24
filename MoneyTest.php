<?php

use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase {
  // No livro, este exercício foi implementado em Java. (este teste é composto pela comparação entre dois arrays com o mesmo valor,(o teste passa se caso (remover o "caso")as duas instâncias forem iguais)(este teste passa no php, mas falha no Java) no java um não é igual ao outro, coisa que não ocorre no php)onde teste tipo de teste que consiste na comparação entre dois arrays com o mesmo valor, esta falha não ocorre no php. Além disso, nos exercícios, (a falha que ocorre no Java é contornada)esta falha é contornada pela criação de uma nova classe. A criação deste novo objeto não aparenta ser necessária no (no php) cenário onde está se implementando em php. Pórem, para fins de imitar os passos do livro (mesmo utilizando uma linguagem diferente, irei criar um novo objeto de acordo com o livro.
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

