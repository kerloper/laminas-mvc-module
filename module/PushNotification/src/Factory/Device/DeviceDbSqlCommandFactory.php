<?php
namespace PushNotification\Factory\Device;

use PushNotification\Model\Device\Device;
use PushNotification\Model\PushNotification\PushNotificationDbSqlCommand;
use Interop\Container\ContainerInterface;
use PushNotification\Model\PushNotification\PushNotification;
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