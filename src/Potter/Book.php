<?php

namespace Kata\Potter;

class Book {
  const PRICE = 8;

  private $serie;

  public function __construct($serie) {
    $this->serie = $serie;
  }

  public function getPrice() {
    return self::PRICE;
  }

}