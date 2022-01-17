<?php

namespace Notification;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'service_manager' => [
        'aliases' => [
            Model\Notification\NotificationRepositoryInterface::class => Model\Notification\NotificationDbSqlRepository::class,
            Model\Notification\NotificationCommandInterface::class => Model\Notification\NotificationDbSqlCommand::class,

            Model\Device\DeviceRepositoryInterface::class => Model\Device\DeviceDbSqlRepository::class,
            Model\Device\DeviceCommandInterface::class => Model\Device\DeviceDbSqlCommand::class,
        ],
        'factories' => [
            Model\Notification\NotificationDbSqlRepository::class => Factory\Notification\NotificationDbSqlRepositoryFactory::class,
            Model\Notification\NotificationDbSqlCommand::class => Factory\Notification\NotificationDbSqlCommandFactory::class,

            Model\Device\DeviceDbSqlRepository::class => Factory\Device\DeviceDbSqlRepositoryFactory::class,
            Model\Device\DeviceDbSqlCommand::class => Factory\Device\DeviceDbSqlCommandFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'Notification' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/notification',
                    'defaults' => [
                        'controller' => Controller\NotificationController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'detail' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/:id',
                            'defaults' => [
                                'action' => 'detail',
                            ],
                            'constraints' => [
                                'id' => '\d+',
                            ],
                        ],
                    ],
                    'add' => [
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/add',
//                            'defaults' => [
//                                'controller' => Controller\WriteController::class,
//                                'action' => 'add',
//                            ],
                        ],
                    ],
                    'edit' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/edit/:id',
//                            'defaults' => [
//                                'controller' => Controller\WriteController::class,
//                                'action' => 'edit',
//                            ],
                            'constraints' => [
                                'id' => '[1-9]\d*',
                            ],
                        ],
                    ],
                    'delete' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/delete/:id',
//                            'defaults' => [
//                                'controller' => Controller\DeleteController::class,
//                                'action'     => 'delete',
//                            ],
                            'constraints' => [
                                'id' => '[1-9]\d*',
                            ],
                        ],
                    ],

                    'device' => [
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/device',
                            'defaults' => [
                                'controller' => Controller\DeviceController::class,
                                'action' => 'index',
                            ],
                        ],
                        'may_terminate' => true,
                    ],


                ],

            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\NotificationController::class => Factory\Notification\NotificationControllerFactory::class,
            Controller\DeviceController::class => Factory\Device\DeviceControllerFactory::class,

        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];