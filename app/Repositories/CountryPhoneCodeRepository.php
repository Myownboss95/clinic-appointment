<?php

namespace App\Repositories;

use App\Models\CountryPhoneCode;

/**
 * Class CountryPhoneCodeRepository
 *
 * @version October 24, 2023, 4:11 pm UTC
 */
class CountryPhoneCodeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'dial_code',
        'dial_min_length',
        'dial_max_length',
        'code',
        'currency_name',
        'currency_code',
        'currency_symbol',
        'flag',
        'active',
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
        return CountryPhoneCode::class;
    }
}
