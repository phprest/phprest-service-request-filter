<?php namespace Phrest\Service\RequestFilter;

trait Getter
{
    /**
     * @return RequestFilter
     */
    public function serviceRequestFilter()
    {
        return $this->getContainer()->get(Config::getServiceName());
    }
    /**
     * Returns the DI container
     *
     * @return \Orno\Di\Container
     */
    abstract protected function getContainer();
}
