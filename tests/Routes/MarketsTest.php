<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MarketsTest extends TestCase
{

    public function testUnauthorize() {
        $response = $this->get(
            '/api/markets/nearby?latitude=31.185971&longitude=29.906160'
        )->response->getContent();

        $response = json_decode($response);

        $this->assertEquals($response->status, false);
        $this->assertEquals($response->data, null);
        $this->assertEquals($response->itemsCount, null);
        $this->assertEquals($response->validation, 'token_not_provided');
    }

    public function testTokenExpired() {
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9hcGkvcmVnaXN0ZXItZ3Vlc3QiLCJpYXQiOjE1MzI3NjU2ODUsImV4cCI6MTUzMjc2OTI4NSwibmJmIjoxNTMyNzY1Njg1LCJqdGkiOiIwdUxBM2FTZ1p0c0lCUm5LIn0.x1v6IhwPvD165rkraFNEmWBJ3pVD8KG70DyDZBmmcj0";
        $response = $this->get(
            '/api/markets/nearby?latitude=31.185971&longitude=29.906160',
            ['HTTP_Authorization' => 'Bearer' . $token]
        )->response->getContent();

        $response = json_decode($response);

        $this->assertEquals($response->status, false);
        $this->assertEquals($response->data, null);
        $this->assertEquals($response->itemsCount, null);
        $this->assertEquals($response->validation, 'token_expired');
    }

    public function testTokenInvalid() {
        $token = "222eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9hcGkvcmVnaXN0ZXItZ3Vlc3QiLCJpYXQiOjE1MzI3NjU2ODUsImV4cCI6MTUzMjc2OTI4NSwibmJmIjoxNTMyNzY1Njg1LCJqdGkiOiIwdUxBM2FTZ1p0c0lCUm5LIn0.x1v6IhwPvD165rkraFNEmWBJ3pVD8KG70DyDZBmmcj0";
        $response = $this->get(
            '/api/markets/nearby?latitude=31.185971&longitude=29.906160',
            ['HTTP_Authorization' => 'Bearer' . $token]
        )->response->getContent();

        $response = json_decode($response);

        $this->assertEquals($response->status, false);
        $this->assertEquals($response->data, null);
        $this->assertEquals($response->itemsCount, null);
        $this->assertEquals($response->validation, 'token_invalid');
    }

    public function testValidationNumber() {
        $responseRegistration = $this->post(
            '/api/register-guest', 
            ['device_id' => '463773737373', 'language' => 'en']
        )->response->getContent();
        
        $responseRegistration = json_decode($responseRegistration);
        $token = $responseRegistration->data;

        $response = $this->get(
            '/api/markets/nearby?latitude=eeeeeee&longitude=29iiiii', 
            ['HTTP_Authorization' => 'Bearer' . $token]
        )->response->getContent();

        $response = json_decode($response);

        $this->assertEquals($response->status, false);
        $this->assertEquals($response->data, null);
        $this->assertEquals($response->itemsCount, null);
        $this->assertObjectHasAttribute('latitude', $response->validation);
        $this->assertObjectHasAttribute('longitude', $response->validation);

        return $token;
    }

    /**
     * @depends testValidationNumber
    */
    public function testHappyScenarios(string $token) {
        $response = $this->get(
            '/api/markets/nearby?latitude=31.214838&longitude=29.939324', 
            ['HTTP_Authorization' => 'Bearer' . $token]
        )->response->getContent();
        
        $response = json_decode($response);
     
        $this->assertEquals($response->status, true);
        $this->assertEquals($response->validation, null);
        $this->assertEquals($response->itemsCount, 2);
        $this->assertTrue(is_array($response->data));
        $this->assertEquals(2,count($response->data));
        $this->assertEquals($response->data[0]->address, '45 Albert Al Awal, Ezbet Saad, Qism Sidi Gabir, Alexandria Governorate');
        $this->assertEquals($response->data[1]->address, 'El Guish Rd.، SAN STEFANO، Qism El-Raml, Alexandria Governorate');

    }
}
