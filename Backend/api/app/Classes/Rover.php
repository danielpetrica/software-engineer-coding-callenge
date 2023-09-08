<?php

namespace App\Classes;

use Exception;

class Rover
{
    public Direction $direction;

    /**
     * @param int       $x
     * @param int       $y
     * @param Direction $direction
     */
    public function __construct (public int $x, public int $y, string $direction)
    {
        $this->direction = Direction::FromString($direction);
    }

    /**
     * Execute the movement action
     *
     * @param string $movements
     * @param Grid   $grid
     *
     * @return void
     * @throws \Exception
     */
    public function move (string $movements, Grid $grid): void
    {

        // get the movement string as an array of chars
        $moves = str_split($movements);
        foreach ($moves as $step)
        {
            if ($step == 'M')
            {
                // Can I progress in that direction?
                if ($grid->check_rover_advance($this))
                {
                    $this->advance();
                }
                else
                {
                    throw new Exception("Move Out of bonds, Movement interupted to save rovers");
                }
            }
            else if ($step == 'R')
            {
                $this->direction = $this->direction->rotate($step);
            }
            else if ($step == 'L')
            {
                $this->direction = $this->direction->rotate($step);
            }
        }
    }

    /**
     * @return void
     */
    private function advance (): void
    {
        switch ($this->direction->name)
        {
            case 'N':
                $this->y += 1;
            break;
            case 'E':
                $this->x += 1;
            break;
            case 'S':
                $this->y -= 1;
            break;
            case 'W':
                $this->x -= 1;
            break;
        }
    }

    public function getDirection (): Direction
    {
        return $this->direction;
    }


}

/**
 * enum used for directions
 */
enum Direction: int
{

    case N = 0;
    case E = 1;
    case S = 2;
    case W = 3;

    /**
     * @param string $direction
     *
     * @return \Direction
     */
    public static function FromString (string $direction): Direction
    {
        return match ($direction)
        {
            'N' => Direction::N,
            'E' => Direction::E,
            'S' => Direction::S,
            'W' => Direction::W,
        };
    }

    /**
     * @param string $move
     *
     * @return \Direction
     */
    public function rotate (string $move): Direction
    {
        switch ($move)
        {
            case 'L':
                // modulo % in php is broken for negatives
                $number = ($this->value + -1) % 4;
                if ($number < 0)
                {
                    $number = $number + 4;
                }
                return Direction::from($number);
            case 'R':
                return Direction::from(($this->value + +1) % 4);
        }
        return $this;
    }

}
