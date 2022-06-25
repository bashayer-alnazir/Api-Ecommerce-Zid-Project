<?php

namespace App\Repositories;

use App\Models\merchants;
use App\Repositories\BaseRepository;

/**
 * Class merchantsRepository
 * @package App\Repositories
 * @version June 25, 2022, 6:48 pm UTC
*/

class merchantsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'StoreName',
        'ShippingCost',
        'userId',
        'created_at',
        'updated_at',
        'deleted_at'
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
        return merchants::class;
    }
}
