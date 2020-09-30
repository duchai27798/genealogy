<?php


namespace App\Repositories;


use App\Models\ParentInfo;
use App\Repositories\Core\BaseRepository;

class ParentInfoRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(ParentInfo::class);
    }
}
