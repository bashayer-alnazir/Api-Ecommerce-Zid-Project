<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createproduct_translationAPIRequest;
use App\Http\Requests\API\Updateproduct_translationAPIRequest;
use App\Models\product_translation;
use App\Repositories\product_translationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class product_translationController
 * @package App\Http\Controllers\API
 */

class product_translationAPIController extends AppBaseController
{
    /** @var  product_translationRepository */
    private $productTranslationRepository;

    public function __construct(product_translationRepository $productTranslationRepo)
    {
        $this->productTranslationRepository = $productTranslationRepo;
    }

    /**
     * Display a listing of the product_translation.
     * GET|HEAD /productTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $productTranslations = $this->productTranslationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($productTranslations->toArray(), 'Product Translations retrieved successfully');
    }

    /**
     * Store a newly created product_translation in storage.
     * POST /productTranslations
     *
     * @param Createproduct_translationAPIRequest $request
     *
     * @return Response
     */
    public function store(Createproduct_translationAPIRequest $request)
    {
        $input = $request->all();

        $productTranslation = $this->productTranslationRepository->create($input);

        return $this->sendResponse($productTranslation->toArray(), 'Product Translation saved successfully');
    }

    /**
     * Display the specified product_translation.
     * GET|HEAD /productTranslations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var product_translation $productTranslation */
        $productTranslation = $this->productTranslationRepository->find($id);

        if (empty($productTranslation)) {
            return $this->sendError('Product Translation not found');
        }

        return $this->sendResponse($productTranslation->toArray(), 'Product Translation retrieved successfully');
    }

    /**
     * Update the specified product_translation in storage.
     * PUT/PATCH /productTranslations/{id}
     *
     * @param int $id
     * @param Updateproduct_translationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateproduct_translationAPIRequest $request)
    {
        $input = $request->all();

        /** @var product_translation $productTranslation */
        $productTranslation = $this->productTranslationRepository->find($id);

        if (empty($productTranslation)) {
            return $this->sendError('Product Translation not found');
        }

        $productTranslation = $this->productTranslationRepository->update($input, $id);

        return $this->sendResponse($productTranslation->toArray(), 'product_translation updated successfully');
    }

    /**
     * Remove the specified product_translation from storage.
     * DELETE /productTranslations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var product_translation $productTranslation */
        $productTranslation = $this->productTranslationRepository->find($id);

        if (empty($productTranslation)) {
            return $this->sendError('Product Translation not found');
        }

        $productTranslation->delete();

        return $this->sendSuccess('Product Translation deleted successfully');
    }
}
