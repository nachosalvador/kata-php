<?php

namespace Kata\FizzBuzz;

class Game
{
    const BUZZ_NUMBER = 5;
    const FIZZ_NUMBER = 3;

    const BUZZ_WORD = 'Buzz';
    const FIZZ_WORD = 'Fizz';

    public function say($number)
    {
        $output = '';

        if ($this->isFizz($number) || $this->isBuzz($number)) {
            if ($this->isFizz($number)) {
                $output .= self::FIZZ_WORD;
            }
            if ($this->isBuzz($number)) {
                $output .= self::BUZZ_WORD;
            }
        } else {
            $output = $number;
        }

        return $output;
    }

    private function isFizz($number)
    {
        return ($number % self::FIZZ_NUMBER == 0);
    }

    private function isBuzz($number)
    {
        return ($number % self::BUZZ_NUMBER == 0);
    }
}