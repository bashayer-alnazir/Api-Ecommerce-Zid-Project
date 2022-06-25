<?php namespace Tests\Repositories;

use App\Models\product_translation;
use App\Repositories\product_translationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class product_translationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var product_translationRepository
     */
    protected $productTranslationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->productTranslationRepo = \App::make(product_translationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_product_translation()
    {
        $productTranslation = factory(product_translation::class)->make()->toArray();

        $createdproduct_translation = $this->productTranslationRepo->create($productTranslation);

        $createdproduct_translation = $createdproduct_translation->toArray();
        $this->assertArrayHasKey('id', $createdproduct_translation);
        $this->assertNotNull($createdproduct_translation['id'], 'Created product_translation must have id specified');
        $this->assertNotNull(product_translation::find($createdproduct_translation['id']), 'product_translation with given id must be in DB');
        $this->assertModelData($productTranslation, $createdproduct_translation);
    }

    /**
     * @test read
     */
    public function test_read_product_translation()
    {
        $productTranslation = factory(product_translation::class)->create();

        $dbproduct_translation = $this->productTranslationRepo->find($productTranslation->Id);

        $dbproduct_translation = $dbproduct_translation->toArray();
        $this->assertModelData($productTranslation->toArray(), $dbproduct_translation);
    }

    /**
     * @test update
     */
    public function test_update_product_translation()
    {
        $productTranslation = factory(product_translation::class)->create();
        $fakeproduct_translation = factory(product_translation::class)->make()->toArray();

        $updatedproduct_translation = $this->productTranslationRepo->update($fakeproduct_translation, $productTranslation->Id);

        $this->assertModelData($fakeproduct_translation, $updatedproduct_translation->toArray());
        $dbproduct_translation = $this->productTranslationRepo->find($productTranslation->Id);
        $this->assertModelData($fakeproduct_translation, $dbproduct_translation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_product_translation()
    {
        $productTranslation = factory(product_translation::class)->create();

        $resp = $this->productTranslationRepo->delete($productTranslation->Id);

        $this->assertTrue($resp);
        $this->assertNull(product_translation::find($productTranslation->Id), 'product_translation should not exist in DB');
    }
}
