<?php
namespace Notification\Factory\Device;

use Notification\Controller\DeviceController;
use Notification\Model\Device\DeviceRepositoryInterface;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class DeviceControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return DeviceController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DeviceController($container->get(DeviceRepositoryInterface::class));
    }
}