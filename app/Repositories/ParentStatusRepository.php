<?php


namespace App\Repositories;


use App\Models\ParentStatus;
use App\Repositories\Core\BaseRepository;

class ParentStatusRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(ParentStatus::class);
    }
}
