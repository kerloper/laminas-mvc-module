<?php
namespace Notification\Factory\Notification;

use Interop\Container\ContainerInterface;
use Notification\Model\Notification\Notification;
use Notification\Model\Notification\NotificationDbSqlRepository;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Hydrator\ReflectionHydrator;
use Laminas\ServiceManager\Factory\FactoryInterface;

class NotificationDbSqlRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new NotificationDbSqlRepository(
            $container->get(AdapterInterface::class),
            new ReflectionHydrator(),
            new Notification('', '','')
        );
    }
}