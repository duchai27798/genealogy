<?php


namespace App\Repositories;


use App\Models\Gender;
use App\Repositories\Core\BaseRepository;

class GenderRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(Gender::class);
    }
}
