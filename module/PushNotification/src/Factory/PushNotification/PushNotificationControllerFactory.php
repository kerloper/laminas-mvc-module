<?php
namespace PushNotification\Factory\PushNotification;

use PushNotification\Controller\PushNotificationController;
use PushNotification\Model\PushNotification\PushNotificationRepositoryInterface;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class PushNotificationControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return PushNotificationController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PushNotificationController($container->get(PushNotificationRepositoryInterface::class));
    }
}