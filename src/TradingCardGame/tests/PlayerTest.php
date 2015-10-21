<?php

namespace TradingCardGame\Tests;

use TradingCardGame\Player;

class testPlayer extends \PHPUnit_Framework_TestCase {
  const INIT_HEATH = 30;
  const INIT_MANA = 0;
  const INIT_HAND_NUMBER_CARDS = 3;
  const INIT_NUMBER_CARDS = 20;

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

  public function testEachPlayerINITsAGameWithThirtyOfHealthAndZeroOfMana() {
    $this->assertEquals($this->player1->getHealth(), self::INIT_HEATH);
    $this->assertEquals($this->player2->getMana(), self::INIT_MANA);
  } 

  public function testEachPlayerINITsWithATwentyCardsDeck() {
    $value_mana_cards = array(0,0,1,1,2,2,2,3,3,3,3,4,4,4,5,5,6,6,7,8);

    $this->assertEquals($this->player1->getNumberOfCardsInDeck(), count($value_mana_cards));
    $this->assertEquals($this->player2->getNumberOfCardsInDeck(), count($value_mana_cards));
  }

  public function testEachPlayerHasInitialHandWithThreeCardsFromHisDeck() {
    $this->assertEquals(count($this->player1->getHand()), self::INIT_HAND_NUMBER_CARDS);
    $this->assertEquals($this->player1->getNumberOfCardsInDeck(), self::INIT_NUMBER_CARDS - self::INIT_HAND_NUMBER_CARDS);

    $this->assertEquals(count($this->player2->getHand()), self::INIT_HAND_NUMBER_CARDS);
    $this->assertEquals($this->player2->getNumberOfCardsInDeck(), self::INIT_NUMBER_CARDS - self::INIT_HAND_NUMBER_CARDS);
  }
}