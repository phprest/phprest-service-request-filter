<?php namespace Phprest\Service\RequestFilter;

use Phprest\Service\Serviceable;
use Phprest\Service\Configurable;
use Orno\Di\Container;

class Service implements Serviceable
{
    /**
     * @param Container $container
     * @param Configurable $config
     *
     * @return void
     */
    public function register(Container $container, Configurable $config)
    {
        if ( ! $config instanceof Config) {
            throw new \InvalidArgumentException('Wrong Config object');
        }

        $requestFilter = new RequestFilter($config);

        $container->add($config->getServiceName(), $requestFilter);
    }
}
