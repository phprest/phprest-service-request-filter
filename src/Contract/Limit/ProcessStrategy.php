<?php namespace Phrest\Service\RequestFilter\Contract\Limit;

interface ProcessStrategy
{
    /**
     * @param integer $limit
     *
     * @return mixed
     */
    public function limit($limit);
}
