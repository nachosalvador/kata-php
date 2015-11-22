<?php

namespace Kata\TradingCardGame;

class Player {
  private $health;
  private $mana;
  private $deck;
  private $hand;

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
    return $this->deck->getNumberOfCards();
  }

  public function getHand() {
    if (!$this->hand) {
      $this->hand = $this->getInitialHand();
    } 
    return $this->hand;
  }

  private function getInitialHand() {
    $initial_hand_keys = array_rand($this->deck->getCards(), 3);
    $initial_hand = array();
    $deck = $this->deck->getCards();

    foreach ($initial_hand_keys as $key) {
      array_push($initial_hand, $deck[$key]);
      $this->deck->extractCard($key);
    }

    return $initial_hand;
  }

}