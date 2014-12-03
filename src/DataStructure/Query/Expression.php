<?php namespace Phrest\Service\RequestFilter\DataStructure\Query;

abstract class Expression
{
    /**
     * @var string
     */
    protected $property;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param string $property
     * @param mixed $value
     */
    public function __construct($property, $value)
    {
        $this->property = $property;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
