<?php namespace Phrest\Service\RequestFilter\Implementation\Query\Parser;

use Phrest\Service\RequestFilter\Contract\Query\ParseStrategy;
use Phrest\Service\RequestFilter\DataStructure\AndQuery;
use Phrest\Service\RequestFilter\DataStructure\Query\Expression\Equal;
use Phrest\Service\RequestFilter\DataStructure\Query\Query;

class CommaEqualAnd implements ParseStrategy
{
    /**
     * @param string $input
     *
     * @return Query
     */
    public function parse($input)
    {
        $queries = new AndQuery();

        foreach (explode(',', $input) as $query) {
            list($property, $value) = explode('=', $query);

            $queries->add(new Equal($property, $value));
        }

        return $queries;
    }
}
