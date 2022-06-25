<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shopping_cart;

class shopping_cartApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shopping_cart()
    {
        $shoppingCart = factory(shopping_cart::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shopping_carts', $shoppingCart
        );

        $this->assertApiResponse($shoppingCart);
    }

    /**
     * @test
     */
    public function test_read_shopping_cart()
    {
        $shoppingCart = factory(shopping_cart::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/shopping_carts/'.$shoppingCart->Id
        );

        $this->assertApiResponse($shoppingCart->toArray());
    }

    /**
     * @test
     */
    public function test_update_shopping_cart()
    {
        $shoppingCart = factory(shopping_cart::class)->create();
        $editedshopping_cart = factory(shopping_cart::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shopping_carts/'.$shoppingCart->Id,
            $editedshopping_cart
        );

        $this->assertApiResponse($editedshopping_cart);
    }

    /**
     * @test
     */
    public function test_delete_shopping_cart()
    {
        $shoppingCart = factory(shopping_cart::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shopping_carts/'.$shoppingCart->Id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shopping_carts/'.$shoppingCart->Id
        );

        $this->response->assertStatus(404);
    }
}
