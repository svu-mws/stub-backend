<?php

namespace Tests\Feature;

use App\Models\JobRole;
use Czim\Repository\ExtendedRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery as m;

class JobRoleControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $mockedClass = ExtendedRepository::class;

    public function testGetAllJobRoles()
    {
        $jobRoles = factory(JobRole::class, 3)->make();
        $mock = m::mock($this->mockedClass);
        $mock->shouldReceive('all')->once()->andReturn($jobRoles);
        $this->app->instance($this->mockedClass, $mock);
        $response = $this->get(route('job_roles.index'));
        $response
            ->assertStatus(200)
            ->assertExactJson($jobRoles->toArray());
    }

    public function testGetJobRole()
    {
        $jobRole = factory(JobRole::class)->make();
        $id = $jobRole->id = 1;
        $mock = m::mock($this->mockedClass);
        $mock->shouldReceive('findOrFail')->once()->andReturn($jobRole);
        $this->app->instance($this->mockedClass, $mock);
        $response = $this->get(route('job_roles.show', ['id' => $id]));
        $response
            ->assertStatus(200)
            ->assertExactJson($jobRole->toArray());
    }

    public function testInsertJobRole()
    {
        $jobRole = factory(JobRole::class)->make();
        $response = $this->json('POST', route('job_roles.store'), $jobRole->toArray());
        $response->assertStatus(201);
        $this->assertDatabaseHas('jobroles', ['title' => $jobRole->title]);
    }

    public function testUpdateJobRole()
    {
        $jobRole = factory(JobRole::class)->create();
        $id = $jobRole->id;
        $temp = ['title' => 'tttttttttttt'];
        $response = $this->json('PATCH', route('job_roles.update'), $temp);
        $response->assertStatus(204);
        $this->assertDatabaseHas('jobroles', $temp);
    }

    public function testDeleteJobRole()
    {
        $jobRole = factory(JobRole::class)->create();
        $id = $jobRole->id;
        $response = $this->delete(route('job_roles.destroy'));
        $response->assertStatus(202);
        $this->assertDatabaseMissing('job_roles', ['title' => $jobRole->title]);
    }
}
