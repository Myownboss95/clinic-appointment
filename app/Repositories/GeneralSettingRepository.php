<?php

namespace App\Repositories;

use App\Models\GeneralSetting;
use App\Repositories\BaseRepository;

/**
 * Class GeneralSettingRepository
 * @package App\Repositories
 * @version October 24, 2023, 4:08 pm UTC
*/

class GeneralSettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'value'
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
        return GeneralSetting::class;
    }
}
