<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class product
 * @package App\Models
 * @version June 25, 2022, 6:58 pm UTC
 *
 * @property \App\Models\Merchant $merchantid
 * @property \Illuminate\Database\Eloquent\Collection $productTranslations
 * @property \Illuminate\Database\Eloquent\Collection $shoppingCarts
 * @property number $Price
 * @property number $Vat
 * @property boolean $Is_Include_Vat
 * @property integer $MerchantId
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 * @property string|\Carbon\Carbon $deleted_at
 */
class product extends Model
{
    use SoftDeletes;

    public $table = 'product';
    
    public $timestamps = false;


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'Id';

    public $fillable = [
        'Price',
        'Vat',
        'Is_Include_Vat',
        'MerchantId',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Id' => 'integer',
        'Price' => 'double',
        'Vat' => 'double',
        'Is_Include_Vat' => 'boolean',
        'MerchantId' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Price' => 'required|numeric',
        'Vat' => 'required|numeric',
        'Is_Include_Vat' => 'required|boolean',
        'MerchantId' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function merchantid()
    {
        return $this->belongsTo(\App\Models\Merchants::class, 'MerchantId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productTranslations()
    {
        return $this->hasMany(\App\Models\product_translation::class, 'ProductId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function shoppingCarts()
    {
        return $this->hasMany(\App\Models\ShoppingCart::class, 'ProductId');
    }
}
