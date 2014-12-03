<?php namespace Phrest\Service\RequestFilter\Implementation\Query\Parser;

use Phrest\Service\RequestFilter\Contract\Query\ParseStrategy;
use Phrest\Service\RequestFilter\DataStructure\AndQuery;
use Phrest\Service\RequestFilter\DataStructure\Query\Expression;
use Phrest\Service\RequestFilter\DataStructure\Query\Query;

class CommaSmartAnd implements ParseStrategy
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

            if (strpos($query, '>=') !== false) {

                list($property, $value) = explode('>=', $query);
                $queries->add(new Expression\GreaterThanEqual($property, $value));

            } elseif (strpos($query, '<=') !== false) {

                list($property, $value) = explode('<=', $query);
                $queries->add(new Expression\LesserThanEqual($property, $value));

            } elseif (strpos($query, '>') !== false) {

                list($property, $value) = explode('>', $query);
                $queries->add(new Expression\GreaterThan($property, $value));

            } elseif (strpos($query, '<') !== false) {

                list($property, $value) = explode('<', $query);
                $queries->add(new Expression\LesserThan($property, $value));

            } elseif (strpos($query, '=') !== false) {

                list($property, $value) = explode('=', $query);
                $queries->add(new Expression\Equal($property, $value));

            } elseif (strpos($query, '!=') !== false) {

                list($property, $value) = explode('!=', $query);
                $queries->add(new Expression\NotEqual($property, $value));

            }

        }

        return $queries;
    }
}
