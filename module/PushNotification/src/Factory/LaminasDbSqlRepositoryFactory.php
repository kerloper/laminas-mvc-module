<?php
namespace PushNotification\Factory;

use Interop\Container\ContainerInterface;
use PushNotification\Model\PushNotification;
use PushNotification\Model\LaminasDbSqlRepository;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Hydrator\ReflectionHydrator;
use Laminas\ServiceManager\Factory\FactoryInterface;

class LaminasDbSqlRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new LaminasDbSqlRepository(
            $container->get(AdapterInterface::class),
            new ReflectionHydrator(),
            new PushNotification('', '')
        );
    }
}