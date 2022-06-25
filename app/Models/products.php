<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class products
 * @package App\Models
 * @version June 22, 2022, 10:24 pm UTC
 *
 * @property \App\Models\Merchant $merchantid
 * @property \Illuminate\Database\Eloquent\Collection $producttranslations
 * @property \Illuminate\Database\Eloquent\Collection $shoppingcarts
 * @property number $Price
 * @property number $Vat
 * @property boolean $IsTaxable
 * @property integer $MerchantId
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 * @property string|\Carbon\Carbon $deleted_at
 */
class products extends Model
{

    public $table = 'product';
    
    public $timestamps = false;



    protected $primaryKey = 'Id';

    public $fillable = [
        'Price',
        'Vat',
        'IsTaxable',
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
        'Price' => 'decimal:0',
        'Vat' => 'decimal:0',
        'IsTaxable' => 'boolean',
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
        'IsTaxable' => 'required|boolean',
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
        return $this->belongsTo(\App\Models\Merchant::class, 'MerchantId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function producttranslations()
    {
        return $this->hasMany(\App\Models\Producttranslation::class, 'ProductId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function shoppingcarts()
    {
        return $this->hasMany(\App\Models\Shoppingcart::class, 'ProductId');
    }
}
