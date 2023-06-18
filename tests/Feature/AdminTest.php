<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    /**
 * Проверяем, что пользователь с ролью администратора
 * имеет доступ к странице администратора.
 */
public function testAdminAccess()
{
    // Создаем тестовую модель администратора
    $user = User::factory()->create([
        'name' => 'admin',
        'surname' => 'admin',
        'patronymic' => 'admin',
        'phone' => 'admin',
        'email' => 'admin@example.com',
        'is_admin' => '1',
        'password' => \Illuminate\Support\Facades\Hash::make('admin'),
    ]);

    // Авторизуем администратора         
    $response = $this->post('/login', [
        'email' => 'admin@example.com',
        'password' => 'admin',
    ]);

    // Проверяем, что администратор сможет открыть админ панель
    $response = $this->get('/admin/orders');
    $response->assertStatus(200);
}

/**
 * Проверяем, что пользователь без роли администратора
 * не имеет доступа к странице администратора.
 */
public function testNonAdminAccess()
{
    // Создаем тестовую модель пользователя
    $user = User::factory()->create([
        'name' => 'User',
        'surname' => 'User',
        'patronymic' => 'User',
        'phone' => 'User',
        'email' => 'User@example.com',
        'is_admin' => '0',
        'password' => \Illuminate\Support\Facades\Hash::make('password'),
    ]);

    // Авторизуем пользователя          
    $response = $this->post('/login', [
        'email' => 'User@example.com',
        'password' => 'password',
    ]);

    // Проверяем, что пользователь не сможет открыть админ панель
    $response = $this->get('/admin/orders');
    $response->assertStatus(302);
}
}
