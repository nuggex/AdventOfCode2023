<?php

require_once "Day1.php";

class Day1Bench
{

    public Day1 $day1;

    public function __construct()
    {
        $this->day1 = new Day1;
    }

    public function benchPart1()
    {

        $this->day1->part1();
    }

    public function benchPart2()
    {
        $this->day1->part2();
    }

}