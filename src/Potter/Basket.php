<?php

namespace Kata\Potter;

use Kata\Potter\Book;

class Basket {
  const DISCOUNTS = [1, 0.95, 0.90, 0.80, 0.75];

  private $books;

  public function __construct() {
  	$this->books = [];
  }

  public function buy(Book $book) {
    $this->books[] = $book;
  }

  public function getAmount() {
  	$amount = 0;

  	foreach ($this->books as $book) {
  	  $amount += $book->getPrice();
  	}

  	$amount = $amount * $this->getDiscount();

    return $amount; 
  }

  public function reset() {
  	$this->books = [];
  }

  private function getDiscount() {
  	return self::DISCOUNTS[count($this->books) - 1];
  }
}