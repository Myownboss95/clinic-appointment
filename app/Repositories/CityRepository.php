<?php

namespace App\Repositories;

use App\Models\City;

/**
 * Class CityRepository
 *
 * @version October 24, 2023, 4:12 pm UTC
 */
class CityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'state_id',
        'name',
        'status',
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
        return City::class;
    }
}
