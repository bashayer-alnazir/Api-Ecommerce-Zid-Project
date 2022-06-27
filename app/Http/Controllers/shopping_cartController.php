<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshopping_cartRequest;
use App\Http\Requests\Updateshopping_cartRequest;
use App\Repositories\shopping_cartRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shopping_cartController extends AppBaseController
{
    /** @var  shopping_cartRepository */
    private $shoppingCartRepository;

    public function __construct(shopping_cartRepository $shoppingCartRepo)
    {
        $this->shoppingCartRepository = $shoppingCartRepo;
    }

    /**
     * Display a listing of the shopping_cart.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shoppingCarts = $this->shoppingCartRepository->all();
        return view('shopping_carts.index')
            ->with('shoppingCarts', $shoppingCarts);
    }

    /**
     * Show the form for creating a new shopping_cart.
     *
     * @return Response
     */
    public function create()
    {
        return view('shopping_carts.create');
    }

    /**
     * Store a newly created shopping_cart in storage.
     *
     * @param Createshopping_cartRequest $request
     *
     * @return Response
     */
    public function store(Createshopping_cartRequest $request)
    {
        $input = $request->all();

        $shoppingCart = $this->shoppingCartRepository->create($input);

        Flash::success('Shopping Cart saved successfully.');

        return redirect(route('shoppingCarts.index'));
    }

    /**
     * Display the specified shopping_cart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shoppingCart = $this->shoppingCartRepository->find($id);

        if (empty($shoppingCart)) {
            Flash::error('Shopping Cart not found');

            return redirect(route('shoppingCarts.index'));
        }

        return view('shopping_carts.show')->with('shoppingCart', $shoppingCart);
    }

    /**
     * Show the form for editing the specified shopping_cart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shoppingCart = $this->shoppingCartRepository->find($id);

        if (empty($shoppingCart)) {
            Flash::error('Shopping Cart not found');

            return redirect(route('shoppingCarts.index'));
        }

        return view('shopping_carts.edit')->with('shoppingCart', $shoppingCart);
    }

    /**
     * Update the specified shopping_cart in storage.
     *
     * @param int $id
     * @param Updateshopping_cartRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshopping_cartRequest $request)
    {
        $shoppingCart = $this->shoppingCartRepository->find($id);

        if (empty($shoppingCart)) {
            Flash::error('Shopping Cart not found');

            return redirect(route('shoppingCarts.index'));
        }

        $shoppingCart = $this->shoppingCartRepository->update($request->all(), $id);

        Flash::success('Shopping Cart updated successfully.');

        return redirect(route('shoppingCarts.index'));
    }

    /**
     * Remove the specified shopping_cart from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shoppingCart = $this->shoppingCartRepository->find($id);

        if (empty($shoppingCart)) {
            Flash::error('Shopping Cart not found');

            return redirect(route('shoppingCarts.index'));
        }

        $this->shoppingCartRepository->delete($id);

        Flash::success('Shopping Cart deleted successfully.');

        return redirect(route('shoppingCarts.index'));
    }
}
