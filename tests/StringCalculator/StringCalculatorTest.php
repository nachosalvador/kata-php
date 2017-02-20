<?php

namespace Kata\Tests\StringCalculator;

use PHPUnit\Framework\TestCase;
use Kata\StringCalculator\StringCalculator;

class StringCalculatorTest extends TestCase
{
    private $stringCalculator;

    public function setUp()
    {
        $this->stringCalculator = new StringCalculator();
    }

    public function testEmptyStringReturnsZero()
    {
        $this->assertEquals(0, $this->stringCalculator->add(''));
    }

    public function testStringWithOneNumberReturnsTheNumber()
    {
        $this->assertEquals(112, $this->stringCalculator->add('112'));
    }

    public function testStringWithTwoNumbersReturnTheirSum()
    {
        $this->assertEquals(4, $this->stringCalculator->add('2,2'));
    }

    public function testStringWithUnknowAmountOfNumbersReturnTheirSum()
    {
        $this->assertEquals(10, $this->stringCalculator->add('1,1,4,4'));
    }

    public function testStringWithNumbersSeparatedByNewLinesReturnsTheirSum()
    {
        $this->assertEquals(6, $this->stringCalculator->add('1' . PHP_EOL . '2,3'));
    }

    public function testStringSupportCustomDelimiters()
    {
        $this->assertEquals(3, $this->stringCalculator->add(';' . PHP_EOL . '1;2'));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testANegativeNumberThrowsAnException()
    {
        $this->stringCalculator->add('1,2,-5');
    }

    public function testNumberOverOneThousandIsIgnored()
    {
        $this->assertEquals(2, $this->stringCalculator->add('2,1001'));
    }
}