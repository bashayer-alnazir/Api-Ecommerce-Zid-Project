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
        //dd($cart->ToArray());
    return $this->CartFactory($cart,$lang);
    }

    public function CartFactory($cart,$lang)
    {
        $total = 0 ;
        $arr=array() ;
        foreach($cart as $car)
        {
            $vat=1;
            if($car["products"]["Is_Include_Vat"]==false)
                {
            $vat = $car["products"]["Vat"] += 1 ;
                }
             $productName= $this->Translate($car["products"]["productTranslations"]->ToArray(),$lang);
                
            $productInVat = $vat*$car["products"]["Price"];
            $total += $productInVat* $car["Quantity"];
             // get product by lang and add it to list
           array_push($arr,["id"=>$car["Id"],"priceIncVat"=>$productInVat,"Quantity"=>$car["Quantity"],
            "ProductName"=>$productName]);
        }
        return ["Total"=>$total,"Cart"=> $arr];
    }

    public function Translate($productTranslations,$local)
    {
        foreach($productTranslations as $ProductTranslate)
        {
            if ($ProductTranslate["Language"]==$local) {
                return $ProductTranslate["Name"];
            }
            $productLanguage = $ProductTranslate["Language"];
        }
        return "No Translatoin Found";
    }
}
