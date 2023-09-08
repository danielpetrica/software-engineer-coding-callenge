<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MarsApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_successful_post_call(): void
    {
        $string = [
            '5 5',
            '1 2 N',
            'LMLMLMLMM',
            '3 3 E',
            'MMRMMRMRRM'
        ];
        $response = $this->call('POST','/api/mars/', content: implode("\n", $string));

        $response->assertContent("1 3 N\n" . '5 1 E');
    }


    public function testThatShouldBreak1(){

        $string = ['5 5',
                          '1 2 N',
                          'MMMMMMMMMMMMMLMLML',
                          '3 3 E',
                          'MMRMMRMRRM'];
        $response = $this->call('POST','/api/mars/', content: implode("\n", $string));

        $response->assertBadRequest();
    }
}
