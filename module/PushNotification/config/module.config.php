<?php

namespace PushNotification;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'service_manager' => [
        'aliases' => [
            Model\PushNotificationRepositoryInterface::class => Model\PushNotificationDbSqlRepository::class,
            Model\PushNotificationCommandInterface::class => Model\PushNotificationDbSqlCommand::class,
            Model\DeviceRepositoryInterface::class => Model\PushNotificationDbSqlRepository::class,
        ],
        'factories' => [
            Model\PushNotificationDbSqlRepository::class => Factory\PushNotificationDbSqlRepositoryFactory::class,
            Model\PushNotificationDbSqlCommand::class => Factory\PushNotificationDbSqlCommandFactory::class,
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
            Controller\PushNotificationController::class => Factory\PushNotificationControllerFactory::class,
            Controller\DeviceController::class => Factory\DeviceControllerFactory::class,

        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];