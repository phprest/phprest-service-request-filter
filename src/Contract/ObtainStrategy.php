<?php namespace Phrest\Service\RequestFilter\Contract;

use Symfony\Component\HttpFoundation\Request;

interface ObtainStrategy
{
    /**
     * @param Request $request
     *
     * @return string|null
     */
    public function get(Request $request);
}
