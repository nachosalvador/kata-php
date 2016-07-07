<?php

namespace Kata\Potter;

class Book {
  const PRICE = 8;

  public $serie;

  public function __construct($serie) {
    $this->serie = $serie;
  }
}