<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class shoppingCart
 * @package App\Models
 * @version June 22, 2022, 10:28 pm UTC
 *
 * @property \App\Models\User $userid
 * @property \App\Models\Product $productid
 * @property integer $ProductId
 * @property integer $UserId
 * @property integer $Quantity
 */
class shoppingCart extends Model
{

    public $table = 'shopping_cart';
    
    public $timestamps = false;



    protected $primaryKey = 'Id';

    public $fillable = [
        'ProductId',
        'UserId',
        'Quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Id' => 'integer',
        'ProductId' => 'integer',
        'UserId' => 'integer',
        'Quantity' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ProductId' => 'required|integer',
        'UserId' => 'required|integer',
        'Quantity' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userid()
    {
        return $this->belongsTo(\App\Models\User::class, 'UserId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productid()
    {
        return $this->belongsTo(\App\Models\Product::class, 'ProductId');
    }
}
