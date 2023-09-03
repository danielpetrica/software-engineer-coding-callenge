<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class GeneralTest extends TestCase
{
    public function testTestInputCase1(): void
    {
        $string = ['5 5',
                   '1 2 N',
                   'LMLMLMLMM',
                   '3 3 E',
                   'MMRMMRMRRM'];

        require_once 'main.php';
        $expected = "1 3 N\n" . '5 1 E';
        $this->assertSame($expected, handle($string));
    }

    public function testThatShouldBreak1(){
        $this->expectException(Exception::class);
        $string = ['5 5',
                          '1 2 N',
                          'LMLMLMMMMMMMMMM',
                          '3 3 E',
                          'MMRMMRMRRM'];
        require_once 'main.php';
        return handle($string);




    }
}
