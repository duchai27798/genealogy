<?php


namespace App\Repositories;


use App\Models\Person;
use App\Repositories\Core\BaseRepository;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class PersonRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(Person::class);
    }

    public function getPersonByGender($gender)
    {
        Return $this->_model::whereHas('gender', function ($query) use ($gender) {
            $query->where('name', 'like', $gender);
        })->get();
    }
}
