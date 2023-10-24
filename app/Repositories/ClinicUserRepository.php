<?php

namespace App\Repositories;

use App\Models\ClinicUser;
use App\Repositories\BaseRepository;

/**
 * Class ClinicUserRepository
 * @package App\Repositories
 * @version October 24, 2023, 4:12 pm UTC
*/

class ClinicUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'clinic_id',
        'role'
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
        return ClinicUser::class;
    }
}
