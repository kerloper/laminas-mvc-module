<?php
namespace Notification\Factory\Notification;

use Notification\Controller\NotificationController;
use Notification\Model\Notification\NotificationRepositoryInterface;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class NotificationControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return NotificationController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new NotificationController($container->get(NotificationRepositoryInterface::class));
    }
}