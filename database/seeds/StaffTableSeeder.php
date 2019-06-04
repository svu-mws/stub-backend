<?php

use App\Models\JobRole;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    public function run()
    {
        factory(Staff::class, 10)->create()->each(static function ($staff) {
            $staff->jobRoles()->save(factory(JobRole::class)->make());
        });
    }
}
