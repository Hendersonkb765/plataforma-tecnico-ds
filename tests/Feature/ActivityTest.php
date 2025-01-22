<?php

namespace Tests\Feature;

use App\Models\Discipline;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
class ActivityTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    //php artisan test --filter=ActivityTest
    public function test_activity_can_be_registered(): void
    {
        $studentRole = Role::factory()->create([
            'name' => 'student',
        ])->first();
        $teacherRole = Role::factory()->create([
            'name' => 'teacher',
        ])->first();
        
      

        $teacher = User::factory(['role_id' => 2])->create()->first();
        $discipline = Discipline::factory()->create([
            'teacher_id' => $teacher->id
        ])->first();
        $user = User::factory()->create()->first();
        $this->actingAs($user);
        $response = $this->post(route('activities.store'),[
            'name' => 'Atividade 1',
            'description' => 'Descrição da atividade 1',
            'expirationDate' => '2021-10-10',
            'maxGrade' => 10,
            'maxScore' => 0,
            'link' => 'http://www.google.com',
            'teacherId' => $teacher->id,
            'disciplineId' => $discipline->id,
        ]);
        $response->assertStatus(200);
    }
}
