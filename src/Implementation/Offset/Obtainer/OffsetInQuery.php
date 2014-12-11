<?php namespace Phprest\Service\RequestFilter\Implementation\Offset\Obtainer;

use Phprest\Service\RequestFilter\Contract\ObtainStrategy;
use Symfony\Component\HttpFoundation\Request;

class OffsetInQuery implements ObtainStrategy
{
    /**
     * @param Request $request
     *
     * @return string|null
     */
    public function get(Request $request)
    {
        return $request->query->get('offset');
    }
}
