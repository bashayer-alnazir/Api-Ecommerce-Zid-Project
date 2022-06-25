<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class customers
 * @package App\Models
 * @version June 25, 2022, 7:07 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $merchants
 * @property \Illuminate\Database\Eloquent\Collection $merchant1s
 * @property \Illuminate\Database\Eloquent\Collection $shoppingCarts
 * @property string $name
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property boolean $IsMerchants
 * @property string $remember_token
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class customers extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    public $timestamps = false;


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'IsMerchants',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'IsMerchants' => 'boolean',
        'remember_token' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:255',
        'IsMerchants' => 'required|boolean',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function merchants()
    {
        return $this->hasMany(\App\Models\Merchant::class, 'userId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function merchant1s()
    {
        return $this->hasMany(\App\Models\Merchant::class, 'userId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function shoppingCarts()
    {
        return $this->hasMany(\App\Models\ShoppingCart::class, 'UserId');
    }
}
