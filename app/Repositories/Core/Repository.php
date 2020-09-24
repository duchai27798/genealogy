<?php


namespace App\Repositories\Core;


interface Repository
{
    /**
     * Get All
     * @return mixed
     */
    public function getAll();

    /**
     * Find object by id
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * create object
     * @param array $object
     * @return mixed
     */
    public function create(array $object);

    /**
     * Update object
     * @param $id
     * @param array $object
     * @return mixed
     */
    public function update($id, array $object);

    /**
     * Delete Object
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
