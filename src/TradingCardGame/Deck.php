<?php

namespace TradingCardGame;

class Deck {
  private $cards_as_mana_values;

  public function __construct() {
    $this->cards_as_mana_values = array(0,0,1,1,2,2,2,3,3,3,3,4,4,4,5,5,6,6,7,8);
  }

  public function getCards() {
    return $this->cards_as_mana_values;
  }

  public function getNumberOfCards() {
    return count($this->cards_as_mana_values);
  }

  public function extractCard($key) {
    unset($this->cards_as_mana_values[$key]);
  }
}