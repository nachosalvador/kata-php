<?php

namespace TennisGame\Tests;

use TennisGame\TennisGame;

class testTennisGame extends \PHPUnit_Framework_TestCase {
	public function testTennisGameIsATennisGame() {
		$this->assertInstanceOf('TennisGame\TennisGame', new TennisGame);
	}
}