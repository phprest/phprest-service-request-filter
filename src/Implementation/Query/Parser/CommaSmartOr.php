<?php namespace Phrest\Service\RequestFilter\Implementation\Query\Parser;

use Phrest\Service\RequestFilter\DataStructure\OrQuery;
use Phrest\Service\RequestFilter\DataStructure\Query\Query;

class CommaSmartOr extends CommaSmartAnd
{
    /**
     * @param string $input
     *
     * @return Query
     */
    public function parse($input)
    {
        $parentQueries = parent::parse($input);

        $queries = new OrQuery();

        foreach ($parentQueries as $parentQuery) {
            $queries->add($parentQuery);
        }

        return $queries;
    }
}
