<?php

namespace TennisGame;

class TennisGame {
  const POINTS = array(0, 15, 30, 40);
  const WINNING_SCORE = 4;

  private $player1;
  private $player2;
  private $player1_score;
  private $player2_score;

  public function __construct() {
    $this->player1 = 'Joe';
    $this->player2 = 'Bob';
    $this->player1_score = 0;
    $this->player2_score = 0;
  }

  public function getPlayer($player) {
    return $this->$player;
  }

  public function hasPlayers() {
    return (isset($this->player1) && isset($this->player2));
  }

  public function getPlayerScore($player) {
    $player_score = $player . '_score';
    return $this->$player_score;
  }

  public function getPlayerPoints($player) {
    $player_score = $player . '_score';
    return self::POINTS[$this->$player_score];
  }

  public function playerWinPoint($player) {
    $score = $this->getPlayerScore($player) + 1;
    $this->setPlayerScore($player, $score);
  }

  public function setPlayerScore($player, $score) {
    $player_score = $player . '_score';
    $this->$player_score = $score;
  }

  public function isPlayerWinGame($player) {
    $result = FALSE;
    if ($this->getPlayerScore($player) == self::WINNING_SCORE) {
      $result = TRUE;
    }

    return $result;
  }
}