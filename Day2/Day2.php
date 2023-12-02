<?php

class Day2
{
    private array|false $f;
    private array $filter;

    public function __construct()
    {
        $this->f = file(dirname(__FILE__) . "/i.txt", FILE_IGNORE_NEW_LINES);
        $this->filter = array(
          'red' => 12,
          'green' => 13,
          'blue' => 14
        );
    }

    public function part1($returnTheStuff = false): int|array|string
    {
        $gameArray = array();
        foreach ($this->f as $value) {
            $gameStr = explode(":", $value);
            $gameNumber = explode(" ", $gameStr[0])[1];
            $gamesArray = explode(';', $gameStr[1]);
            foreach ($gamesArray as $subGame) {
                $games = explode(",", $subGame);
                $sum = array();
                foreach ($games as $game) {
                    $g = array_values(array_filter(explode(" ", $game)));
                    $color = $g[1];
                    $number = $g[0];
                    if (!isset($sum[$color]))
                        $sum[$color] = $number;
                    else
                        $sum[$color] += $number;
                }
                $gameArray[$gameNumber][] = $sum;
            }
        }
        $sum = 0;

        if($returnTheStuff)
            return $gameArray;

        foreach ($gameArray as $key => $game) {
            $isPossible = true;
            foreach ($game as $g) {
                foreach ($g as $k => $v) {
                    if ($this->filter[$k] < $v)
                        $isPossible = false;
                }
            }
            if ($isPossible)
                $sum += $key;
        }

        return $sum;
    }

    public function part2(): float|int
    {

        $gameArray = $this->part1(true);
        $totals = [];
        foreach($gameArray as $key => $game){
            $maxArr = array(
                'red' => 0,
                'blue' => 0,
                'green' => 0
            );
            foreach($game as $g){
                foreach($g as $k=>$v){
                    if($maxArr[$k] < $v)
                        $maxArr[$k] = $v;

                }
            }
            $totals[] = $maxArr['red'] * $maxArr['blue'] * $maxArr['green'];
        }

        return array_sum($totals);

    }
}