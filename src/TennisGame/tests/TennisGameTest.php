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
        $this->assertEquals($point, $this->game->getPlayerPoints($player), 'Player1 can have ' . $point_name . ' points');
        $this->game->playerWinPoint($player);
      }
    }
  }

  public function testPlayerWithFortyPointsAndWinsAPointWinsTheGame() {
    $this->game->setPlayerScore('player1', self::SCORE['fourty']);
    $this->game->playerWinPoint('player1');
    $this->assertTrue($this->game->isPlayerWinGame('player1'), 'The player "player1" wins the game');
  }

  public function testBothPlayersHaveFortyPointsAreDeuce() {
    $this->game->setPlayerScore('player1', self::SCORE['fourty']);
    $this->game->setPlayerScore('player2', self::SCORE['fourty']);
    $this->assertTrue($this->game->arePlayersDeuce(), 'Both players are deuce');
  }
}
