<?php

namespace App\Repositories;

use App\Models\product_translation;
use App\Repositories\BaseRepository;

/**
 * Class product_translationRepository
 * @package App\Repositories
 * @version June 25, 2022, 7:00 pm UTC
*/

class product_translationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ProductId',
        'Name',
        'Description',
        'Language',
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
        return product_translation::class;
    }
}
