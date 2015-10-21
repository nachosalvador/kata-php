<?php

namespace TradingCardGame;

use TradingCardGame\Deck;

class Player {
  private $health;
  private $mana;
  private $deck;

  public function __construct() {
    $this->health = 30;
    $this->mana = 0;
    $this->deck = new Deck();
  }

  public function getHealth() {
    return $this->health;
  }

  public function getMana() {
    return $this->mana;
  }

  public function getNumberOfCardsInDeck() {
    return count($this->deck->getCards());
  }
}