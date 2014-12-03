<?php namespace Phrest\Service\RequestFilter\Contract\Query;

use Phrest\Service\RequestFilter\DataStructure\Query\Query;

interface ProcessStrategy
{
    /**
     * @param Query $queries
     *
     * @return mixed
     */
    public function query(Query $queries);
}
