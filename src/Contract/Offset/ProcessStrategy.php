<?php namespace Phprest\Service\RequestFilter\Contract\Offset;

interface ProcessStrategy
{
    /**
     * @param integer $offset
     *
     * @return mixed
     */
    public function offset($offset);
}
