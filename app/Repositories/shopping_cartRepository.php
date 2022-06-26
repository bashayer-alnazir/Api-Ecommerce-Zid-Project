<?php

namespace App\Repositories;

use App\Models\shopping_cart;
use App\Repositories\BaseRepository;

/**
 * Class shopping_cartRepository
 * @package App\Repositories
 * @version June 25, 2022, 7:00 pm UTC
*/

class shopping_cartRepository extends BaseRepository
{
    
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ProductId',
        'UserId',
        'Quantity'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return shopping_cart::class;
    }

    public function addToCart($input)
    {
        $Id =  $input->input('UserId');
    //    $ProductId = $input->input('ProductId');
        $product = Product::findOrFail($Id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "ProductId" => $product->id,
                "quantity" => 1,
                "price" => $product->price,
            ];
        }
    }

    public function FindProduct($ProductId)
    {
      return  $this->model->where("ProductId",$ProductId)->get()->first(); 
          //  dd()     
    }
}
