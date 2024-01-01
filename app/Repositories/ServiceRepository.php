<?php

namespace App\Repositories;

use App\Models\Service;

/**
 * Class ServiceRepository
 *
 * @version October 24, 2023, 4:03 pm UTC
 */
class ServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return Service::class;
    }
}
