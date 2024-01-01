<?php

namespace App\Repositories;

use App\Models\PasswordReset;

/**
 * Class PasswordResetRepository
 *
 * @version October 24, 2023, 4:04 pm UTC
 */
class PasswordResetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'token',
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
