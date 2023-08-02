<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyCrudTest extends TestCase
{
    public function test_the_list_of_companies()
    {
        $response = $this->get('/companies');
        $response->assertStatus(200);
    }

    public function test_the_create_company(){
        $this->actingAs(User::find(1));
        $data = [
            '_token' => csrf_token(),
            'name' => "Test",
            'email' => "test@test.com",
            'logo' => "test.jpg",
            'url' => 'test.com',
            'about' => 'test about',
        ];
        $response = $this->call('POST','/companies', $data);
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_the_update_company(){
        $this->actingAs(User::find(1));
        $data = [
            '_token' => csrf_token(),
            'name' => "Test-change",
            'email' => "test@test.com",
            'logo' => "test.jpg",
            'url' => 'test.com',
            'about' => 'test about',
        ];
        $response = $this->call('PUT','/companies/17', $data);
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_the_delete_company(){
        $this->actingAs(User::find(1));
        $response = $this->call('DELETE','/companies/17');
        $this->assertEquals(302, $response->getStatusCode());
    }
}
