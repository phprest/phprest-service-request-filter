<?php namespace Phprest\Service\RequestFilter\Processor;

use Doctrine\Common\Collections\Criteria;
use Phprest\Service\RequestFilter\Contract\Query\ProcessStrategy as QueryProcessStrategy;
use Phprest\Service\RequestFilter\Contract\Sort\ProcessStrategy as SortProcessStrategy;
use Phprest\Service\RequestFilter\Contract\Offset\ProcessStrategy as OffsetProcessStrategy;
use Phprest\Service\RequestFilter\Contract\Limit\ProcessStrategy as LimitProcessStrategy;
use Phprest\Service\RequestFilter\DataStructure;
use Phprest\Service\RequestFilter\DataStructure\Query\Expression;

class Rdbms implements QueryProcessStrategy, SortProcessStrategy, OffsetProcessStrategy, LimitProcessStrategy
{
    /**
     * @var Criteria
     */
    protected $criteria;

    /**
     * @var array
     */
    protected $specialProperties;

    /**
     * @var array
     */
    protected $excludedProperties;

    /**
     * @param Criteria $criteria
     * @param array $specialProperties array of property => callback
     * @param array $excludedProperties array of property names
     */
    public function __construct(Criteria $criteria,
                                array $specialProperties = [],
                                array $excludedProperties = [])
    {
        $this->criteria = $criteria;
        $this->specialProperties = $specialProperties;
        $this->excludedProperties = $excludedProperties;
    }

    /**
     * @param DataStructure\Query\Query $queries
     *
     * @return mixed
     */
    public function query(DataStructure\Query\Query $queries)
    {
        $logicFunc = 'andWhere';
        if ($queries instanceof DataStructure\OrQuery) {
            $logicFunc = 'orWhere';
        }

        foreach ($queries as $query) {

            if ($this->isExcludedProperty($query->getProperty())) {
                continue;
            }

            $value = $this->unlockSpecialProperty($query->getProperty(), $query->getValue());

            if ($query instanceof Expression\Equal) {

                $this->criteria->{$logicFunc}(Criteria::expr()->eq($query->getProperty(), $value));

            } elseif ($query instanceof Expression\NotEqual) {

                $this->criteria->{$logicFunc}(Criteria::expr()->neq($query->getProperty(), $value));

            } elseif ($query instanceof Expression\GreaterThan) {

                $this->criteria->{$logicFunc}(Criteria::expr()->gt($query->getProperty(), $value));

            } elseif ($query instanceof Expression\GreaterThanEqual) {

                $this->criteria->{$logicFunc}(Criteria::expr()->gte($query->getProperty(), $value));

            } elseif ($query instanceof Expression\LesserThan) {

                $this->criteria->{$logicFunc}(Criteria::expr()->lt($query->getProperty(), $value));

            } elseif ($query instanceof Expression\LesserThanEqual) {

                $this->criteria->{$logicFunc}(Criteria::expr()->lte($query->getProperty(), $value));

            } elseif ($query instanceof Expression\In) {

                $this->criteria->{$logicFunc}(Criteria::expr()->in($query->getProperty(), $value));

            } elseif ($query instanceof Expression\NotIn) {

                $this->criteria->{$logicFunc}(Criteria::expr()->notIn($query->getProperty(), $query->getValue()));

            }

        }
    }

    /**
     * @param DataStructure\Sort $sorting
     *
     * @return void
     */
    public function sort(DataStructure\Sort $sorting)
    {
        $sortings = [];

        foreach ($sorting as $sortingEntity) {

            if ($this->isExcludedProperty($sortingEntity->getProperty())) {
                continue;
            }

            $sortings[$sortingEntity->getProperty()] =
                $sortingEntity instanceof DataStructure\Sort\Asc ? 'asc' : 'desc';
        }

        $this->criteria->orderBy($sortings);
    }

    /**
     * @param integer $offset
     *
     * @return mixed
     */
    public function offset($offset)
    {
        $this->criteria->setFirstResult($offset);
    }

    /**
     * @param integer $limit
     *
     * @return void
     */
    public function limit($limit)
    {
        $this->criteria->setMaxResults($limit);
    }

    /**
     * @param string $property
     * @param mixed $value
     *
     * @return mixed
     */
    protected  function unlockSpecialProperty($property, $value)
    {
        if (array_key_exists($property, $this->specialProperties)) {
            return $this->specialProperties[$property]($value);
        }

        return $value;
    }

    /**
     * @param string $property
     *
     * @return boolean
     */
    protected function isExcludedProperty($property)
    {
        return in_array($property, $this->excludedProperties);
    }
}
