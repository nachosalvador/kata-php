<?php

namespace TennisGame\Tests;

use TennisGame\TennisGame;

class testTennisGame extends \PHPUnit_Framework_TestCase {
  public $game;

  public function setUp() {
    $this->game = new TennisGame('player1', 'player2');
  }

  public function tearDown() {
    unset($this->game);
  }

  public function testHasPlayers() {
    $this->assertTrue($this->game->hasPlayers(), 'The game has players');
    $this->assertInternalType('string', $this->game->getPlayer1(), 'The player is a string name');
  }

  public function testEachPlayerCanHaveThePointsZeroFifteenThirtyForty() {
    $points = array(
      'zero' => 0,
      'fifteen' => 15, 
      'thirty' => 30,
      'fourty' => 40
    );

    foreach ($points as $point_name => $point) {
      $this->assertEquals($point, $this->game->getPlayer1Points(), 'Player1 can have ' . $point_name . ' points');
      $this->game->player1WinPoint();
      $this->assertEquals($point, $this->game->getPlayer2Points(), 'Player2 can have ' . $point_name . ' points');
      $this->game->player2WinPoint();
    }
  }
}
