<?php namespace Tests\Repositories;

use App\Models\merchants;
use App\Repositories\merchantsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class merchantsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var merchantsRepository
     */
    protected $merchantsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->merchantsRepo = \App::make(merchantsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_merchants()
    {
        $merchants = factory(merchants::class)->make()->toArray();

        $createdmerchants = $this->merchantsRepo->create($merchants);

        $createdmerchants = $createdmerchants->toArray();
        $this->assertArrayHasKey('id', $createdmerchants);
        $this->assertNotNull($createdmerchants['id'], 'Created merchants must have id specified');
        $this->assertNotNull(merchants::find($createdmerchants['id']), 'merchants with given id must be in DB');
        $this->assertModelData($merchants, $createdmerchants);
    }

    /**
     * @test read
     */
    public function test_read_merchants()
    {
        $merchants = factory(merchants::class)->create();

        $dbmerchants = $this->merchantsRepo->find($merchants->id);

        $dbmerchants = $dbmerchants->toArray();
        $this->assertModelData($merchants->toArray(), $dbmerchants);
    }

    /**
     * @test update
     */
    public function test_update_merchants()
    {
        $merchants = factory(merchants::class)->create();
        $fakemerchants = factory(merchants::class)->make()->toArray();

        $updatedmerchants = $this->merchantsRepo->update($fakemerchants, $merchants->id);

        $this->assertModelData($fakemerchants, $updatedmerchants->toArray());
        $dbmerchants = $this->merchantsRepo->find($merchants->id);
        $this->assertModelData($fakemerchants, $dbmerchants->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_merchants()
    {
        $merchants = factory(merchants::class)->create();

        $resp = $this->merchantsRepo->delete($merchants->id);

        $this->assertTrue($resp);
        $this->assertNull(merchants::find($merchants->id), 'merchants should not exist in DB');
    }
}
