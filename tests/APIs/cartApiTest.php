<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\cart;

class cartApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cart()
    {
        $cart = factory(cart::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/carts', $cart
        );

        $this->assertApiResponse($cart);
    }

    /**
     * @test
     */
    public function test_read_cart()
    {
        $cart = factory(cart::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/carts/'.$cart->Id
        );

        $this->assertApiResponse($cart->toArray());
    }

    /**
     * @test
     */
    public function test_update_cart()
    {
        $cart = factory(cart::class)->create();
        $editedcart = factory(cart::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/carts/'.$cart->Id,
            $editedcart
        );

        $this->assertApiResponse($editedcart);
    }

    /**
     * @test
     */
    public function test_delete_cart()
    {
        $cart = factory(cart::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/carts/'.$cart->Id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/carts/'.$cart->Id
        );

        $this->response->assertStatus(404);
    }
}
