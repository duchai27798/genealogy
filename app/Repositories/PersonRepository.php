<?php


namespace App\Repositories;


use App\Models\Person;
use App\Repositories\Core\BaseRepository;

class PersonRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(Person::class);
    }
}
