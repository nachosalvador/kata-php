<?php

namespace Kata\Tests\Potter;

use Kata\Potter\Book;
use Kata\Potter\Basket;

class testCell extends \PHPUnit_Framework_TestCase {

  const MIN_BOOK_ID = 1;
  const MAX_BOOK_ID = 5;

  public $order;

  public function setUp() {
    $this->order = new Basket();
  }

  public function testOneCopyOfAnyBookCostsEight() {
    for ($i = self::MIN_BOOK_ID; $i <= self::MAX_BOOK_ID; $i++) {
      $this->order->reset();
      $this->order->add(new Book($i));
      $this->assertEquals($this->order->getAmount(), Book::PRICE, 'One copy of book ' . $i . ' of the five books costs 8 EUR.');
    }
  }

  public function testSimpleDiscounts() {
    for ($i = 2; $i <= 5; $i++) {
      $this->order->reset();

      for ($j = 1; $j <= $i; $j++) {
        $this->order->add(new Book(1));
      }
      $this->assertEquals(
        $this->order->getAmount(),
        Book::PRICE * $i * Basket::DISCOUNTS[$i],
        'One copy of ' . $i . ' different books costs ' . Book::PRICE . ' * ' . $i . ' * ' . Basket::DISCOUNTS[$i] . ' EUR.'
      );
    }
  }
}
