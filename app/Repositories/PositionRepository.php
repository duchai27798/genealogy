<?php


namespace App\Repositories;


use App\Models\Position;
use App\Repositories\Core\BaseRepository;

class PositionRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(Position::class);
    }
}
