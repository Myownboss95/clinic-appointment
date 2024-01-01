<?php

namespace App\Repositories;

use App\Models\CurrencyList;

/**
 * Class CurrencyListRepository
 *
 * @version October 24, 2023, 4:10 pm UTC
 */
class CurrencyListRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'code',
        'dial_code',
        'currency_name',
        'currency_symbol',
        'currency_code',
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
        return CurrencyList::class;
    }
}
