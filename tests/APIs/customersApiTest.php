<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\customers;

class customersApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_customers()
    {
        $customers = factory(customers::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/customers', $customers
        );

        $this->assertApiResponse($customers);
    }

    /**
     * @test
     */
    public function test_read_customers()
    {
        $customers = factory(customers::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/customers/'.$customers->id
        );

        $this->assertApiResponse($customers->toArray());
    }

    /**
     * @test
     */
    public function test_update_customers()
    {
        $customers = factory(customers::class)->create();
        $editedcustomers = factory(customers::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/customers/'.$customers->id,
            $editedcustomers
        );

        $this->assertApiResponse($editedcustomers);
    }

    /**
     * @test
     */
    public function test_delete_customers()
    {
        $customers = factory(customers::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/customers/'.$customers->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/customers/'.$customers->id
        );

        $this->response->assertStatus(404);
    }
}
