<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemerchantsAPIRequest;
use App\Http\Requests\API\UpdatemerchantsAPIRequest;
use App\Models\merchants;
use App\Repositories\merchantsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class merchantsController
 * @package App\Http\Controllers\API
 */

class merchantsAPIController extends AppBaseController
{
    /** @var  merchantsRepository */
    private $merchantsRepository;

    public function __construct(merchantsRepository $merchantsRepo)
    {
        $this->merchantsRepository = $merchantsRepo;
    }

    /**
     * Display a listing of the merchants.
     * GET|HEAD /merchants
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $merchants = $this->merchantsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($merchants->toArray(), 'Merchants retrieved successfully');
    }

    /**
     * Store a newly created merchants in storage.
     * POST /merchants
     *
     * @param CreatemerchantsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemerchantsAPIRequest $request)
    {
        $input = $request->all();

        $merchants = $this->merchantsRepository->create($input);

        return $this->sendResponse($merchants->toArray(), 'Merchants saved successfully');
    }

    /**
     * Display the specified merchants.
     * GET|HEAD /merchants/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var merchants $merchants */
        $merchants = $this->merchantsRepository->find($id);

        if (empty($merchants)) {
            return $this->sendError('Merchants not found');
        }

        return $this->sendResponse($merchants->toArray(), 'Merchants retrieved successfully');
    }

    /**
     * Update the specified merchants in storage.
     * PUT/PATCH /merchants/{id}
     *
     * @param int $id
     * @param UpdatemerchantsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemerchantsAPIRequest $request)
    {
        $input = $request->all();

        /** @var merchants $merchants */
        $merchants = $this->merchantsRepository->find($id);

        if (empty($merchants)) {
            return $this->sendError('Merchants not found');
        }

        $merchants = $this->merchantsRepository->update($input, $id);

        return $this->sendResponse($merchants->toArray(), 'merchants updated successfully');
    }

    /**
     * Remove the specified merchants from storage.
     * DELETE /merchants/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var merchants $merchants */
        $merchants = $this->merchantsRepository->find($id);

        if (empty($merchants)) {
            return $this->sendError('Merchants not found');
        }

        $merchants->delete();

        return $this->sendSuccess('Merchants deleted successfully');
    }
}
