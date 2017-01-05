<?php

namespace Kata\RomanNumerals;

class RomanNumeral
{
    const MAXIMUM_THRESHOLD = 3000;
    const MINIMUM_THRESHOLD = 1;
    const SYMBOL_VALUES = array(
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    );

    private $value;

    public function __construct($number)
    {
        $isValidNumber = ($number < self::MINIMUM_THRESHOLD || $number > self::MAXIMUM_THRESHOLD); 
        
        if ($isValidNumber) {
            throw new \InvalidArgumentException(
                'Wrong number. Enter a positive integer between ' . self::MINIMUM_THRESHOLD . ' and ' . self::MAXIMUM_THRESHOLD
            );
        }
        
        $this->value = $this->convert($number);
    }

    public function getValue()
    {
        return $this->value;
    }

    private function convert($number)
    {
        $result = '';

        foreach (self::SYMBOL_VALUES as $symbol => $value) {
            while ($value <= $number) {
                $result .= $symbol;
                $number -= $value;
            }
        }

        return $result;
    }
}