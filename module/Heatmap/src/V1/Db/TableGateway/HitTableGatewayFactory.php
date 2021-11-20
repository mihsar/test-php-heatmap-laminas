<?php

declare(strict_types=1);

namespace Heatmap\V1\Db\TableGateway;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class HitTableGatewayFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new HitTableGateway(
            $container->get('DbAdapter')
        );
    }
}