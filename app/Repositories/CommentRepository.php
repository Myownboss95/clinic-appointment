<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\BaseRepository;

/**
 * Class CommentRepository
 * @package App\Repositories
 * @version October 24, 2023, 4:01 pm UTC
*/

class CommentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_name',
        'model_id',
        'body',
        'user_id',
        'staff_user_id'
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
        return Comment::class;
    }
}
