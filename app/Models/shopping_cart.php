<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class shopping_cart
 * @package App\Models
 * @version June 25, 2022, 7:00 pm UTC
 *
 * @property \App\Models\Product $productid
 * @property \App\Models\User $userid
 * @property integer $ProductId
 * @property integer $UserId
 * @property integer $Quantity
 */
class shopping_cart extends Model
{
    use SoftDeletes;

    public $table = 'shopping_cart';
    
    public $timestamps = false;


    protected $dates = ['deleted_at'];


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
        'UserId' => 'required',
        'Quantity' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productid()
    {
        return $this->belongsTo(\App\Models\Product::class, 'ProductId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userid()
    {
        return $this->belongsTo(\App\Models\User::class, 'UserId');
    }
}
