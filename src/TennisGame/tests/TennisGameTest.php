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

  public function testEachPlayerCanHaveThePointsZeroFifteenThirtyForty() {
    foreach (self::POINTS as $point_name => $point) {
      foreach (array('player1', 'player2') as $player) {
        $this->assertEquals($point, $this->game->getPlayerPoints($player), ucfirst($player) . ' can have ' . $point_name . ' points');
        $this->game->playerWinPoint($player);
      }
    }

    $fake_points = array(
      'one' => 1,
      'three' => 3,
      'six' => 6,
      'ten' => 10,
      'sixteen' => 16, 
      'thirtytwo' => 32,
      'fourtyone' => 41
    );
    foreach ($fake_points as $point_name => $point) {
      foreach (array('player1', 'player2') as $player) {
        $this->assertNotEquals($point, $this->game->getPlayerPoints($player), ucfirst($player) . ' can not have ' . $point_name . ' points');
        $this->game->playerWinPoint($player);
      }
    }
  }

  public function testPlayerWithFortyPointsAndWinsAPointWinsTheGame() {
    $this->game->setPlayerScore('player1', self::SCORE['fourty']);
    $this->game->playerWinPoint('player1');
    $this->assertTrue($this->game->isPlayerWinGame('player1'), 'The player1 wins the game');

    $this->game->setPlayerScore('player1', self::SCORE['fifteen']);
    $this->game->playerWinPoint('player1');
    $this->assertFalse($this->game->isPlayerWinGame('player1'), 'The player1 does not win the game');
  }

  public function testBothPlayersHaveFortyPointsAreDeuce() {
    $this->setPlayersSameScore(self::SCORE['fourty']);
    $this->assertTrue($this->game->arePlayersDeuce(), 'Both players are deuce');
    
    $this->setPlayersSameScore(self::SCORE['thirty']);
    $this->assertFalse($this->game->arePlayersDeuce(), 'Both players are not deuce');
  }

  public function testBothPlayersAreDeuceTheWinnerOfABallHaveAdvantageAndGameBall() {
    $this->setPlayersSameScore(self::SCORE['fourty']);
    $this->game->playerWinPoint('player1');
    $this->assertTrue($this->game->hasPlayerAdvantageAndGameBall('player1'), 'Player1 has got advantage');

    $this->setPlayersSameScore(self::SCORE['fourty']);
    $this->game->playerWinPoint('player2');
    $this->assertFalse($this->game->hasPlayerAdvantageAndGameBall('player1'), 'Player1 has not got advantage');
  }

  public function testPlayersWithAdvantageWinsAPointWinsTheGame() {
    $this->setPlayersSameScore(self::SCORE['fourty']);
    $this->game->playerWinPoint('player1');
    $this->game->playerWinPoint('player1');
    $this->assertTrue($this->game->isPlayerWinGame('player1'), 'The player1 wins the game');

    $this->setPlayersSameScore(self::SCORE['fourty']);
    $this->game->playerWinPoint('player1');
    $this->game->playerWinPoint('player2');
    $this->assertFalse($this->game->isPlayerWinGame('player1'), 'The player1 does not win the game');
  }

  public function testPlayerWithoutAdvantageWinsPointBothPlayersAreDeuce() {
    $this->setPlayersSameScore(self::SCORE['fourty']);
    $this->game->playerWinPoint('player1');
    $this->game->playerWinPoint('player2');
    $this->assertTrue($this->game->arePlayersDeuce(), 'Both players are deuce');  
  }

  public function testGameIsWonByFirstPlayerToHaveAtLeastFourPointsInTotalAndAtLeastTwoPointMoreTThanOpponent() {
    for ($i = 1; $i <= 4; $i++) {
      $this->game->playerWinPoint('player1');
    }
    $this->assertTrue($this->game->isPlayerWinGame('player1'), 'The player1 wins the game');

    for ($i = 1; $i <= 3; $i++) {
      $this->game->playerWinPoint('player2');
    }
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
    for ($i = 1; $i <= 8; $i++) {
      $this->game->playerWinPoint('player1');
      $this->game->playerWinPoint('player2');
    }
    $this->assertTrue($this->game->arePlayersDeuce(), 'Both players are deuce');

    $this->setPlayersSameScore(0);
    for ($i = 1; $i <= 2; $i++) {
      $this->game->playerWinPoint('player1');
      $this->game->playerWinPoint('player2');
    }
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
