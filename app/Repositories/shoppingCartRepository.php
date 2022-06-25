<?php

namespace App\Repositories;

use App\Models\shoppingCart;
use App\Repositories\BaseRepository;

/**
 * Class shoppingCartRepository
 * @package App\Repositories
 * @version June 22, 2022, 10:28 pm UTC
*/

class shoppingCartRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ProductId',
        'UserId',
        'Quantity'
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
        return shoppingCart::class;
    }
}
