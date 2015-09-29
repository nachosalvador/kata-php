<?php

namespace TennisGame;

class TennisGame {
  const SCORE = array(
    'love' => 0,
    'fifteen' => 1, 
    'thirty' => 2,
    'fourty' => 3
  );

  const ADVANTAGE = 1;
  const WIN = 2;

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

  public function getPlayerScore($player) {
    $player_score = $player . '_score';
    return $this->$player_score;
  }

  private function getPlayersScoreDifference() {
    return ($this->getPlayerScore("player1") - $this->getPlayerScore("player2"));
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
    return (($this->getPlayersScoreDifference() >= self::WIN) 
      && $this->getPlayerScore($player) >= 4);
  }

  public function arePlayersDeuce() {
    return (($this->getPlayerScore('player1') - $this->getPlayerScore('player2')) == 0 
      && $this->getPlayerScore('player1') >= self::SCORE['fourty'] 
      && $this->getPlayerScore('player2') >= self::SCORE['fourty']);
  }

  public function hasPlayerAdvantageAndGameBall($player) {   
    return ($this->getPlayersScoreDifference() == self::ADVANTAGE);
  }
}