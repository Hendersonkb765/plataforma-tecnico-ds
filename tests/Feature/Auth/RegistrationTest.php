<?php

namespace Tests\Feature\Auth;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    //php artisan test --filter=RegistrationTest
    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/registrar-se');

        $response->assertStatus(200);
    }

    public function test_new_student_can_register(): void
    {
        Role::firstOrCreate(['name' => 'student']);
        $response = $this->post(route('register.student'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role_id' => Role::where('name', 'student')->first()->id,
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_new_teacher_can_register(): void
    {
        Role::firstOrCreate(['name' => 'teacher']);
        $email = fake()->unique()->safeEmail();
        $response = $this->post(route('register.teacher'), [
            'name' => 'Test User',
            'email' => $email,
            'password' => 'password',
            'password_confirmation' => 'password',
            'role_id' => Role::where('name', 'teacher')->first()->id,
        ]);

        $isExist  =User::exists('email', $email);
        $this->assertTrue($isExist);
        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_new_guardian_can_register(): void
    {
        Role::firstOrCreate(['name' => 'guardian']);
        $email = fake()->unique()->safeEmail();
        $response = $this->post(route('register.guardian'), [
            'name' => 'Test User',
            'email' => $email,
            'password' => 'password',
            'password_confirmation' => 'password',
            'role_id' => Role::where('name', 'guardian')->first()->id,
        ]);

        $isExist  =User::exists('email', $email);
        $this->assertTrue($isExist);
        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }
}
