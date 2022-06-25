<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\product_translation;

class product_translationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_product_translation()
    {
        $productTranslation = factory(product_translation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/product_translations', $productTranslation
        );

        $this->assertApiResponse($productTranslation);
    }

    /**
     * @test
     */
    public function test_read_product_translation()
    {
        $productTranslation = factory(product_translation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/product_translations/'.$productTranslation->Id
        );

        $this->assertApiResponse($productTranslation->toArray());
    }

    /**
     * @test
     */
    public function test_update_product_translation()
    {
        $productTranslation = factory(product_translation::class)->create();
        $editedproduct_translation = factory(product_translation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/product_translations/'.$productTranslation->Id,
            $editedproduct_translation
        );

        $this->assertApiResponse($editedproduct_translation);
    }

    /**
     * @test
     */
    public function test_delete_product_translation()
    {
        $productTranslation = factory(product_translation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/product_translations/'.$productTranslation->Id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/product_translations/'.$productTranslation->Id
        );

        $this->response->assertStatus(404);
    }
}
