<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecartAPIRequest;
use App\Http\Requests\API\UpdatecartAPIRequest;
use App\Models\cart;
use App\Repositories\cartRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class cartController
 * @package App\Http\Controllers\API
 */

class cartAPIController extends AppBaseController
{
    /** @var  cartRepository */
    private $cartRepository;

    public function __construct(cartRepository $cartRepo)
    {
        $this->cartRepository = $cartRepo;
    }

    /**
     * Display a listing of the cart.
     * GET|HEAD /carts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carts = $this->cartRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($carts->toArray(), 'Carts retrieved successfully');
    }

    /**
     * Store a newly created cart in storage.
     * POST /carts
     *
     * @param CreatecartAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecartAPIRequest $request)
    {
        $input = $request->all();

        $cart = $this->cartRepository->create($input);

        return $this->sendResponse($cart->toArray(), 'Cart saved successfully');
    }

    /**
     * Display the specified cart.
     * GET|HEAD /carts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Request $Request,$id)
    {
    $req1 = $Request->all();
    $lang = $Request->input('language');
  //  dd($req1[]);

    //    $req = $req1->Language;
    //       dd($req);
        /** @var cart $cart */
        $cart = $this->cartRepository->getByUserId($id,$lang);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }

        return $this->sendResponse($cart->toArray(), 'Cart retrieved successfully');
    }

    /**
     * Update the specified cart in storage.
     * PUT/PATCH /carts/{id}
     *
     * @param int $id
     * @param UpdatecartAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecartAPIRequest $request)
    {
        $input = $request->all();

        /** @var cart $cart */
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }

        $cart = $this->cartRepository->update($input, $id);

        return $this->sendResponse($cart->toArray(), 'cart updated successfully');
    }

    /**
     * Remove the specified cart from storage.
     * DELETE /carts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var cart $cart */
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }

        $cart->delete();

        return $this->sendSuccess('Cart deleted successfully');
    }
}
