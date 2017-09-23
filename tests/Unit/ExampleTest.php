<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use SalesProgram\Article;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //$this->assertTrue(true);

        // Given I have two records in the database that are posts.

        // and each one is  posted a month apart

        $first = factory(Article::class)->create();

        $second = factory(Article::class)->create([

            'created_at' => \Carbon\Carbon::now()->subMonth(),
            ]);

        //when I fetch the archives
        $posts = Article::archives();

        //then the response should be the proper format.

        $this->assertCount(2, $posts);

    }
}
