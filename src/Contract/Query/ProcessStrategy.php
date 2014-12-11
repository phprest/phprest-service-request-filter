<?php namespace Phprest\Service\RequestFilter\Contract\Query;

use Phprest\Service\RequestFilter\DataStructure\Query\Query;

interface ProcessStrategy
{
    /**
     * @param Query $queries
     *
     * @return mixed
     */
    public function query(Query $queries);
}
