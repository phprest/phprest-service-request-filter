<?php namespace Phrest\Service\RequestFilter;

use Phrest\Service\Serviceable;
use Phrest\Service\Configurable;
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

        $container->singleton($config->getServiceName(), $requestFilter);
    }
}
