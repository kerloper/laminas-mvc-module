<?php
namespace PushNotification\Factory;

use PushNotification\Controller\DeviceController;
use PushNotification\Model\DeviceRepositoryInterface;
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