<?php namespace Phprest\Service\RequestFilter;

use Phprest\Service\Serviceable;
use Phprest\Service\Configurable;
use League\Container\ContainerInterface;

class Service implements Serviceable
{
    /**
     * @param ContainerInterface $container
     * @param Configurable $config
     *
     * @return void
     */
    public function register(ContainerInterface $container, Configurable $config)
    {
        if ( ! $config instanceof Config) {
            throw new \InvalidArgumentException('Wrong Config object');
        }

        $requestFilter = new RequestFilter($config);

        $container->add($config->getServiceName(), $requestFilter);
    }
}
