<?php


namespace App\Repositories;


use App\Models\User;
use App\Repositories\Core\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(User::class);
    }

    public function findUserByEmail($email)
    {
        return $this->_model::where('email', $email)->first();
    }
}
