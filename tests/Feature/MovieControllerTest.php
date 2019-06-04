<?php

namespace Tests\Feature;

use App\Models\Movie;
use Czim\Repository\ExtendedRepository;
use Mockery as m;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovieControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $mockedClass = ExtendedRepository::class;

    public function testGetAllMovies()
    {
        $movie = factory(Movie::class, 3)->make();
        $mock = m::mock($this->mockedClass);
        $mock->shouldReceive('all')->once()->andReturn($movie);
        $this->app->instance($this->mockedClass, $mock);
        $response = $this->get(route('movies.index'));
        $response
            ->assertStatus(200)
            ->assertExactJson($movie->toArray());
    }

    public function testGetMovie()
    {
        $movie = factory(Movie::class)->make();
        $id = $movie->id = 1;
        $mock = m::mock($this->mockedClass);
        $mock->shouldReceive('findOrFail')->with($id)->once()->andReturns($movie);
        $this->app->instance($this->mockedClass, $mock);
        $response = $this->get(route('movies.show', ['id' => $id]));
        $response
            ->assertStatus(200)
            ->assertExactJson($movie->toArray());
    }

    public function testInsertMovie()
    {
        $movie = factory(Movie::class)->make();
        $response = $this->json('POST', route('movies.store'), $movie->toArray());
        $response->assertStatus(201);
        $this->assertDatabaseHas('movies', ['title' => $movie->title]);
    }

    public function testUpdateMovie()
    {
        $movie = factory(Movie::class)->create();
        $id = $movie->id;
        $temp = ['title' => 'tttttttttttt'];
        $response = $this->json('PATCH', route('movies.update'), $temp);
        $response->assertStatus(204);
        $this->assertDatabaseHas('movies', $temp);
    }

    public function testDeleteStaff()
    {
        $movie = factory(Movie::class)->create();
        $id = $movie->id;
        $response = $this->delete(route('movies.destroy'));
        $response->assertStatus(202);
        $this->assertDatabaseMissing('movies', ['id' => $id]);
    }
}
