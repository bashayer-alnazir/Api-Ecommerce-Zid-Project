<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class merchants
 * @package App\Models
 * @version June 22, 2022, 10:22 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $StoreName
 * @property integer $ShippingCost
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 * @property string|\Carbon\Carbon $deleted_at
 */
class merchants extends Model
{

    public $table = 'merchants';
    
    public $timestamps = false;



    protected $primaryKey = 'Id';

    public $fillable = [
        'StoreName',
        'ShippingCost',
         'UserId',
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
        'StoreName' => 'string',
        'ShippingCost' => 'integer',
        'UserId' => 'integer',
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
        'StoreName' => 'required|string|max:200',
        'ShippingCost' => 'required|integer',
        'UserId' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'MerchantId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userid()
    {
        return $this->belongsTo(\App\Models\User::class, 'UserId');
    }
}
