<?php namespace Tests\Repositories;

use App\Models\shopping_cart;
use App\Repositories\shopping_cartRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shopping_cartRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shopping_cartRepository
     */
    protected $shoppingCartRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shoppingCartRepo = \App::make(shopping_cartRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shopping_cart()
    {
        $shoppingCart = factory(shopping_cart::class)->make()->toArray();

        $createdshopping_cart = $this->shoppingCartRepo->create($shoppingCart);

        $createdshopping_cart = $createdshopping_cart->toArray();
        $this->assertArrayHasKey('id', $createdshopping_cart);
        $this->assertNotNull($createdshopping_cart['id'], 'Created shopping_cart must have id specified');
        $this->assertNotNull(shopping_cart::find($createdshopping_cart['id']), 'shopping_cart with given id must be in DB');
        $this->assertModelData($shoppingCart, $createdshopping_cart);
    }

    /**
     * @test read
     */
    public function test_read_shopping_cart()
    {
        $shoppingCart = factory(shopping_cart::class)->create();

        $dbshopping_cart = $this->shoppingCartRepo->find($shoppingCart->Id);

        $dbshopping_cart = $dbshopping_cart->toArray();
        $this->assertModelData($shoppingCart->toArray(), $dbshopping_cart);
    }

    /**
     * @test update
     */
    public function test_update_shopping_cart()
    {
        $shoppingCart = factory(shopping_cart::class)->create();
        $fakeshopping_cart = factory(shopping_cart::class)->make()->toArray();

        $updatedshopping_cart = $this->shoppingCartRepo->update($fakeshopping_cart, $shoppingCart->Id);

        $this->assertModelData($fakeshopping_cart, $updatedshopping_cart->toArray());
        $dbshopping_cart = $this->shoppingCartRepo->find($shoppingCart->Id);
        $this->assertModelData($fakeshopping_cart, $dbshopping_cart->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shopping_cart()
    {
        $shoppingCart = factory(shopping_cart::class)->create();

        $resp = $this->shoppingCartRepo->delete($shoppingCart->Id);

        $this->assertTrue($resp);
        $this->assertNull(shopping_cart::find($shoppingCart->Id), 'shopping_cart should not exist in DB');
    }
}
