<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\PersonRepository;

class AjaxController extends Controller
{
    private $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function getResourceTree()
    {
        $listPerson = $this->personRepository->getAll();
        $dataResource = collect();

        foreach ($listPerson as $person) {

            if ($person->isGrandChildren()) {
                $dataResource[$person->people_id] = (object) [
                    'id' => $person->people_id,
                    'firstname' => $person->firstname,
                    'lastname' => $person->lastname,
                    'birthday' => $person->getBirthday(),
                    'gender' => $person->gender->name,
                    'parent' => $person->parent
                ];
            }
        }

        return $dataResource;
    }
}
