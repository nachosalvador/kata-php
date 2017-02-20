<?php

namespace Kata\StringCalculator;

class StringCalculator
{
    const DELIMITERS = [',', '\n'];

    const MAXIMUM_THRESHOLD = 1000;
    const MINIMUM_THRESHOLD = 0;

    public function add($string)
    {
        $result = 0;

        if (strlen($string)) {
            $numbers = $this->getNumbers($string);
            $negativeNumbers = array();

            foreach ($numbers as $number) {
                if ($number < self::MAXIMUM_THRESHOLD) {
                    if ($number < self::MINIMUM_THRESHOLD) {
                        array_push($negativeNumbers, $number);
                    } else {
                        $result += $number;
                    }
                } 
            }

            if (count($negativeNumbers)) {
                throw new \InvalidArgumentException(
                    'negatives not allowed: ' . implode(' ', $negativeNumbers)
                );
            }
        }

        return $result;
    }

    private function getNumbers($string)
    {
        $delimiters = implode('|', $this->getDelimiters($string));

        return preg_split('/(' . $delimiters . ')/', $string);
    }

    private function getDelimiters($string)
    {
        $delimiters = self::DELIMITERS;
        $hasCustomDelimiter = preg_match('/^\D\n/', $string);

        if ($hasCustomDelimiter) {
            array_push($delimiters, $string[0]);
        }

        return $delimiters;
    }
}