<?php


namespace App\Repositories\Core;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements Repository
{
    /**
     * @var Model
     */
    protected $_model;

    /**
     * Set Model
     * @param string $_model
     */
    protected function setModel(string $_model)
    {
        $this->_model = $_model;
    }

    public function getAll()
    {
        return $this->_model::all();
    }

    public function find($id)
    {
        return $this->_model::find($id);
    }

    public function create(array $object)
    {
        return $this->_model::create($object);
    }

    public function update($id, array $object)
    {
        $result = $this->_model::find($id);

        if ($result) {
            return $result->update($object);
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->_model->find($id);

        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
