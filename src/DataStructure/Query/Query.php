<?php namespace Phprest\Service\RequestFilter\DataStructure\Query;

abstract class Query implements \Iterator
{
    /**
     * @var integer
     */
    protected $position;

    /**
     * @var array of Expressions
     */
    protected $expressions = [];


    public function __construct()
    {
        $this->position = 0;
    }

    public function add(Expression $expression)
    {
        $this->expressions[] = $expression;
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return Expression
     */
    public function current()
    {
        return $this->expressions[$this->position];
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
        return isset($this->expressions[$this->position]);
    }
}
