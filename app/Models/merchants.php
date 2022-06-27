<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class merchants
 * @package App\Models
 * @version June 25, 2022, 6:48 pm UTC
 *
 * @property \App\Models\User $userid
 * @property \App\Models\User $userid
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property string $StoreName
 * @property integer $ShippingCost
 * @property integer $userId
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 * @property string|\Carbon\Carbon $deleted_at
 */
class merchants extends Model
{
    use SoftDeletes;

    public $table = 'merchants';
    
    public $timestamps = false;


    protected $dates = ['deleted_at'];



    public $fillable = [
        'StoreName',
        'ShippingCost',
        'userId',
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
        'userId' => 'integer',
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
        'ShippingCost' => 'integer',
        'userId' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userid()
    {
        return $this->belongsTo(\App\User::class, 'userId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'MerchantId');
    }
}
