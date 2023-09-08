<?php

namespace App\Classes;

class Grid
{
    public function __construct (private int $size_x, private int $size_y) {}

    /**
     * Check if grid is still available in that direction
     *
     * @param Rover $rover
     *
     * @return bool
     */
    public function check_rover_advance (Rover $rover): bool
    {

        // to check if the rover can advance in it's current orientation I need to check if it's future position is
        // within the size of the grid
        return match ($rover->direction->name)
        {
            'N'     => ($rover->y + 1) <= $this->size_y,
            'E'     => ($rover->x + 1) <= $this->size_x,
            'S'     => 0 <= ($rover->y - 1) && ($rover->y - 1) <= $this->size_y,
            'W'     => 0 <= ($rover->x - 1) && ($rover->x - 1) <= $this->size_x,
            default => false,
        };
    }
}

