<?php

namespace TennisGame\Tests;

use TennisGame\TennisGame;

class testTennisGame extends \PHPUnit_Framework_TestCase {
  public $game;

  const POINTS = array(
    'zero' => 0,
    'fifteen' => 15, 
    'thirty' => 30,
    'fourty' => 40
  );

  const SCORE = array(
    'zero' => 0,
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

  public function testHasPlayers() {
    $this->assertTrue($this->game->hasPlayers(), 'The game has players');
    $this->assertInternalType('string', $this->game->getPlayer('player1'), 'The player is a string name');
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
    $this->game->setPlayerScore('player1', self::SCORE['fourty']);
    $this->game->setPlayerScore('player2', self::SCORE['fourty']);
    $this->assertTrue($this->game->areBothPlayersDeuce(), 'Both players are deuce');
    
    $this->game->setPlayerScore('player1', self::SCORE['thirty']);
    $this->game->setPlayerScore('player2', self::SCORE['thirty']);
    $this->assertFalse($this->game->areBothPlayersDeuce(), 'Both players are not deuce');
  }

  public function testBothPlayersAreDeuceTheWinnerOfABallHaveAdvantageAndGameBall() {
    $this->game->setPlayerScore('player1', self::SCORE['fourty']);
    $this->game->setPlayerScore('player2', self::SCORE['fourty']);
    $this->game->playerWinPoint('player1');
    $this->assertTrue($this->game->hasPlayerAdvantageAndGameBall('player1'), 'Player1 has got advantage');

    $this->game->setPlayerScore('player1', self::SCORE['fourty']);
    $this->game->setPlayerScore('player2', self::SCORE['fourty']);
    $this->game->playerWinPoint('player2');
    $this->assertFalse($this->game->hasPlayerAdvantageAndGameBall('player1'), 'Player1 has not got advantage');
  }

  public function testPlayersWithAdvantageWinsAPointWinsTheGame() {
    $this->game->setPlayerScore('player1', self::SCORE['fourty']);
    $this->game->setPlayerScore('player2', self::SCORE['fourty']);
    $this->game->playerWinPoint('player1');
    $this->assertTrue($this->game->hasPlayerAdvantageAndGameBall('player1'), 'Player1 has got advantage');
    $this->game->playerWinPoint('player1');
    $this->assertTrue($this->game->isPlayerWinGame('player1'), 'The player1 wins the game');

    $this->game->setPlayerScore('player1', self::SCORE['fourty']);
    $this->game->setPlayerScore('player2', self::SCORE['fourty']);
    $this->game->playerWinPoint('player1');
    $this->assertTrue($this->game->hasPlayerAdvantageAndGameBall('player1'), 'Player1 has got advantage');
    $this->game->playerWinPoint('player2');
    $this->assertFalse($this->game->isPlayerWinGame('player1'), 'The player1 does not win the game');
  }
}
