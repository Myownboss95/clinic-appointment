<?php

namespace App\Repositories;

use App\Models\Stage;

/**
 * Class StageRepository
 *
 * @version October 24, 2023, 4:00 pm UTC
 */
class StageRepository extends BaseRepository
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
        return Stage::class;
    }
}
