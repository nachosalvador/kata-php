<?php

namespace Kata\Tests\Potter;

use Kata\Potter\Book;
use Kata\Potter\Basket;

class testCell extends \PHPUnit_Framework_TestCase {

  const MIN_BOOK_ID = 1;
  const MAX_BOOK_ID = 5;

  public $basket;

  public function setUp() {
    $this->basket = new Basket();
    $this->basket->reset();
  }

  public function testOneCopyOfAnyBookCostsEight() {
    for ($i = self::MIN_BOOK_ID; $i <= self::MAX_BOOK_ID; $i++) {
      $this->basket->reset();
      $this->basket->add(new Book($i));
      $this->assertEquals(
        $this->basket->getAmount(),
        8,
        'One copy of book ' . $i . ' of the five books costs 8 EUR.'
      );
    }
  }

  public function testSimpleDiscounts() {
    $this->basket->add(new Book(1));
    $this->basket->add(new Book(2));
    $this->assertEquals(
      $this->basket->getAmount(),
      8 * 2 * 0.95,
      'One copy of 2 different books costs 8 * 2 * 0.95 EUR.'
    );

    $this->basket->add(new Book(3));
    $this->assertEquals(
      $this->basket->getAmount(),
      8 * 3 * 0.9,
      'One copy of 3 different books costs 8 * 3 * 0.9 EUR.'
    );
    $this->basket->add(new Book(4));
    $this->assertEquals(
      $this->basket->getAmount(),
      8 * 4 * 0.8,
      'One copy of 4 different books costs 8 * 4 * 0.8 EUR.'
    );

    $this->basket->add(new Book(5));
    $this->assertEquals(
      $this->basket->getAmount(),
      8 * 5 * 0.75,
      'One copy of 5 different books costs 8 * 5 * 0.75 EUR.'
    );
  }

  public function testSeveralDiscounts() {
    $this->addBookSeriesToBasket([1, 1, 2]);
    $this->assertEquals($this->basket->getAmount(), 8 + (8 * 2 * 0.95));

    $this->basket->reset();
    $this->addBookSeriesToBasket([1, 1, 2, 2]);
    $this->assertEquals($this->basket->getAmount(), 2 * (8 * 2 * 0.95));

    $this->basket->reset();
    $this->addBookSeriesToBasket([1, 2, 2, 3, 3, 4]);
    $this->assertEquals($this->basket->getAmount(), (8 * 4 * 0.8) + (8 * 2 * 0.95));

    $this->basket->reset();
    $this->addBookSeriesToBasket([1, 2, 2, 3, 4, 5]);
    $this->assertEquals($this->basket->getAmount(), 8 + (8 * 5 * 0.75));
  }

  private function addBookSeriesToBasket($book_series) {
    foreach ($book_series as $book_serie) {
      $this->basket->add(new Book($book_serie));
    }
  }
}
