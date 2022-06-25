<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\merchants;

class merchantsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_merchants()
    {
        $merchants = factory(merchants::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/merchants', $merchants
        );

        $this->assertApiResponse($merchants);
    }

    /**
     * @test
     */
    public function test_read_merchants()
    {
        $merchants = factory(merchants::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/merchants/'.$merchants->id
        );

        $this->assertApiResponse($merchants->toArray());
    }

    /**
     * @test
     */
    public function test_update_merchants()
    {
        $merchants = factory(merchants::class)->create();
        $editedmerchants = factory(merchants::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/merchants/'.$merchants->id,
            $editedmerchants
        );

        $this->assertApiResponse($editedmerchants);
    }

    /**
     * @test
     */
    public function test_delete_merchants()
    {
        $merchants = factory(merchants::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/merchants/'.$merchants->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/merchants/'.$merchants->id
        );

        $this->response->assertStatus(404);
    }
}
