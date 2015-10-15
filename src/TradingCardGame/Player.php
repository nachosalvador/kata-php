<?php

namespace TradingCardGame;

class Player {
  private $health;
  private $mana;
  private $deck_with_mana_values = array(0,0,1,1,2,2,2,3,3,3,3,4,4,4,5,5,6,6,7,8);

  public function __construct() {
    $this->health = 30;
    $this->mana = 0;
  }

  public function getHealth() {
    return $this->health;
  }

  public function getMana() {
    return $this->mana;
  }

  public function getNumberOfCardsInDeck() {
    return count($this->deck_with_mana_values);
  }
}