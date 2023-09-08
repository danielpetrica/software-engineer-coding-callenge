![alt text](https://www.trekksoft.com/hs-fs/hubfs/TrekkSoft%20logo.png?width=1600&name=TrekkSoft%20logo.png "Trekksoft")

# Backend Interview Challenge

## Learning Competencies
- Challenge understanding.
- Implement Object Oriented Design, DDD, patterns and best practices.
- Implementing robust testing is important.
- Manipulate Input/Output correctly.

---

# Candidate Notes
Deployed the project using php8.1

Solved the project in two phases. 
The initial version, visible in my first commit was aimed at demonstrating the algorithm resolution through a simple 
cli script. 
Then once it has been demonstrated, I deployed an api under the api/ folder to demonstrate how an api would work in 
such a case. 

The first cli is still usable by editing the `input.txt` file and executing `php cli.php`. The software will read 
the input file and proceed to generate the output.

The api accepts a Post request on the `/mars` route with a text body containing the input instructions. 
To simulate the logic for a real Mars rover mission and preserve the rovers, the code will stop if it encounters an out 
of bond or instruction for a rover or fails to initialize the grid. 

The api and cli use the same classes to avoid duplications. They're located in app/Classes

To test the cli please run `vendor/bin/phpunit tests/GeneralTest.php` in this folder after having installed composer. 

To test the api please execute  `php artisan test` inside the api folder.

## Installation
execute `composer install` inside this folder 

execute `composer install` inside the api folder  then `cp .env.example .env` to create the env file and finally `php 
artisan key:generate` to generate and app key  

execute `php artisan serve` inside the api folder to serve the api for the project

---

## The challenge

A squad of robotic discovery rovers are to be landed by SpaceX on an specific area on Mars. This area, which is curiously rectangular, must be navigated by the rovers so that their on-board webcams and detectors can get a complete view of the surrounding terrain.
A rover’s position and location is represented by a combination of x and y coordinates and a letter representing one of the four cardinal compass points. The area is divided up into a grid to simplify the navigation. An example position might be 0, 0, N, which means the rover is in the bottom left corner and facing North.
In order to control a rover, SpaceX sends a simple string of letters as a message. The possible letters are ‘R’, ‘L’ and ‘M’. ‘R’ and ‘L’ make the rover spin 90 degrees left or right respectively, without moving from its current spot. ‘M’ means move forward one grid point, and maintain the same heading.

---


## INPUT:
The first line of input is the upper-right coordinates of the area, the lower-left coordinates are assumed to be 0,0. The rest of the input is information pertaining to the rovers that have been deployed. Each rover has two lines of input.The first line gives the rover’s position, and the second line is a series of instructions telling the rover how to explore the area. The position is made up of two integers and a letter separated by spaces, corresponding to the x and y co-ordinates and the rover’s orientation. Each rover will be finished sequentially, which means that the second rover won’t start to move until the first one has finished moving.

## OUTPUT
The output for each rover should be its final co-ordinates and heading.

---

## Setup
1. Download the repository.
2. Make the corresponding modifications.
3. Create a pull request to review the challenge.

## Input Cheat Sheet
The output for each rover should be its final co-ordinates and heading.

# Test Input:
```
5 5
1 2 N
LMLMLMLMM
3 3 E
MMRMMRMRRM
```

# Expected Output:
```
1 3 N
5 1 E
```
