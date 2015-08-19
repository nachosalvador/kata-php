<?php

namespace TennisGame\Tests;

use TennisGame\TennisGame;

class testTennisGame extends \PHPUnit_Framework_TestCase {
	public function testHasPlayers() {
		$game = new TennisGame("player1", "player2");
		$this->assertTrue($game->hasPlayers(), "The game has players");
		$this->assertInternalType("string", $game->getPlayer1(), "The player is a string name");
	}
}