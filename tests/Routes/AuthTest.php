<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    public function testValidationRequire()
    {
        $response = $this->post('/api/register-guest')->response->getContent();

        $response = json_decode($response);

        $this->assertEquals($response->status, false);
        $this->assertEquals($response->data, null);
        $this->assertEquals($response->itemsCount, null);
        $this->assertObjectHasAttribute('device_id', $response->validation);
        $this->assertObjectHasAttribute('language', $response->validation);
    }

    public function testValidationNumber() {
        $response = $this->post(
            '/api/register-guest', 
            ['device_id' => '463773737373', 'language' => 'en', 'latitude' => 'ahahaha', 'longitude' => 'MAMMAMAMAM']
        )->response->getContent();

        $response = json_decode($response);

        $this->assertEquals($response->status, false);
        $this->assertEquals($response->data, null);
        $this->assertEquals($response->itemsCount, null);
        $this->assertObjectHasAttribute('latitude', $response->validation);
        $this->assertObjectHasAttribute('longitude', $response->validation);
    }

    public function testEnum() {
        $response = $this->post(
            '/api/register-guest', 
            ['device_id' => '463773737373', 'language' => 'en333']
        )->response->getContent();

        $response = json_decode($response);

        $this->assertEquals($response->status, false);
        $this->assertEquals($response->data, null);
        $this->assertEquals($response->itemsCount, null);
        $this->assertObjectHasAttribute('language', $response->validation);
    }

    public function testHappyScenarios() {
        $response = $this->post(
            '/api/register-guest', 
            ['device_id' => '463773737373', 'language' => 'en']
        )->response->getContent();
        
        $response = json_decode($response);
        $this->assertEquals($response->status, true);
        $this->assertEquals($response->validation, null);
        $this->assertEquals($response->itemsCount, null);
        $this->assertTrue(is_string($response->data));

        $this->seeInDatabase('devices', [
            'device_id' => '463773737373',
            'language' => 'en'
        ]);

    }
}
