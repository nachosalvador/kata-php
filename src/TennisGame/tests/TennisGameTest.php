<?php

namespace TennisGame\Tests;

use TennisGame\TennisGame;

class testTennisGame extends \PHPUnit_Framework_TestCase {
  public $game;

  const POINTS = array(
    'love' => 0,
    'fifteen' => 15, 
    'thirty' => 30,
    'fourty' => 40
  );

  const SCORE = array(
    'love' => 0,
    'fifteen' => 1, 
    'thirty' => 2,
    'fourty' => 3
  );

  public function setUp() {
    $this->game = new TennisGame();   
  }

  public function tearDown() {
    unset($this->game);
  }

  public function setPlayersSameScore($score) {
    $this->game->setPlayerScore('player1', $score);
    $this->game->setPlayerScore('player2', $score);
  } 

  public function testGameIsWonByFirstPlayerToHaveAtLeastFourPointsInTotalAndAtLeastTwoPointMoreTThanOpponent() {
    $this->game->setPlayerScore('player1', 4);
    $this->game->setPlayerScore('player2', 2);
    $this->assertTrue($this->game->isPlayerWinGame('player1'), 'The player1 wins the game');

    $this->game->setPlayerScore('player1', 4);
    $this->game->setPlayerScore('player2', 3);
    $this->assertFalse($this->game->isPlayerWinGame('player1'), 'The player1 does not win the game');
  }

  public function testEachScoreGameHasDescribedAsLoveFifteenThirtyForty() {
    foreach (self::SCORE as $key => $value) {
      $this->assertTrue(array_key_exists($key, TennisGame::SCORE), ucfirst($key) . 'is a game score');
    }

    $fake_scores = array('one', 'three', 'six', 'ten', 'sixteen',  'thirtytwo', 'fourtyone');
    foreach ($fake_scores as $fake_score) {
      $this->assertFalse(array_key_exists($fake_score, TennisGame::SCORE), ucfirst($fake_score) . 'is not a game score');
    }
  }

  public function testEachPlayerHasThreeOrMorePointsAndPlayersScoreAreEqualsSoGameScoreIsDeuce() {
    $this->setPlayersSameScore(6);
    $this->assertTrue($this->game->arePlayersDeuce(), 'Both players are deuce');

    $this->setPlayersSameScore(2);
    $this->assertFalse($this->game->arePlayersDeuce(), 'Both players are not deuce');
  }

  public function testEachPlayerHasAtLeastThreePointsAndAPlayerHasOnMorePointThanOpponentGameScoreIsAdvantageForPlayerInTheLead() {
    $this->setPlayersSameScore(3);
    $this->game->playerWinPoint('player1');
    $this->assertTrue($this->game->hasPlayerAdvantageAndGameBall('player1'), 'Player1 has got advantage');

    $this->setPlayersSameScore(3);
    $this->assertFalse($this->game->hasPlayerAdvantageAndGameBall('player1'), 'Player1 has not got advantage');
  }
}
