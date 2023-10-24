<?php

namespace App\Repositories;

use App\Models\PasswordReset;
use App\Repositories\BaseRepository;

/**
 * Class PasswordResetRepository
 * @package App\Repositories
 * @version October 24, 2023, 4:04 pm UTC
*/

class PasswordResetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'token'
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
        return PasswordReset::class;
    }
}
