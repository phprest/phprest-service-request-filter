<?php namespace Phprest\Service\RequestFilter\Implementation\Limit\Obtainer;

use Phprest\Service\RequestFilter\Contract\ObtainStrategy;
use Symfony\Component\HttpFoundation\Request;

class LimitInHeaderOrQuery implements ObtainStrategy
{
    /**
     * @param Request $request
     *
     * @return string|null
     */
    public function get(Request $request)
    {
        return $request->headers->get('X-Limit') ? : $request->query->get('limit');
    }
}
