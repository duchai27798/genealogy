<?php


namespace App\Repositories;


use App\Models\Role;
use App\Repositories\Core\BaseRepository;

class RoleRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(Role::class);
    }
}
