<?php namespace Phprest\Service\RequestFilter;

use Symfony\Component\HttpFoundation\Request;

trait Util
{
    /**
     * @param Request $request
     * @param object $processor
     *
     * @return void
     */
    protected  function requestFilter(Request $request, $processor)
    {
        /** @var RequestFilter $requestFilter */
        $requestFilter = $this->getContainer()->get(Config::getServiceName());

        $requestFilter->process($request, $processor);
    }

    /**
     * @return \League\Container\ContainerInterface
     */
    abstract protected function getContainer();
}
