<?php namespace Phprest\Service\RequestFilter\Implementation\Sort\Obtainer;

use Phprest\Service\RequestFilter\Contract\ObtainStrategy;
use Symfony\Component\HttpFoundation\Request;

class SortInHeaderOrQuery implements ObtainStrategy
{
    /**
     * @param Request $request
     *
     * @return string|null
     */
    public function get(Request $request)
    {
        return $request->headers->get('X-Sort') ? : $request->query->get('sort');
    }
}
