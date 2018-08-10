<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoriesTest extends TestCase
{
    
    public function testValidationRequired() {
        $responseRegistration = $this->post(
            '/api/register-guest', 
            ['device_id' => '463773737373', 'language' => 'en', 'latitude' => '2111.22', 'longitude' => '31.5444']
        )->response->getContent();
        
        $responseRegistration = json_decode($responseRegistration);
        $token = $responseRegistration->data;

        $response = $this->get(
            '/api/markets/categories/23222', 
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
    public function testGetMarketCategories(string $token) {
        $response = $this->get(
            '/api/markets/categories/1', 
            ['HTTP_Authorization' => 'Bearer' . $token]
        )->response->getContent();
        
        $response = json_decode($response);
        
        $this->assertEquals($response->status, true);
        $this->assertEquals($response->validation, null);
        $this->assertEquals($response->itemsCount, 5);
        $this->assertEquals(count($response->data), 5);
        for($i = 0; $i < count($response->data); $i++) {
            $this->assertObjectHasAttribute('name', $response->data[$i]);
            $this->assertObjectHasAttribute('name_ar', $response->data[$i]);
            $this->assertObjectHasAttribute('description', $response->data[$i]);
            $this->assertObjectHasAttribute('description_ar', $response->data[$i]);
        }
    }

     /**
     * @depends testValidationRequired
    */
    public function testGetMarketCategoriesPagination(string $token) {
        $response = $this->get(
            '/api/markets/categories/1/2/2', 
            ['HTTP_Authorization' => 'Bearer' . $token]
        )->response->getContent();
        
        $response = json_decode($response);
        
        $this->assertEquals($response->status, true);
        $this->assertEquals($response->validation, null);
        $this->assertEquals($response->itemsCount, 5);
        $this->assertEquals(count($response->data), 2);
        $this->assertEquals($response->data[0]->category_id, 3);
        for($i = 0; $i < count($response->data); $i++) {
            $this->assertObjectHasAttribute('name', $response->data[$i]);
            $this->assertObjectHasAttribute('name_ar', $response->data[$i]);
            $this->assertObjectHasAttribute('description', $response->data[$i]);
            $this->assertObjectHasAttribute('description_ar', $response->data[$i]);
        }
    }
}
