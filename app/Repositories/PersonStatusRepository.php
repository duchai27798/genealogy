<?php


namespace App\Repositories;


use App\Models\PersonStatus;
use App\Repositories\Core\BaseRepository;

class PersonStatusRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(PersonStatus::class);
    }
}
