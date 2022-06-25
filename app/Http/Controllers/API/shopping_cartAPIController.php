<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshopping_cartAPIRequest;
use App\Http\Requests\API\Updateshopping_cartAPIRequest;
use App\Models\shopping_cart;
use App\Repositories\shopping_cartRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shopping_cartController
 * @package App\Http\Controllers\API
 */

class shopping_cartAPIController extends AppBaseController
{
    /** @var  shopping_cartRepository */
    private $shoppingCartRepository;

    public function __construct(shopping_cartRepository $shoppingCartRepo)
    {
        $this->shoppingCartRepository = $shoppingCartRepo;
    }

    /**
     * Display a listing of the shopping_cart.
     * GET|HEAD /shoppingCarts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $shoppingCarts = $this->shoppingCartRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shoppingCarts->toArray(), 'Shopping Carts retrieved successfully');
    }

    /**
     * Store a newly created shopping_cart in storage.
     * POST /shoppingCarts
     *
     * @param Createshopping_cartAPIRequest $request
     *
     * @return Response
     */
    public function store(Createshopping_cartAPIRequest $request)
    {
        $input = $request->all();

        $shoppingCart = $this->shoppingCartRepository->create($input);

        return $this->sendResponse($shoppingCart->toArray(), 'Shopping Cart saved successfully');
    }

    /**
     * Display the specified shopping_cart.
     * GET|HEAD /shoppingCarts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var shopping_cart $shoppingCart */
        $shoppingCart = $this->shoppingCartRepository->find($id);

        if (empty($shoppingCart)) {
            return $this->sendError('Shopping Cart not found');
        }

        return $this->sendResponse($shoppingCart->toArray(), 'Shopping Cart retrieved successfully');
    }

    /**
     * Update the specified shopping_cart in storage.
     * PUT/PATCH /shoppingCarts/{id}
     *
     * @param int $id
     * @param Updateshopping_cartAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshopping_cartAPIRequest $request)
    {
        $input = $request->all();

        /** @var shopping_cart $shoppingCart */
        $shoppingCart = $this->shoppingCartRepository->find($id);

        if (empty($shoppingCart)) {
            return $this->sendError('Shopping Cart not found');
        }

        $shoppingCart = $this->shoppingCartRepository->update($input, $id);

        return $this->sendResponse($shoppingCart->toArray(), 'shopping_cart updated successfully');
    }

    /**
     * Remove the specified shopping_cart from storage.
     * DELETE /shoppingCarts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var shopping_cart $shoppingCart */
        $shoppingCart = $this->shoppingCartRepository->find($id);

        if (empty($shoppingCart)) {
            return $this->sendError('Shopping Cart not found');
        }

        $shoppingCart->delete();

        return $this->sendSuccess('Shopping Cart deleted successfully');
    }
}
