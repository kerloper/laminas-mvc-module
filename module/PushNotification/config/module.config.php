<?php

namespace PushNotification;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'service_manager' => [
        'aliases' => [
            Model\PushNotificationRepositoryInterface::class => Model\LaminasDbSqlRepository::class,
            Model\PushNotificationCommandInterface::class => Model\LaminasDbSqlCommand::class,
        ],
        'factories' => [
            Model\PushNotificationRepository::class => InvokableFactory::class,
            Model\LaminasDbSqlRepository::class => Factory\LaminasDbSqlRepositoryFactory::class,
            Model\PushNotificationCommand::class => InvokableFactory::class,
            Model\LaminasDbSqlCommand::class => Factory\LaminasDbSqlCommandFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'pushNotification' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/push-notification',
                    'defaults' => [
                        'controller' => Controller\PushNotificationController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,

            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\PushNotificationController::class => Factory\PushNotificationControllerFactory::class,

        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];