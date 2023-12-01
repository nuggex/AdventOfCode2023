<?php

class Day1
{

    public array|false $f;
    public function __construct(){
        $this->f = file(dirname(__FILE__) . "/i.txt", FILE_IGNORE_NEW_LINES);
    }

    public function part1(){
        $sum = 0;
        foreach($this->f as $value){
            $nums = array_map('intval', str_split($value));
            $nums = array_values(array_filter($nums, function($a){return ($a !== 0);}));
            $sum += ($nums[array_key_first($nums)] .  $nums[count($nums) -1]);
        }
        print_r($sum);
    }
}