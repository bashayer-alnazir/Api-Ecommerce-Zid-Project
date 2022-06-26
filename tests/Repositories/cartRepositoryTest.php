<?php namespace Tests\Repositories;

use App\Models\cart;
use App\Repositories\cartRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class cartRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var cartRepository
     */
    protected $cartRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cartRepo = \App::make(cartRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cart()
    {
        $cart = factory(cart::class)->make()->toArray();

        $createdcart = $this->cartRepo->create($cart);

        $createdcart = $createdcart->toArray();
        $this->assertArrayHasKey('id', $createdcart);
        $this->assertNotNull($createdcart['id'], 'Created cart must have id specified');
        $this->assertNotNull(cart::find($createdcart['id']), 'cart with given id must be in DB');
        $this->assertModelData($cart, $createdcart);
    }

    /**
     * @test read
     */
    public function test_read_cart()
    {
        $cart = factory(cart::class)->create();

        $dbcart = $this->cartRepo->find($cart->Id);

        $dbcart = $dbcart->toArray();
        $this->assertModelData($cart->toArray(), $dbcart);
    }

    /**
     * @test update
     */
    public function test_update_cart()
    {
        $cart = factory(cart::class)->create();
        $fakecart = factory(cart::class)->make()->toArray();

        $updatedcart = $this->cartRepo->update($fakecart, $cart->Id);

        $this->assertModelData($fakecart, $updatedcart->toArray());
        $dbcart = $this->cartRepo->find($cart->Id);
        $this->assertModelData($fakecart, $dbcart->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cart()
    {
        $cart = factory(cart::class)->create();

        $resp = $this->cartRepo->delete($cart->Id);

        $this->assertTrue($resp);
        $this->assertNull(cart::find($cart->Id), 'cart should not exist in DB');
    }
}
