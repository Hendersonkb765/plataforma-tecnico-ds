<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Cohort;
use App\Models\Discipline;
use App\Models\Exam;
use App\Models\Guardian;
use App\Models\ImageActivity;
use App\Models\MultidisciplinaryActivity;
use App\Models\SchoolAdministration;
use App\Models\StudentActivity;
use App\Models\StudentExam;
use App\Models\Teacher;
use App\Models\User;
use  App\Models\StudentMultidisciplinaryActivity;
use Database\Factories\SchoolAdministrationFactory;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
/*
        Role::factory()->create([
            'name' => 'student',
        ]);
        Role::factory()->create([
            'name' => 'teacher',
        ]);
        Role::factory()->create([
            'name' => 'guardian',
        ]);
        Role::factory()->create([
            'name' => 'school_administration',
        ]);
*/


        Role::firstOrCreate(['name' => 'student']);
        Role::firstOrCreate(['name' => 'teacher']);
        Role::firstOrCreate(['name' => 'guardian']);
        Role::firstOrCreate(['name' => 'school_administration']);

        User::factory(10)->create();
        Discipline::factory(10)->create();
        Cohort::factory(2)->create();
        Exam::factory(10)->create();
        StudentExam::factory(10)->create();
        Activity::factory(10)->create();
        StudentActivity::factory(10)->create();
        ImageActivity::factory(10)->create();
        MultidisciplinaryActivity::factory(10)->create();
        StudentMultidisciplinaryActivity::factory(10)->create();

    }
}
