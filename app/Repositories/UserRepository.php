<?php
namespace App\Repositories;

use App\User;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function byId($id)
    {
        return User::find($id);
    }
}