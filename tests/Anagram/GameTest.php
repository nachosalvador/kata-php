<?php

namespace Kata\Tests\Anagram;

use Kata\Anagram\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testOneCharacter()
    {
        $game = new Game('A', 'B');

        $this->assertFalse(
            $game->isAnagram(),
            '"A" and "B" are not anagrams.'
        );

        $game->setString2('a');

        $this->assertTrue(
            $game->isAnagram(),
            '"A" and "A" are anagrams.'
        );
    }

    public function testMoreThanOneCharacter()
    {
        $game = new Game('ABC', 'DFG');

        $this->assertFalse(
            $game->isAnagram(),
            '"ABC" and "DFG" are not anagrams.'
        );

        $game->setString2('Cba');

        $this->assertTrue(
            $game->isAnagram(),
            '"ABC" and "Cba" are anagrams.'
        );
    }

    public function testMoreThanOneWord()
    {
        $game = new Game('Mother In Law', 'Hitler Woman');

        $this->assertTrue(
            $game->isAnagram(),
            '"Mother In Law" and "Hitler Woman" are anagrams.'
        );

        $game->setString1('Debit Card');
        $game->setString2('Bad Credit');

        $this->assertTrue(
            $game->isAnagram(),
            '"Debit Card" and "Bad Credit" are anagrams.'
        );
    }
}