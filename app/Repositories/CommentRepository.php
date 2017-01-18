<?php
namespace App\Repositories;

use App\Comment;

/**
 * Class CommentRepository
 * @package App\Repositories
 */
class CommentRepository
{
    /**
     * @param array $attributes
     * @return static
     */
    public function create(array $attributes)
    {
        return Comment::create($attributes);
    }
}