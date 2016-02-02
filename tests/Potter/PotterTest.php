<?php

namespace Kata\Tests\Potter;

use Kata\Potter\Book;
use Kata\Potter\Order;

class testCell extends \PHPUnit_Framework_TestCase {

  public $order;

  public function setUp() {
    $this->order = new Order();   
  }

  public function testOneCopyOfAnyPotterBookCostsEight() {
    $this->order->buyBook(new Book(rand(1, 5)));
    $this->assertEquals($this->order->getAmount(), 8, 'One copy of any of the five books costs 8 EUR.');
  }
}
