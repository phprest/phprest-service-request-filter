<?php namespace Phprest\Service\RequestFilter;

trait Getter
{
    /**
     * @return RequestFilter
     */
    protected function serviceRequestFilter()
    {
        return $this->getContainer()->get(Config::getServiceName());
    }
    /**
     * Returns the DI container
     *
     * @return \League\Container\ContainerInterface
     */
    abstract protected function getContainer();
}
