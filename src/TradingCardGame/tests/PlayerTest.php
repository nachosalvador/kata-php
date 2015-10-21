<?php

namespace TradingCardGame\Tests;

use TradingCardGame\Player;

class testPlayer extends \PHPUnit_Framework_TestCase {
  const START_HEATH = 30;
  const START_MANA = 0;

  public $player1;
  public $player2;

  public function setUp() {
    $this->player1 = new Player();
    $this->player2 = new Player();   
  }

  public function tearDown() {
    unset($this->player1);
    unset($this->player2);
  }

  public function testEachPlayerStartsAGameWithThirtyOfHealthAndZeroOfMana() {
    $this->assertEquals($this->player1->getHealth(), self::START_HEATH);
    $this->assertEquals($this->player2->getMana(), self::START_MANA);
  } 

  public function testEachPlayerStartsWithATwentyCardsDeck() {
    $value_mana_cards = array(0,0,1,1,2,2,2,3,3,3,3,4,4,4,5,5,6,6,7,8);

    $this->assertEquals($this->player1->getNumberOfCardsInDeck(), count($value_mana_cards));
    $this->assertEquals($this->player2->getNumberOfCardsInDeck(), count($value_mana_cards));
  }

  public function testEachPlayerHasInitialHandWithThreeCardsFromHisDeck() {
    $this->assertEquals(count($this->player1->getHand()), 3);
    $this->assertEquals($this->player1->getNumberOfCardsInDeck(), 17);

    $this->assertEquals(count($this->player2->getHand()), 3);
    $this->assertEquals($this->player2->getNumberOfCardsInDeck(), 17);
  }
}