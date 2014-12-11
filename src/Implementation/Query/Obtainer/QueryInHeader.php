<?php namespace Phprest\Service\RequestFilter\Implementation\Query\Obtainer;

use Phprest\Service\RequestFilter\Contract\ObtainStrategy;
use Symfony\Component\HttpFoundation\Request;

class QueryInHeader implements ObtainStrategy
{
    /**
     * @param Request $request
     *
     * @return string|null
     */
    public function get(Request $request)
    {
        return $request->headers->get('X-Query');
    }
}
