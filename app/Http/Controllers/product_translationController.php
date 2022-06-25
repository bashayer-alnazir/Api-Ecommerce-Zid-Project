<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createproduct_translationRequest;
use App\Http\Requests\Updateproduct_translationRequest;
use App\Repositories\product_translationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class product_translationController extends AppBaseController
{
    /** @var  product_translationRepository */
    private $productTranslationRepository;

    public function __construct(product_translationRepository $productTranslationRepo)
    {
        $this->productTranslationRepository = $productTranslationRepo;
    }

    /**
     * Display a listing of the product_translation.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $productTranslations = $this->productTranslationRepository->all();

        return view('product_translations.index')
            ->with('productTranslations', $productTranslations);
    }

    /**
     * Show the form for creating a new product_translation.
     *
     * @return Response
     */
    public function create()
    {
        return view('product_translations.create');
    }

    /**
     * Store a newly created product_translation in storage.
     *
     * @param Createproduct_translationRequest $request
     *
     * @return Response
     */
    public function store(Createproduct_translationRequest $request)
    {
        $input = $request->all();

        $productTranslation = $this->productTranslationRepository->create($input);

        Flash::success('Product Translation saved successfully.');

        return redirect(route('productTranslations.index'));
    }

    /**
     * Display the specified product_translation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productTranslation = $this->productTranslationRepository->find($id);

        if (empty($productTranslation)) {
            Flash::error('Product Translation not found');

            return redirect(route('productTranslations.index'));
        }

        return view('product_translations.show')->with('productTranslation', $productTranslation);
    }

    /**
     * Show the form for editing the specified product_translation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productTranslation = $this->productTranslationRepository->find($id);

        if (empty($productTranslation)) {
            Flash::error('Product Translation not found');

            return redirect(route('productTranslations.index'));
        }

        return view('product_translations.edit')->with('productTranslation', $productTranslation);
    }

    /**
     * Update the specified product_translation in storage.
     *
     * @param int $id
     * @param Updateproduct_translationRequest $request
     *
     * @return Response
     */
    public function update($id, Updateproduct_translationRequest $request)
    {
        $productTranslation = $this->productTranslationRepository->find($id);

        if (empty($productTranslation)) {
            Flash::error('Product Translation not found');

            return redirect(route('productTranslations.index'));
        }

        $productTranslation = $this->productTranslationRepository->update($request->all(), $id);

        Flash::success('Product Translation updated successfully.');

        return redirect(route('productTranslations.index'));
    }

    /**
     * Remove the specified product_translation from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productTranslation = $this->productTranslationRepository->find($id);

        if (empty($productTranslation)) {
            Flash::error('Product Translation not found');

            return redirect(route('productTranslations.index'));
        }

        $this->productTranslationRepository->delete($id);

        Flash::success('Product Translation deleted successfully.');

        return redirect(route('productTranslations.index'));
    }
}
