<?php
namespace Notification\Factory\Device;

use Interop\Container\ContainerInterface;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Hydrator\ReflectionHydrator;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Notification\Model\Device\Device;
use Notification\Model\Device\DeviceDbSqlRepository;

class DeviceDbSqlRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DeviceDbSqlRepository(
            $container->get(AdapterInterface::class),
            new ReflectionHydrator(),
            new Device('', '','','','')
        );
    }
}