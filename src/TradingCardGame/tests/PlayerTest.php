<?php

namespace TradingCardGame\Tests;

use TradingCardGame\Player;

class testPlayer extends \PHPUnit_Framework_TestCase {
    public function testEachPlayerStartsAGameWithThirtyOfHealthAndZeroOfMana() {
        $player1 = new Player();
        $player2 = new Player();
        $this->assertEquals($player1->getHealth(), 30);
        $this->assertEquals($player2->getMana(), 0);
    } 
}