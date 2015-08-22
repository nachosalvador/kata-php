<?php

namespace TennisGame;

class TennisGame {
  const POINTS = array(0, 15, 30, 40);

  private $player1;
  private $player2;
  private $player1_score;
  private $player2_score;

  public function __construct($player1, $player2) {
    $this->player1 = $player1;
    $this->player2 = $player2;
    $this->player1_score = 0;
    $this->player2_score = 0;
  }

  public function getPlayer($player_id) {
    $player = 'player' . $player_id;
    return $this->$player;
  }

  public function hasPlayers() {
    return (isset($this->player1) && isset($this->player2));
  }

  public function getPlayerScore($player_id) {
    $player_score = 'player' . $player_id . '_score';
    return $this->$player_score;
  }

  public function getPlayerPoints($player_id) {
    $player_score = 'player' . $player_id . '_score';
    return self::POINTS[$this->$player_score];
  }

  public function playerWinPoint($player_id) {
    $score = $this->getPlayerScore($player_id) + 1;
    $this->setPlayerScore($player_id, $score);
  }

  private function setPlayerScore($player_id, $score) {
    $player_score = 'player' . $player_id . '_score';
    $this->$player_score = $score;
  }
}