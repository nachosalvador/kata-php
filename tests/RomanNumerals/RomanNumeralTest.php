<?php

namespace Kata\Tests\RomanNumeral;

use Kata\RomanNumerals\RomanNumeral;
use PHPUnit\Framework\TestCase;

class testRomanNumeral extends TestCase {

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNegativeNumberThrowsAnException()
    {
        $romanNumeral = new RomanNumeral(-1);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNumberZeroThrowsAnException()
    {
        $romanNumeral = new RomanNumeral(0);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNumberOverThreeThousandThrowsAnException()
    {
        $romanNumeral = new RomanNumeral(3001);
    }

    public function testConversion() {
        foreach ($this->getTestData() as $expected => $number) {
            $romanNumeral = new RomanNumeral($number);

            $this->assertEquals(
                $expected,
                $romanNumeral->getValue(),
                'The number ' . $number . ' is ' . $expected . ' in roman numerals.'
            );
        }
    }

    private function getTestData()
    {
        return array(
            'I'         => 1,
            'II'        => 2,
            'III'       => 3,
            'IV'        => 4,
            'V'         => 5,
            'IX'        => 9,
            'X'         => 10,
            'XIV'       => 14,
            'XLIX'      => 49,
            'LXXVIII'   => 78,
            'XCIX'      => 99,
            'CDLXXVII'  => 477,
            'MXXIV'     => 1024,
            'MMCCXXXIX' => 2239
        );
    }
}
