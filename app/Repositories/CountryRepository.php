<?php

namespace App\Repositories;

use App\Models\Country;

/**
 * Class CountryRepository
 *
 * @version October 24, 2023, 4:11 pm UTC
 */
class CountryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'iso_code2',
        'iso_code3',
        'num_code',
        'status',
        'currency_symbol',
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
        return Country::class;
    }
}
