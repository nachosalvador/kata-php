<?php

namespace Kata\Potter;

use Kata\Potter\Book;

class Order {
  private $book;

	public function __construct() {
  }

  public function buyBook(Book $book) {
    $this->book = $book;
  }

  public function getAmount() {
    return $this->book->getPrice(); 
  } 
}