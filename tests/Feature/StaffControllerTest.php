<?php

namespace Tests\Feature;

use App\Models\JobRole;
use App\Models\Staff;
use Czim\Repository\ExtendedRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery as m;

class StaffControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $mockedClass = ExtendedRepository::class;

    public function testGetAllStaff()
    {
        $staff = factory(Staff::class, 3)->make();
        $mock = m::mock($this->mockedClass);
        $mock->shouldReceive('all')->once()->andReturn($staff);
        $this->app->instance($this->mockedClass, $mock);
        $response = $this->get(route('staff.index'));
        $response
            ->assertStatus(200)
            ->assertExactJson($staff->toArray());
    }

    public function testGetStaff()
    {
        $staff = factory(Staff::class)->make();
        $id = $staff->id = 1;
        $mock = m::mock($this->mockedClass);
        $mock->shouldReceive('findOrFail')->with($id)->once()->andReturns($staff);
        $this->app->instance($this->mockedClass, $mock);
        $response = $this->get(route('staff.show'));
        $response
            ->assertStatus(200)
            ->assertExactJson($staff->toArray());
    }

    public function testInsertStaff()
    {
        $staff = factory(Staff::class)->make();
        $response = $this->json('POST', route('staff.create'), $staff->toArray());
        $response->assertStatus(201);
        $this->assertDatabaseHas('staff', ['name' => $staff->name]);
    }

    public function testUpdateStaff()
    {
        $staff = factory(Staff::class)->create();
        $id = $staff->id;
        $temp = ['name' => 'tttttttttttt'];
        $response = $this->json('PATCH', route('staff.update'), $temp);
        $response->assertStatus(204);
        $this->assertDatabaseHas('staff', $temp);
    }

    public function testDeleteStaff()
    {
        $staff = factory(Staff::class)->create();
        $id = $staff->id;
        $response = $this->delete(route('staff.destroy'));
        $response->assertStatus(202);
        $this->assertDatabaseMissing('staff', ['id' => $id]);
    }

    // Relations

    public function testAddStaffJobRole()
    {
        $staff = factory(Staff::class)->create();
        $staffId = $staff->id;
        $jobRole = factory(JobRole::class)->create();
        $jobRoleId = $jobRole->id;
        $response = $this->json('POST', route('staff.job_roles.create'), ['job_role_id' => $jobRoleId]);
        $response->assertStatus(201);
        $this->assertDatabaseHas('job_role_staff', ['staff_id' => $staffId, 'job_role_id' => $jobRoleId]);
    }

    public function testDeleteStaffJobRole()
    {
        $staff = factory(Staff::class)->create();
        $staffId = $staff->id;
        $jobRole = factory(JobRole::class)->create();
        $jobRoleId = $jobRole->id;
        $staff->jobRoles()->attach($jobRoleId);
        $response = $this->delete(route('staff.job_roles.destroy'));
        $response->assertStatus(202);
        $this->assertDatabaseMissing('job_role_staff', ['staff_id' => $staffId, 'job_role_id' => $jobRoleId]);
    }
}
