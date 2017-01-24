<?php

namespace Kata\Tests\FizzBuzz;

use Kata\FizzBuzz\Game;

class GameTest extends \PHPUnit_Framework_TestCase
{
    public $game;

    public function setUp()
    {
        $this->game = new Game();
    }
    
    public function testNumberDivisibleByThreeSaysFizz()
    {
        $numbers = [3, 33, 66, 99];
        
        foreach ($numbers as $number) {
            $this->assertEquals($this->game->say($number), 'Fizz');
        }
    }

    public function testNumberDivisibleByFiveSaysBuzz()
    {
        $numbers = [5, 10, 50, 95];
        
        foreach ($numbers as $number) {
            $this->assertEquals($this->game->say($number), 'Buzz');
        }
    }

    public function testNumberDivisibleByThreeAndFiveSaysFizzbuzz()
    {
        $numbers = [15, 30, 45, 90];
        
        foreach ($numbers as $number) {
            $this->assertEquals($this->game->say($number), 'FizzBuzz');
        }
    }

    public function testNumberNotDivisibleByThreeOrFiveSaysTheNumber()
    {
        $numbers = [1, 7, 13, 71];
        
        foreach ($numbers as $number) {
            $this->assertEquals($this->game->say($number), $number);
        }
    }
}