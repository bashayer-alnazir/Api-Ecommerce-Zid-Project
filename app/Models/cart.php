<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class cart
 * @package App\Models
 * @version June 25, 2022, 7:33 pm UTC
 *
 * @property \App\Models\Product $productid
 * @property \App\Models\User $userid
 * @property integer $ProductId
 * @property integer $UserId
 * @property integer $Quantity
 * @property string $deleted_at
 */
class cart extends Model
{
    use SoftDeletes;

    public $table = 'shopping_cart';
    
    public $timestamps = false;


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'Id';

    public $fillable = [
        'ProductId',
        'UserId',
        'Quantity',
        'deleted_at'
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
        'Quantity' => 'integer',
        'deleted_at' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ProductId' => 'required|integer',
        'UserId' => 'required',
        'Quantity' => 'required|integer',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function products()
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
