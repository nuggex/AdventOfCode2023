<?php

class Day4
{

    private array|false $f;

    public function __construct()
    {
        $this->f = file(dirname(__FILE__) . "/i.txt", FILE_IGNORE_NEW_LINES);
    }

    public function part1(): float|object|int
    {
        $sum = 0;
        foreach ($this->f as $row) {
            $split = explode("|", explode(":", $row)[1]);
            $result = array_values(array_filter(array_intersect(explode(" ", $split[0]), explode(" ", $split[1]))));
            if ($count = count($result))
                $sum += pow(2, $count - 1);
        }
        return $sum;
    }

    public function part2(): float|object|int
    {
        $test = array_map(function ($f) {
            return array($f);
        }, $this->f);
        foreach ($test as $k => &$r) {
            $split = explode("|", explode(":", $r[0])[1]);
            $result = array_values(array_filter(array_intersect(explode(" ", $split[0]), explode(" ", $split[1]))));
            if ($count = count($result)) {
                foreach ($r as $row) {
                    for ($i = 1; $i <= $count; $i++) {
                        $test[$i + $k][] = $test[$i + $k][0];
                    }
                }
            }
        }
        return array_sum((array_map('count', $test)));
    }
}