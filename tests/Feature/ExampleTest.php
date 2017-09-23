<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);

        $this->get('/articles')->assertSee('It is with great plesure that I present my website for everybody that wants learn a litte bit of everything!');
    }
}
