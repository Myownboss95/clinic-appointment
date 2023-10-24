<?php

namespace App\Repositories;

use App\Models\SubService;
use App\Repositories\BaseRepository;

/**
 * Class SubServiceRepository
 * @package App\Repositories
 * @version October 24, 2023, 3:59 pm UTC
*/

class SubServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'service_id',
        'price',
        'description',
        'image'
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
        return SubService::class;
    }
}
