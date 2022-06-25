<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateshoppingCartRequest;
use App\Http\Requests\UpdateshoppingCartRequest;
use App\Repositories\shoppingCartRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shoppingCartController extends AppBaseController
{
    /** @var  shoppingCartRepository */
    private $shoppingCartRepository;

    public function __construct(shoppingCartRepository $shoppingCartRepo)
    {
        $this->shoppingCartRepository = $shoppingCartRepo;
    }

    /**
     * Display a listing of the shoppingCart.
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
     * Show the form for creating a new shoppingCart.
     *
     * @return Response
     */
    public function create()
    {
        return view('shopping_carts.create');
    }

    /**
     * Store a newly created shoppingCart in storage.
     *
     * @param CreateshoppingCartRequest $request
     *
     * @return Response
     */
    public function store(CreateshoppingCartRequest $request)
    {
        $input = $request->all();

        $shoppingCart = $this->shoppingCartRepository->create($input);

        Flash::success('Shopping Cart saved successfully.');

        return redirect(route('shoppingCarts.index'));
    }

    /**
     * Display the specified shoppingCart.
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
     * Show the form for editing the specified shoppingCart.
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
     * Update the specified shoppingCart in storage.
     *
     * @param int $id
     * @param UpdateshoppingCartRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateshoppingCartRequest $request)
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
     * Remove the specified shoppingCart from storage.
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
