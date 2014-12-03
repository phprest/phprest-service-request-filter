<?php namespace Phrest\Service\RequestFilter\DataStructure\Sort;

abstract class Entity
{
    /**
     * @var string
     */
    protected $property;

    /**
     * @param string $property
     */
    public function __construct($property)
    {
        $this->property = $property;
    }

    /**
     * @return string
     */
    public function getProperty()
    {
        return $this->property;
    }
}
