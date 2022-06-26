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
        $cart =  $this->model
        ->with('products.productTranslations')
        ->where("shopping_cart.userid", "=", $Id)
        ->get(); 
       // dd($cart->ToArray());
    return $this->CartFactory($cart,$lang);
    }

    public function CartFactory($cart,$lang)
    {
        $arr=array() ;
        foreach($cart as $car)
        {
           
            $vat=1;
           // dd($car["products"]["IsTaxable"]);
            if($car["products"]["Is_Include_Vat"]==false)
            {
            $vat = $car["products"]["Vat"] += 1 ;

            }

            $productName = $car["products.productTranslations"];
             // get product by lang and add it to list
              //  dd($productName);
           array_push($arr,["id"=>$car["Id"],"priceIncVat"=>$vat*$car["products"]["Price"],"ProductName"=>$productName ]);
           
        }
        return $arr;
    }
}
