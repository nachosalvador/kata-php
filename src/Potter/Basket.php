<?php

namespace Kata\Potter;

use Kata\Potter\Book;

class Basket {
  const DISCOUNTS = [0 => 0, 1 => 1, 2 => 0.95, 3 => 0.90, 4 => 0.80, 5 => 0.75];

  private $books;

  public function __construct() {
    $this->books = [];
  }

  public function add(Book $book) {
    $this->books[] = $book;
  }

  public function getAmount() {
    $books = $this->getSerieAndQuantityOfBooks();
    $amount = sizeof($books) * Book::PRICE * $this->getDiscount($books);


    foreach ($books as $serie => $book) {
      $book--;

      if ($book == 0) {
        unset($books[$serie]);
      }
    }

    $amount += sizeof($books) * Book::PRICE * $this->getDiscount($books);

    return $amount; 
  }

  public function reset() {
    $this->books = [];
  }

  private function getDiscount($books) {
    return self::DISCOUNTS[count($books)];
  }

  private function getSerieAndQuantityOfBooks() {
    $result = []; 

    foreach ($this->books as $book) {
      $result[] = $book->serie;
    }

    return array_count_values($result);
  }
}