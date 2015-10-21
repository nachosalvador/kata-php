<?php

namespace TradingCardGame\Tests;

use TradingCardGame\Deck;

class testDeck extends \PHPUnit_Framework_TestCase {

  public function testDeckTwentyCards() {
    $deck = new Deck();
    $this->assertEquals($deck->getNumberOfCards(), 20);
  }

}