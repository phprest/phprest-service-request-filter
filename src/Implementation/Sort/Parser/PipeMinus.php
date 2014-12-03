<?php namespace Phrest\Service\RequestFilter\Implementation\Sort\Parser;

use Phrest\Service\RequestFilter\Contract\Sort\ParseStrategy;
use Phrest\Service\RequestFilter\DataStructure\Sort;

class PipeMinus implements ParseStrategy
{
    /**
     * @param string $input
     *
     * @return Sort
     */
    public function parse($input)
    {
        $sorting = new Sort();

        foreach (explode('|', $input) as $property) {
            if ($property[0] === '-') {
                $sorting->add(new Sort\Desc(substr($property, 1)));
                continue;
            }
            $sorting->add(new Sort\Asc($property));
        }

        return $sorting;
    }
}
