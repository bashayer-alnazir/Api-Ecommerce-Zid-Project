<?php

namespace App\Repositories;

use App\Models\cart;
use App\Repositories\BaseRepository;
/**
 * Class cartRepository
 * @package App\Repositories
 * @version June 25, 2022, 7:33 pm UTC
*/

class cartRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ProductId',
        'UserId',
        'Quantity',
        'deleted_at'
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
        return cart::class;
    }

    public function getByUserId($Id,$lang)
    {
    //   $carts=  $this->model->get();   
      //  if($cart)
        $cart =  $this->model->select("shopping_cart.id","shopping_cart.Quantity" ,"product.price", "product_translation.name")
        ->join('product', 'shopping_cart.productid', '=', 'product.Id')
        ->join('product_translation', 'product.Id', '=', 'product_translation.ProductId')
        ->where("shopping_cart.userid", "=", $Id)
        ->where("product_translation.language", "=",$lang)
        ->get(); 
         //   if($carts)
        return $cart;

    }
}
