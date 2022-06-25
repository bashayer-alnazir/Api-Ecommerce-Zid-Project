<?php

namespace App\Repositories;

use App\Models\product_translation;
use App\Repositories\BaseRepository;

/**
 * Class product_translationRepository
 * @package App\Repositories
 * @version June 24, 2022, 9:19 pm UTC
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
        'Language'
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
