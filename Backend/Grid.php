<?php

class Grid
{
    public function __construct (private int $size_x, private int $size_y) {}

    /**
     * Check if grid is still available in that direction
     * @param \Rover $rover
     *
     * @return bool
     */
    public function check_rover_advance (Rover $rover): bool {

        // to check if the rover can advance in it's current orientation I need to check if it's future position is
        // within the size of the grid
        switch ($rover->direction->name) {
            case 'N':
                return ($rover->y + 1) <= $this->size_y;
            break;
            case 'E':
                return ($rover->x + 1) <= $this->size_x;
            break;
            case 'S':
                return  0 <= ($rover->y -1) &&  ($rover->y -1) <= $this->size_y;
            break;
            case 'W':
                return 0 <= ($rover->x -1) && ($rover->x -1)<= $this->size_x;
            break;
        }
        return false;
    }
}

