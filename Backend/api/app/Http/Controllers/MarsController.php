<?php

namespace App\Http\Controllers;

use App\Classes\Grid;
use App\Classes\Rover;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class MarsController extends Controller
{
    /**
     * Single action controller responsible for the handling of the logic
     */
    #[NoReturn] public function __invoke(Request $request): string
    {

        // The Input is passed as the post-request body
        $input = explode("\n", $request->getContent());

        // get grid size config
        $grid_size = explode(' ', array_shift($input));

        try {// the first line is the grid size
            $grid = new Grid($grid_size[0], $grid_size[1]);
        } catch (\Exception) {
            abort(400, "Invalid grid provided");
        }
        // now we instantiate the rovers
        $rovers = [];
        $index = 0;
        $result = '';

        // cycle through all rovers
        while (count($input) >= 2)
           {
               $rover_pos = explode(' ', array_shift($input));

               // Instantiate the rover
               $rovers[$index] = new Rover($rover_pos[0], $rover_pos[1], $rover_pos[2]);

               // prepare the movement object
               $movements = array_shift($input);
               try
               {
                   $rovers[$index]->move($movements, $grid);
               } catch (\Exception $e) {
                   // the error happens in due to the input
                   abort(400, $e->getMessage());
//                   return response($e->getMessage(), 400);
               }

               // Format the output
               $result .= $rovers[$index]->x . ' '
                   . $rovers[$index]->y . ' '
                   . $rovers[$index]->direction->name;
               if (count($input) >= 2) {
                   $result .= "\n";
               }

               //prepare the index for the next rover
               $index++;
           }

        return $result;
    }
}
