<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class product_translation
 * @package App\Models
 * @version June 24, 2022, 9:19 pm UTC
 *
 * @property \App\Models\Product $productid
 * @property integer $ProductId
 * @property string $Name
 * @property string $Description
 * @property string $Language
 */
class product_translation extends Model
{
    use SoftDeletes;

    public $table = 'product_translation';
    
    public $timestamps = false;


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'Id';

    public $fillable = [
        'ProductId',
        'Name',
        'Description',
        'Language'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Id' => 'integer',
        'ProductId' => 'integer',
        'Name' => 'string',
        'Description' => 'string',
        'Language' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ProductId' => 'required|integer',
        'Name' => 'required|string|max:200',
        'Description' => 'required|string|max:200',
        'Language' => 'required|string|max:100'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productid()
    {
        return $this->belongsTo(\App\Models\Product::class, 'ProductId');
    }
}
