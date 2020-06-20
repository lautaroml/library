<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_author_cab_be_created()
    {
        $this->withoutExceptionHandling();

        $this->post('/author', [
            'name' => 'Lautaro',
            'dob' => '03/19/1986',
        ]);

        $author = Author::all();

        $this->assertCount(1, $author);

        $this->assertInstanceOf(Carbon::class, $author->first()->dob);

        $this->assertEquals('1986/19/03', $author->first()->dob->format('Y/d/m'));

        $this->assertEquals('19/03/1986', $author->first()->dob->format('d/m/Y'));
    }

}
