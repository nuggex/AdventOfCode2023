<?php

class Day1
{

    private array $numberStrings;
    public array|false $f;

    public function __construct()
    {
        $this->f = file(dirname(__FILE__) . "/i.txt", FILE_IGNORE_NEW_LINES);
        $this->numberStrings = array(
            "one" => 1,
            "two" => 2,
            "three" => 3,
            "four" => 4,
            "five" => 5,
            "six" => 6,
            "seven" => 7,
            "eight" => 8,
            "nine" => 9
        );
    }

    public function part1(): int|string
    {
        return array_sum(array_map(function ($f){
            $n = array_filter(array_map('intval', str_split($f)), function ($a) {
                return ($a !== 0);
            });
            return (reset($n) . end($n));
        },$this->f));
    }

    public function part2(): int|string
    {
        $sum = 0;
        foreach ($this->f as $value) {
            $nums = array();
            for ($i = 1; $i < 10; $i++) {
                $pos = 0;
                $offset = 0;
                while (($pos = strpos($value, $i, $pos+$offset)) !== false) {
                    $nums[$pos] = $i;
                    $offset = 1;
                }
            }
            foreach ($this->numberStrings as $key => $numString) {
                $pos = 0;
                $offset = 0;
                while(($pos = strpos($value, $key, $pos+$offset)) !== false){
                    $nums[$pos] = $numString;
                    $offset = 1;
                }
            }
            ksort($nums, SORT_NUMERIC);
            $join = ($nums[array_key_first($nums)] . $nums[array_key_last($nums)]);
            $sum += $join;
        }
        return $sum;

    }
}