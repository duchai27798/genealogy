<?php


namespace App\classes;


class TreeNode
{
    public $name;
    public $parent;
    public $id;

    /**
     * TreeNode constructor.
     * @param $id
     * @param $name
     * @param $parent
     */
    public function __construct($id, $name, $parent)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parent = $parent;
    }
}
