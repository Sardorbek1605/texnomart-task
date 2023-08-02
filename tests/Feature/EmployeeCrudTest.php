<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeCrudTest extends TestCase
{
    public function test_the_list_of_employees()
    {
        $response = $this->get('/employees');
        $response->assertStatus(200);
    }

    public function test_the_create_employee(){
        $this->actingAs(User::find(1));
        $data = [
            '_token' => csrf_token(),
            'company_id' => Employee::first()->id,
            'first_name' => "Test",
            'last_name' => "Test",
            'email' => "Test",
            'phone' => "99 999 99 99",
            'status' => Employee::INACTIVE,
            'bio' => 'test bio',
        ];
        $response = $this->call('POST','/employees', $data);
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_the_update_employee(){
        $this->actingAs(User::find(1));
        $data = [
            '_token' => csrf_token(),
            'company_id' => Employee::first()->id,
            'first_name' => "Test",
            'last_name' => "Test",
            'email' => "Test",
            'phone' => "99 999 99 99",
            'status' => Employee::INACTIVE,
            'bio' => 'test bio',
        ];
        $response = $this->call('PUT','/employees/1', $data);
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_the_delete_employee(){
        $this->actingAs(User::find(1));
        $response = $this->call('DELETE','/employees/1');
        $this->assertEquals(302, $response->getStatusCode());
    }
}
