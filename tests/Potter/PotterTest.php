<?php

namespace Kata\Tests\Potter;

use Kata\Potter\Book;
use Kata\Potter\Order;

class testCell extends \PHPUnit_Framework_TestCase {

  public function testOneCopyOfAnyBookCostsEight() {
    $order = new Order();

    $order->buy(new Book(rand(1, 5)));
    $this->assertEquals($order->getAmount(), 8, 'One copy of any of the five books costs 8 EUR.');
  }

  public function testSimpleDiscounts() {
    $order = new Order();

    $order->buy(new Book(1));
    $order->buy(new Book(2));	
    $this->assertEquals($order->getAmount(), 8 * 2 * 0.95, 'One copy of two different books costs 8 * 2 * 0.95 EUR.');

    $order->reset();
    $order->buy(new Book(1));
    $order->buy(new Book(2));
    $order->buy(new Book(3));
    $this->assertEquals($order->getAmount(), 8 * 3 * 0.90, 'One copy of three different books costs 8 * 3 * 0.90 EUR.');

    $order->reset();
    $order->buy(new Book(1));
    $order->buy(new Book(2));
    $order->buy(new Book(3));
    $order->buy(new Book(4));
    $this->assertEquals($order->getAmount(), 8 * 4 * 0.80, 'One copy of four different books costs 8 * 4 * 0.80 EUR.');

    $order->reset();
    $order->buy(new Book(1));
    $order->buy(new Book(2));
    $order->buy(new Book(3));
    $order->buy(new Book(4));
    $order->buy(new Book(5));
    $this->assertEquals($order->getAmount(), 8 * 5 * 0.75, 'One copy of five different books costs 8 * 5 * 0.75 EUR.');
  }
}
