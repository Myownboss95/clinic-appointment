<?php

namespace App\Repositories;

use App\Models\UserStage;
use App\Repositories\BaseRepository;

/**
 * Class UserStageRepository
 * @package App\Repositories
 * @version October 24, 2023, 3:59 pm UTC
*/

class UserStageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'sub_service_id',
        'service_id',
        'log'
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
        return UserStage::class;
    }
}
