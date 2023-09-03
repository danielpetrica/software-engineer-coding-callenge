<?php
require_once ("Grid.php");
require_once ("Rover.php");

/**
 * @param bool|array $input
 *
 * @return array|bool
 */
function handle (array $input): string
{
    // get grid size config
    $grid_size = explode(' ', array_shift($input));
    // the first line is the grid size
    $grid = new Grid($grid_size[0], $grid_size[1]);
    // now we instantiate the rovers
    $rovers = [];
    $index = 0;
    $result = '';
    while (count($input) >= 2)
    {
        $rover_pos = explode(' ', array_shift($input));
        // instantiate the rover
        $rovers[$index] = new Rover($rover_pos[0], $rover_pos[1], $rover_pos[2]);
        $movements = array_shift($input);
        $rovers[$index]->move($movements, $grid);
        //prepare the index for next rover
        $result .= $rovers[$index]->x . ' '
            . $rovers[$index]->y . ' '
            . $rovers[$index]->direction->name;
        if (count($input) >= 2) {
            $result .= "\n";
        }
        $index++;
    }
    return $result;
}
