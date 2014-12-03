<?php namespace Phrest\Service\RequestFilter\Contract\Sort;

use Phrest\Service\RequestFilter\DataStructure\Sort;

interface ProcessStrategy
{
    /**
     * @param Sort $sorting
     *
     * @return mixed
     */
    public function sort(Sort $sorting);
}
