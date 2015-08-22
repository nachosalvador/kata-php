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
    $this->assertInternalType('string', $this->game->getPlayer(1), 'The player is a string name');
  }

  public function testEachPlayerCanHaveThePointsZeroFifteenThirtyForty() {
    $points = array(
      'zero' => 0,
      'fifteen' => 15, 
      'thirty' => 30,
      'fourty' => 40
    );

    foreach ($points as $point_name => $point) {
      foreach (array(1, 2) as $player_id) {
        $this->assertEquals($point, $this->game->getPlayerPoints($player_id), 'Player1 can have ' . $point_name . ' points');
        $this->game->playerWinPoint($player_id);
      }
    }
  }
}
