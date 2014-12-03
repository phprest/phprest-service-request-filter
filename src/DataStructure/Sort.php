<?php namespace Phrest\Service\RequestFilter\DataStructure;

use Phrest\Service\RequestFilter\DataStructure\Sort\Entity;

final class Sort implements \Iterator
{
    /**
     * @var integer
     */
    private $position;

    /**
     * @var array of Sorting Entities
     */
    private $sortings = [];


    public function __construct()
    {
        $this->position = 0;
    }

    public function add(Entity $sorting)
    {
        $this->sortings[] = $sorting;
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return Entity
     */
    public function current()
    {
        return $this->sortings[$this->position];
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * @return boolean
     */
    public function valid()
    {
        return isset($this->sortings[$this->position]);
    }
}
