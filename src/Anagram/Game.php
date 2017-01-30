<?php

namespace Kata\Anagram;

class Game
{
    private $string1;
    private $string2;

    public function __construct($string1, $string2)
    {
        $this->string1 = $string1;
        $this->string2 = $string2;
    }

    public function isAnagram()
    {
        $result = true;

        $string1Array = $this->convertToSortedArray($this->string1);
        $string2Array = $this->convertToSortedArray($this->string2);

        if(count($string1Array) != count($string2Array)) {
            $result = false;
        } elseif ($string1Array !== $string2Array) {
            $result = false;
        }

        return $result;
    }

    public function setString1($string)
    {
        $this->string1 = $string;
    }

    public function setString2($string)
    {
        $this->string2 = $string;
    }

    private function convertToSortedArray($string)
    {
        $result = strtolower($string);
        $result = preg_replace('/\s+/', '', $result);
        $result = str_split($result);
        sort($result);

        return $result;
    }
}