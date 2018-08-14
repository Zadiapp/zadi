<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ItemsTest extends TestCase
{
    
    public function testValidationRequired() {
        $responseRegistration = $this->post(
            '/api/register-guest', 
            ['device_id' => '463773737373', 'language' => 'en', 'latitude' => '2111.22', 'longitude' => '31.5444']
        )->response->getContent();
        
        $responseRegistration = json_decode($responseRegistration);
        $token = $responseRegistration->data;

        $response = $this->get(
            '/api/markets/items/23222', 
            ['HTTP_Authorization' => 'Bearer' . $token]
        )->response->getContent();

        $response = json_decode($response);

        $this->assertEquals($response->status, false);
        $this->assertEquals($response->data, null);
        $this->assertEquals($response->itemsCount, null);
        $this->assertObjectHasAttribute('market_id', $response->validation);
        $this->assertEquals($response->validation->market_id[0], 'The selected market id is invalid.');
        return $token;
    }

     /**
     * @depends testValidationRequired
    */
    public function testGetMarketItems(string $token) {
        $response = $this->get(
            '/api/markets/items/1', 
            ['HTTP_Authorization' => 'Bearer' . $token]
        )->response->getContent();
        
        $response = json_decode($response);
        
        $this->assertEquals($response->status, true);
        $this->assertEquals($response->validation, null);
        $this->assertEquals($response->itemsCount, 10);
        $this->assertEquals(count($response->data), 10);
        for($i = 0; $i < count($response->data); $i++) {
            $this->assertObjectHasAttribute('item_id', $response->data[$i]);
            $this->assertObjectHasAttribute('name', $response->data[$i]);
            $this->assertObjectHasAttribute('name_ar', $response->data[$i]);
            $this->assertObjectHasAttribute('image', $response->data[$i]);
            $this->assertObjectHasAttribute('price', $response->data[$i]);
        }
    }

     /**
     * @depends testValidationRequired
    */
    public function testGetMarketItemsPagination(string $token) {
        $response = $this->get(
            '/api/markets/items/1/2/2', 
            ['HTTP_Authorization' => 'Bearer' . $token]
        )->response->getContent();
        
        $response = json_decode($response);
        
        $this->assertEquals($response->status, true);
        $this->assertEquals($response->validation, null);
        $this->assertEquals($response->itemsCount, 10);
        $this->assertEquals(count($response->data), 2);
        $this->assertEquals($response->data[0]->item_id, 3);
        for($i = 0; $i < count($response->data); $i++) {
            $this->assertObjectHasAttribute('item_id', $response->data[$i]);
            $this->assertObjectHasAttribute('name', $response->data[$i]);
            $this->assertObjectHasAttribute('name_ar', $response->data[$i]);
            $this->assertObjectHasAttribute('image', $response->data[$i]);
            $this->assertObjectHasAttribute('price', $response->data[$i]);
        }
    }
}
