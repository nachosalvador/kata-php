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

  public function getPlayer1() {
    return $this->player1;
  }

  public function getPlayer2() {
    return $this->player2;
  }

  public function hasPlayers() {
    return (isset($this->player1) && isset($this->player2));
  }

  public function getPlayer1Score() {
    return $this->player1_score;
  }

  public function getPlayer2Score() {
    return $this->player2_score;
  }

  public function getPlayer1Points() {
    return self::POINTS[$this->player1_score];
  }

  public function getPlayer2Points() {
    return self::POINTS[$this->player2_score];
  }

  public function player1WinPoint() {
    $score = $this->getPlayer1Score() + 1;
    $this->setPlayer1Score($score);
  }

  public function player2WinPoint() {
    $score = $this->getPlayer2Score() + 1;
    $this->setPlayer2Score($score);
  }

  private function setPlayer1Score($score) {
    $this->player1_score = $score;
  }

  private function setPlayer2Score($score) {
    $this->player2_score = $score;  
  }
}