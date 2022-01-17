<?php
namespace Notification\Factory\Device;

use Notification\Model\Device\Device;
use Notification\Model\Notification\NotificationDbSqlCommand;
use Interop\Container\ContainerInterface;
use Notification\Model\Notification\Notification;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Hydrator\ReflectionHydrator;
use Laminas\ServiceManager\Factory\FactoryInterface;

class DeviceDbSqlCommandFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new LaminasDbSqlCommand(
            $container->get(AdapterInterface::class),
            new ReflectionHydrator(),
            new Device('', '','','','')
        );
    }
}