<?php namespace Phprest\Service\RequestFilter\Implementation\Query\Parser;

use Phprest\Service\RequestFilter\Contract\Query\ParseStrategy;
use Phprest\Service\RequestFilter\DataStructure\AndQuery;
use Phprest\Service\RequestFilter\DataStructure\Query\Expression\Equal;
use Phprest\Service\RequestFilter\DataStructure\Query\Query;

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
