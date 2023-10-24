<?php

namespace App\Repositories;

use App\Models\Appointment;
use App\Repositories\BaseRepository;

/**
 * Class AppointmentRepository
 * @package App\Repositories
 * @version October 24, 2023, 4:12 pm UTC
*/

class AppointmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'sub_service_id',
        'start_time',
        'end_time',
        'stage_id'
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
        return Appointment::class;
    }
}
